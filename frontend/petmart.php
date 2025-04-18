<!DOCTYPE html>
<html>

<head>
  <title>Pet Shop | PetMart</title>
  <meta charset="iso-8859-1">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
  <!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
  <!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
  <link rel="stylesheet" href="css/petmart.css">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<body>
  <div id="header"> <a href="#" id="logo"><img src="images/logo.jpg" width="310" height="114" alt=""></a>
    <ul class="navigation">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="petmart.php">PetMart</a></li>
      <li><a href="about.php">About us</a></li>
      <li><a href="blog.php">Blog</a></li>
      <li><a href="petguide.php">PetGuide</a></li>
      <li><a href="contact.php">Contact us</a></li>
      <li><a href="login.php"><img src="images/login.png" height="25" width="25"></a></li>
    </ul>
  </div>

  <div class="search-bar">
  <select id="categorySelect">
    <option value="all">All Categories</option>
    <option value="Area">Food Area</option>
    <option value="Accessories">Accessories</option>
    <option value="Health">Health Center</option>
    <option value="Grooming">Grooming</option>
    <!-- Thêm danh mục khác nếu muốn -->
  </select>
  <input type="text" id="search-input" placeholder="Tìm kiếm...">
  <button id="search-btn"><i class="fa fa-search"></i></button>
</div>
<div class="yellow-line"></div>
  <div id="body">
    <div id="content">

      <!-- <div class="search">
        <input type="text" name="s" value="Find">
        <button>&nbsp;</button>
        <label for="articles">
          <input type="radio" id="articles">
          Articles</label>
        <label for="products">
          <input type="radio" id="products" checked>
          PetMart Products</label>
      </div> -->

      <div class="main-content">
        <div class="product-categories">
          <div class="product-categories-header">
            <a href="">
              PRODUCT CATEGORIES
            </a>
          </div>
          <ul>
            <li>
              <div class="category-item">
                <a>Food Area</a>
                <span>(1)</span>
              </div>
              <ul>
                <li><a href="#">Dog Food</a></li>
                <li><a href="#">Cat Food</a></li>
                <li><a href="#">Bird Food</a></li>
                <li><a href="#">Fish Food</a></li>
                <li><a href="#">Small Pet Food</a></li>
                <li><a href="#">Large Pet Food</a></li>
              </ul>
            </li>
            <li>
              <div class="category-item">
                <a>Accessories</a>
                <span>(2)</span>
              </div>
              <ul>
                <li><a href="#" onclick="saveCategoryAndShow('Odor Control')">Odor Control</a></li>
                <li><a href="#" onclick="saveCategoryAndShow('Liners')">Liners</a></li>
                <li><a href="#" onclick="saveCategoryAndShow('Scoops & Mats')">Scoops & Mats</a></li>
                <li><a href="#" onclick="saveCategoryAndShow('Collars')">Collars</a></li>
                <li><a href="#" onclick="saveCategoryAndShow('Harnesses')">Harnesses</a></li>
                <li><a href="#" onclick="saveCategoryAndShow('Leashes')">Leashes</a></li>
              </ul>
            </li>

            <li>
              <div class="category-item">
                <a>Health Center</a>
                <span>(10)</span>
              </div>
              <ul>
                <li><a href="#">Multivitamins</a></li>
                <li><a href="#">Dental Care</a></li>
                <li><a href="#">First Aid Kits</a></li>
                <li><a href="#">Eye & Ear Care</a></li>
                <li><a href="#">Hip & Joint Health</a></li>
              </ul>
            </li>

            <li>
              <div class="category-item">
                <a>Grooming</a>
                <span>(12)</span>
              </div>
              <ul>
                <li><a href="#">Brushes & Combs</a></li>
                <li><a href="#">Deodorizers</a></li>
                <li><a href="#">Cologne</a></li>
                <li><a href="#">Ear & Eye Cleaners</a></li>
                <li><a href="#">Nail Clippers</a></li>
              </ul>
            </li>
          </ul>
        </div>

        <div class="products">
          <!-- <div class="products-header"> -->

          <!-- </div> -->
          <div id="product-container" class="main-products">
            <!-- <div class="product-tags">
            <div class="product-img">
              <img src="images/good-food.jpg">
              <div class="overlay">
                <button class="buy-btn">
                  <div><a>BUY</a></div>
                </button>
              </div>
            </div>
            <h1>Special Dog Food</h1>
            <h2> 400.000 <span>₫</span></h2>
          </div> -->

          </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
    <script src="../backend/product/product_detail.js"></script>
    <script src="../backend/product/search_product.js"></script>
  <div class="featured">
    <ul>
      <li><a href="#"><img src="images/organic-and-chemical-free.jpg" width="300" height="90" alt=""></a></li>
      <li><a href="#"><img src="images/good-food.jpg" width="300" height="90" alt=""></a></li>
      <li class="last"><a href="#"><img src="images/pet-grooming.jpg" width="300" height="90" alt=""></a></li>
    </ul>
  </div>
<div id="footer">
  <div class="section">
    <ul>
      <li> <img src="images/friendly-pets.jpg" width="240" height="186" alt="">
        <h2><a href="#">Friendly Pets</a></h2>
        <p> Lorem ipsum dolor sit amet, consectetuer adepiscing elit, sed diam nonummy nib. <a class="more" href="#">Read More</a> </p>
      </li>
      <li> <img src="images/pet-lover2.jpg" width="240" height="186" alt="">
        <h2><a href="#">How dangerous are they</a></h2>
        <p> Lorem ipsum dolor sit amet, cons ectetuer adepis cing, sed diam euis. <a class="more" href="#">Read More</a> </p>
      </li>
      <li> <img src="images/healthy-dog.jpg" width="240" height="186" alt="">
        <h2><a href="#">Keep them healthy</a></h2>
        <p> Lorem ipsum dolor sit amet, consectetuer adepiscing elit, sed diam nonu mmy. <a class="more" href="#">Read More</a> </p>
      </li>
      <li>
        <h2><a href="#">Love...love...love...pets</a></h2>
        <p> Lorem ipsum dolor sit amet, consectetuer adepiscing elit, sed diameusim. <a class="more" href="#">Read More</a> </p>
        <img src="images/pet-lover.jpg" width="240" height="186" alt=""> </li>
    </ul>
  </div>
  <div id="footnote">
   
  </div>
</div>
</body>

</html>