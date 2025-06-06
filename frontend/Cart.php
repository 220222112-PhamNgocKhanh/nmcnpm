<!DOCTYPE html>
<html>

<head>
  <title>Shopping Cart | PetGuide</title>
  <meta charset="iso-8859-1">
  <link href="css/style2.css" rel="stylesheet" type="text/css">
  <link href="css/header.css" rel="stylesheet" type="text/css">
  <link href="css/cart.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
  <!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->

    </style>
</head>

<body>
  <?php include 'header.php'; ?>

  <div id="body">
    <div id="content">
      <div class="content">
        <h2>Shopping Cart</h2>

        <div class="cart-container">
          <!-- Giỏ hàng có sản phẩm -->
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="cart-body">
              <!-- Sản phẩm sẽ được thêm động vào đây -->
            </tbody>
          </table>

          <div class="cart-summary">
            <div class="cart-total">
              <span>Subtotal:</span>
              <span id="subtotal-amount">$0.00</span>
            </div>
            <div class="cart-total">
              <span>Shipping:</span>
              <span id="shipping-amount">$5.00</span>
            </div>
            <div class="cart-total">
              <span>Total:</span>
              <span id="total-amount">$0.00</span>
            </div>

            <button class="checkout-btn">Proceed to Checkout</button>
            <a href="petmart.php" class="continue-shopping">Continue Shopping</a>
          </div>


          <!-- Giỏ hàng trống (ẩn mặc định) -->
          <div class="empty-cart" style="display: none;">
            <!-- <img src="/api/placeholder/150/150" alt="Empty Cart"> -->
            <h3>Your cart is empty</h3>
            <p>Looks like you haven't added any products to your cart yet.</p>
            <a href="petmart.php" class="checkout-btn" style="display: inline-block; width: auto;">Start Shopping</a>
          </div>
        </div>
      </div>

      
    </div>

    <?php include 'footer.php'; ?>
  <!-- Sử dụng JavaScript modules từ cart-service -->
  <script src="../cart-service/public/js/cartAPI.js"></script>
  <script src="../cart-service/public/js/cartManager.js"></script>
  <script src="../cart-service/public/js/cartUI.js"></script>
</body>

</html>