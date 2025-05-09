<div id="header">
    <a href="index.php" id="logo"><img src="images/logo.jpg"  width="310" height="114" alt="Pet Shop"></a>
    <ul class="navigation">
        <li><a href="index.php">Home</a></li>
        <li><a href="petmart.php">PetMart</a></li>
        <li><a href="about.php">About us</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php">Contact us</a></li>
        <div id="userSection"></div> <!-- Phần này sẽ được cập nhật bằng JavaScript -->
    </ul>
</div>

<!-- Thêm Font Awesome để sử dụng icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Thêm JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const userSection = document.getElementById('userSection');
        const token = localStorage.getItem('token'); // Kiểm tra token trong localStorage

        if (token) {
            // Nếu đã đăng nhập, hiển thị menu thả xuống
            userSection.innerHTML = `
                <div class="user-dropdown">
                    <a href="#" id="userIcon"><img src="images/login.png" height="25" width="25" onclick="toggleDropdown(event)"></a>
                    <div id="userDropdown" class="dropdown-content">
                        <a href="account.php"><i class="fa fa-user"></i> Account</a>
                        <a href="cart.php"><i class="fa fa-shopping-cart"></i> Shopping cart</a>
                        <a href="order.php"><i class="fa fa-list-alt"></i> Order</a>
                        <a href="#" id="logoutButton"><i class="fa fa-sign-out"></i> Log out</a>
                    </div>
                </div>
            `;

            // Xử lý sự kiện Log out
            const logoutButton = document.getElementById('logoutButton');
            logoutButton.addEventListener('click', (event) => {
                event.preventDefault();
                // Xóa token khỏi localStorage
                localStorage.removeItem('token');
                localStorage.removeItem('user');
                alert('You have been logged out.');
                // Chuyển hướng đến trang đăng nhập
                window.location.href = 'login.php';
            });
        } else {
            // Nếu chưa đăng nhập, chỉ hiển thị biểu tượng Login
            userSection.innerHTML = `
                <a href="login.php"><img src="images/login.png" height="25" width="25" alt="Login"></a>
            `;
        }
    });

    // Hiển thị/ẩn menu thả xuống
    function toggleDropdown(event) {
        event.preventDefault();
        document.getElementById("userDropdown").classList.toggle("show");
    }

    // Đóng menu thả xuống khi click ra ngoài
    window.onclick = function(event) {
        if (!event.target.matches('#userIcon img')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>