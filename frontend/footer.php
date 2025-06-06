<?php
// TODO: Add your company information
$companyName = "PetGuide";
$companyDescription = "Your trusted partner in pet care";
$companyAddress = "123 Pet Street, City, Country";
$companyPhone = "+1 234 567 890";
$companyEmail = "contact@petguide.com";

// TODO: Add your social media links
$socialLinks = [
    'facebook' => 'https://www.facebook.com/thangg.89', 
    'instagram' => 'https://www.instagram.com/quang_nt04/', 
    'youtube' => 'https://www.youtube.com/@TunaGamingvn' 
];

// TODO: Add your quick links
$quickLinks = [
    'About Us' => 'about.php',
    'Blog' => 'Blog.php',
    'Products' => 'petmart.php',
];
?>

<footer class="modern-footer">
    <div class="footer-content">
        <!-- Company Info Section -->
        <div class="footer-section">
            <h3><?php echo $companyName; ?></h3>
            <p class="company-description"><?php echo $companyDescription; ?></p>
            <div class="social-links">
                <?php foreach ($socialLinks as $platform => $link): ?>
                    <a href="<?php echo $link; ?>" class="social-link" target="_blank" rel="noopener">
                        <i class="fab fa-<?php echo $platform; ?>"></i>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Quick Links Section -->
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul class="quick-links">
                <?php foreach ($quickLinks as $text => $url): ?>
                    <li><a href="<?php echo $url; ?>"><?php echo $text; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Contact Info Section -->
        <div class="footer-section">
            <h3>Contact Us</h3>
            <ul class="contact-info">
                <li><i class="fas fa-map-marker-alt"></i> <?php echo $companyAddress; ?></li>
                <li><i class="fas fa-phone"></i> <?php echo $companyPhone; ?></li>
                <li><i class="fas fa-envelope"></i> <?php echo $companyEmail; ?></li>
            </ul>
        </div>
        <div class="footer-section">
                <h3>Categories</h3>
                <ul class="quick-links">
                    <li><a href="petmart.php?category=Dog%20Food">Dog Food</a></li>
                    <li><a href="petmart.php?category=Deodorizers">Deodorizers</a></li>
                    <li><a href="petmart.php?category=Odor%20Control">Order Control</a></li>
                    <li><a href="petmart.php?category=Multivitamins">Multivitamins</a></li>
                </ul>
            </div>
    </div>

    
    <!-- Copyright Section -->
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php echo $companyName; ?>. All rights reserved.</p>
    </div>
</footer>
<script>
    function setupCategoryLinks() {
    // Xử lý các liên kết danh mục trong footer
    document.querySelectorAll('.footer-links a[data-category]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const category = this.getAttribute('data-category');
            if (category) {
                console.log(`Footer category link clicked: ${category}`);
                
                // Lưu danh mục đã chọn vào localStorage
                localStorage.removeItem('searchKeyword');
                localStorage.setItem('selectedCategory', category);
                
                // Bổ sung thêm điều này để đảm bảo danh mục được chọn đúng khi load trang mới
                localStorage.setItem('forceSelectCategory', 'true');
                
                console.log(`Stored category in localStorage: ${category}`);
                
                // Chuyển hướng đến trang petmart
                window.location.href = 'petmart.php';
            }
        });
    });
}
</script>
<style>
.modern-footer {
    background-color: #1a1a1a;
    color: #ffffff;
    padding: 60px 0 20px;
    margin-top: 50px;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    padding: 0 20px;
}

.footer-section h3 {
    color: #5c9d7e;
    margin-bottom: 20px;
    font-size: 1.2em;
}

.company-description {
    color: #b3b3b3;
    margin-bottom: 20px;
    line-height: 1.6;
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-link {
    color: #ffffff;
    font-size: 1.5em;
    transition: color 0.3s ease;
}

.social-link:hover {
    color: #5c9d7e;
}

.quick-links {
    list-style: none;
    padding: 0;
}

.quick-links li {
    margin-bottom: 10px;
}

.quick-links a {
    color: #b3b3b3;
    text-decoration: none;
    transition: color 0.3s ease;
}

.quick-links a:hover {
    color: #5c9d7e;
}

.contact-info {
    list-style: none;
    padding: 0;
}

.contact-info li {
    color: #b3b3b3;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.contact-info i {
    color: #5c9d7e;
}

.footer-bottom {
    text-align: center;
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid #333;
    color: #b3b3b3;
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .social-links {
        justify-content: center;
    }

    .contact-info li {
        justify-content: center;
    }
}
</style>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
