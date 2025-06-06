<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .checkout-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 20px;
        }

        .order-summary {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        .user-info {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .cart-items {
            margin-bottom: 20px;
        }

        .cart-item {
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }

        .cart-item:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body>
    <div class="checkout-container">
        <h2 class="mb-4">Payment Information</h2>

        <div class="user-info">
            <h4 id="welcomeMessage">Welcome, </h4>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Products</h4>
                    </div>
                    <div class="card-body">
                        <div id="cartItemsList" class="cart-items">
                            <!-- Product list will be displayed here -->
                        </div>
                    </div>
                </div>

                <form id="checkoutForm">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Shipping Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" 
                                       class="form-control" 
                                       id="phone" 
                                       pattern="[0-9]{10}" 
                                       maxlength="10" 
                                       minlength="10"
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                       required>
                                <div class="invalid-feedback">
                                    Phone number must be exactly 10 digits
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Shipping Address</label>
                                <textarea class="form-control" id="address" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <div class="order-summary">
                    <h4>Order Summary</h4>
                    <div id="cartItems">
                        <!-- Order total will be displayed here -->
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span id="subtotal">0$</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping:</span>
                        <span id="shipping">0$</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total:</strong>
                        <strong id="total">0$</strong>
                    </div>
                    <div class="payment-method mb-3">
                        <h5>Payment Method</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="cod" value="cod" checked>
                            <label class="form-check-label" for="cod">
                                Cash on Delivery (COD)
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100" onclick="placeOrder()">Place Order</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Hàm lấy token từ localStorage
        function getAuthToken() {
            return localStorage.getItem('token');
        }

        // Hàm giải mã token để lấy user_id
        function getUserId() {
            const token = getAuthToken();
            if (!token) return null;

            try {
                const payload = JSON.parse(atob(token.split('.')[1]));
                return payload.user_id;
            } catch (error) {
                console.error('Lỗi khi giải mã token:', error);
                return null;
            }
        }

        // Hàm lấy thông tin người dùng
        async function loadUserInfo() {
            const userId = getUserId();
            if (!userId) {
                window.location.href = 'login.php';
                return;
            }

            try {
                const response = await fetch(`http://localhost:3000/user-service/user/${userId}`, {
                    headers: {
                        'Authorization': `Bearer ${getAuthToken()}`
                    }
                });

                if (!response.ok) {
                    throw new Error('Không thể lấy thông tin người dùng');
                }

                const userData = await response.json();
                document.getElementById('welcomeMessage').textContent = `Welcome, ${userData.username}`;
                document.getElementById('email').value = userData.email;
                document.getElementById('fullName').value = userData.username;
            } catch (error) {
                console.error('Lỗi khi tải thông tin người dùng:', error);
                alert('Có lỗi xảy ra khi tải thông tin người dùng');
            }
        }

        // Hàm lấy thông tin sản phẩm từ Product Service
        async function getProductInfo(productId) {
            try {
                const response = await fetch(`http://localhost:3000/product-service/products/${productId}`);
                if (!response.ok) {
                    throw new Error('Không thể lấy thông tin sản phẩm');
                }
                return await response.json();
            } catch (error) {
                console.error('Lỗi khi lấy thông tin sản phẩm:', error);
                return null;
            }
        }

        // Hàm lấy sản phẩm từ giỏ hàng
        async function loadCartItems() {
            const userId = getUserId();
            if (!userId) {
                window.location.href = 'login.php';
                return;
            }

            try {
                const response = await fetch(`http://localhost:3000/cart-service/cart/${userId}`, {
                    headers: {
                        'Authorization': `Bearer ${getAuthToken()}`
                    }
                });

                if (!response.ok) {
                    throw new Error('Không thể lấy thông tin giỏ hàng');
                }

                const cartItems = await response.json();


                // Lấy thông tin sản phẩm cho mỗi item trong giỏ hàng
                const itemsWithProductInfo = await Promise.all(
                    cartItems.map(async (item) => {
                        const productInfo = await getProductInfo(item.productId);
                        console.log(productInfo);
                        return {
                            ...item,
                            name: productInfo ? productInfo.product.name : 'Sản phẩm không xác định',
                            price: productInfo ? productInfo.product.price : 0,
                        };
                    })
                );


                displayCartItemsList(itemsWithProductInfo);
                displayCartItems(itemsWithProductInfo);
                calculateTotals(itemsWithProductInfo);
            } catch (error) {
                console.error('Lỗi khi tải giỏ hàng:', error);
                alert('Có lỗi xảy ra khi tải thông tin giỏ hàng');
            }
        }

        // Hiển thị danh sách sản phẩm
        function displayCartItemsList(items) {
            const cartItemsContainer = document.getElementById('cartItemsList');
            cartItemsContainer.innerHTML = items.map(item => `
                <div class="cart-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>${item.name}</span>
                        <span class="text-muted">Quantity: ${item.quantity}</span>
                    </div>
                </div>
            `).join('');
        }

        // Hiển thị tổng tiền
        function displayCartItems(items) {
            const cartItemsContainer = document.getElementById('cartItems');
            cartItemsContainer.innerHTML = items.map(item => `
                <div class="d-flex justify-content-between mb-2">
                    <span>${item.name} x ${item.quantity}</span>
                    <strong>${(item.price * item.quantity).toLocaleString('vi-VN')}$</strong>
                </div>
            `).join('');
        }

        // Tính tổng tiền
        function calculateTotals(items) {
            const subtotal = items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const shipping = 5; 
            const total = subtotal + shipping;

            document.getElementById('subtotal').innerHTML = `<strong>${subtotal.toLocaleString('vi-VN')}$</strong>`;
            document.getElementById('shipping').innerHTML = `<strong>${shipping.toLocaleString('vi-VN')}$</strong>`;
            document.getElementById('total').innerHTML = `<strong style="color: #dc3545; font-size: 1.2em;">${total.toLocaleString('vi-VN')}$</strong>`;
        }

        // Đặt hàng
        async function placeOrder() {
            const form = document.getElementById('checkoutForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const phoneInput = document.getElementById('phone');
            if (phoneInput.value.length !== 10) {
                phoneInput.classList.add('is-invalid');
                return;
            }
            phoneInput.classList.remove('is-invalid');

            const userId = getUserId();
            if (!userId) {
                alert('Please login to place an order');
                window.location.href = 'login.php';
                return;
            }

            try {
                // Get cart information
                const cartResponse = await fetch(`http://localhost:3000/cart-service/cart/${userId}`, {
                    headers: {
                        'Authorization': `Bearer ${getAuthToken()}`
                    }
                });

                if (!cartResponse.ok) {
                    throw new Error('Could not get cart information');
                }

                const cartItems = await cartResponse.json();
                
                // Lấy thông tin sản phẩm cho mỗi item
                const itemsWithProductInfo = await Promise.all(
                    cartItems.map(async (item) => {
                        const productInfo = await getProductInfo(item.productId);
                        return {
                            product_id: item.productId,
                            amount: item.quantity,
                            price: productInfo ? productInfo.product.price : 0
                        };
                    })
                );
                const total_price = itemsWithProductInfo.reduce((sum, item) => sum + (item.price * item.amount), 5);

                const orderData = {
                    user_id: userId,
                    phone_number: document.getElementById('phone').value,
                    shipping_address: document.getElementById('address').value,
                    contact_email: document.getElementById('email').value,
                    items: itemsWithProductInfo
                    
                };

                const response = await fetch('http://localhost:3000/order-service/place', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${getAuthToken()}`
                    },
                    body: JSON.stringify(orderData)
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Có lỗi xảy ra khi đặt hàng');
                }

                const result = await response.json();
                
                // Tạo payment sau khi đặt hàng thành công
                const paymentData = {
                    order_id: result.order_id,
                    amount: total_price,
                    payment_method: "cash"
                };

                const paymentResponse = await fetch('http://localhost:3000/payment-service/payments', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${getAuthToken()}`
                    },
                    body: JSON.stringify(paymentData)
                });
                console.log(paymentData);

                if (!paymentResponse.ok) {
                    throw new Error('Có lỗi xảy ra khi tạo payment');
                }

                alert('Đặt hàng thành công!');
                try {
                    const cartRes = await fetch(`http://localhost:3000/cart-service/cart/${userId}`, {
                        headers: {
                            'Authorization': `Bearer ${getAuthToken()}`
                        }
                    });
                    if (cartRes.ok) {
                        const cartItems = await cartRes.json();
                        // Xoá từng sản phẩm
                        await Promise.all(cartItems.map(item =>
                            fetch(`http://localhost:3000/cart-service/cart/${userId}/${item.productId}`, {
                                method: 'DELETE',
                                headers: {
                                    'Authorization': `Bearer ${getAuthToken()}`
                                }
                            })
                        ));
                    }
                } catch (e) {
                    console.error('Lỗi khi xoá giỏ hàng:', e);
                }
                window.location.href = 'order.php';
            } catch (error) {
                console.error('Lỗi khi đặt hàng:', error);
                alert(error.message || 'Có lỗi xảy ra. Vui lòng thử lại.');
            }
        }

        // Tải thông tin người dùng và giỏ hàng khi trang được tải
        document.addEventListener('DOMContentLoaded', () => {
            loadUserInfo();
            loadCartItems();
        });
    </script>
</body>

</html>