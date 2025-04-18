<!DOCTYPE html>
<html>
<head>
<title>Pet Shop | PetMart</title>
<meta charset="iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/header.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'header.php'; ?>
<div id="body">
  <div id="content">
    <div class="search">
      <input type="text" name="s" value="Find">
      <button>&nbsp;</button>
      <label for="articles">
        <input type="radio" id="articles">
        Articles</label>
      <label for="products">
        <input type="radio" id="products" checked>
        PetMart Products</label>
    </div>
    <div class="content">
      <ul>
        <li> <a href="#"><img src="images/koi2.jpg" width="140" height="250" alt=""></a>
          <h2>Food Area</h2>
          <span><a href="#">Dog Food</a></span> <span><a href="#">Cat Food</a></span> <span><a href="#">Bird Food</a></span> <span><a href="#">Fish Food</a></span> <span><a href="#">Reptile Food</a></span> <span><a href="#">Small Pet Food</a></span> <span><a href="#">Large Pet Food</a></span> <span><a class="more" href="#">View all</a></span> </li>
        <li> <a href="#"><img src="images/cat3.jpg" width="140" height="250" alt=""></a>
          <h2>Accesories</h2>
          <span><a href="#">Oder Control</a></span> <span><a href="#">Liners</a></span> <span><a href="#">Scoops & Mats</a></span> <span><a href="#">Collars</a></span> <span><a href="#">Harnesses</a></span> <span><a href="#">ID Tags</a></span> <span><a href="#">Leashes</a></span> <span><a class="more" href="#">View all</a></span> </li>
        <li> <a href="#"><img src="images/dog2.jpg" width="140" height="240" alt=""></a>
          <h2>Training & Behavior</h2>
          <span><a href="#">Dog Food</a></span> <span><a href="#">Cat Food</a></span> <span><a href="#">Bird Food</a></span> <span><a href="#">Fish Food</a></span> <span><a href="#">Reptile Food</a></span> <span><a href="#">Small Pet Food</a></span> <span><a class="more" href="#">View all</a></span> </li>
        <li> <a href="#"><img src="images/bird3.jpg" width="140" height="240" alt=""></a>
          <h2>Health Center</h2>
          <span><a href="#">Multivitamins</a></span> <span><a href="#">Dental Care</a></span> <span><a href="#">First Aid Kits</a></span> <span><a href="#">Medications</a></span> <span><a href="#">Supplements</a></span> <span><a href="#">Eye & Ear Care</a></span> <span><a href="#">Hip & Joint Health</a></span> <span><a class="more" href="#">View all</a></span> </li>
        <li> <a href="#"><img src="images/bird-in-cage.jpg" width="140" height="250" alt=""></a>
          <h2>Travel Essentials</h2>
          <span><a href="#">Car Barriers</a></span> <span><a href="#">Car Seat Covers</a></span> <span><a href="#">Car Seats</a></span> <span><a href="#">ramps</a></span> <span><a href="#">Seat Belts & Harnesses</a></span> <span><a href="#">Strollers</a></span> <span><a href="#">Travel Creates & Carrier</a></span> <span><a class="more" href="#">View all</a></span> </li>
        <li> <a href="#"><img src="images/puppy3.jpg" width="140" height="240" alt=""></a>
          <h2>Grooming</h2>
          <span><a href="#">Brushes & Combs</a></span> <span><a href="#">Deodorizers</a></span> <span><a href="#">Cologne</a></span> <span><a href="#">Ear & Eya Cleaners</a></span> <span><a href="#">Nail Clippers</a></span> <span><a href="#">Shampoo</a></span> <span><a href="#">Conditioners</a></span> <span><a href="#">Shed Controls</a></span> <span><a class="more" href="#">View all</a></span> </li>
      </ul>
    </div>
    <div id="sidebar"> <a href="#"><img src="images/discount.jpg" width="300" height="790" alt=""></a> </div>
  </div>
  <div class="featured">
    <ul>
      <li><a href="#"><img src="images/organic-and-chemical-free.jpg" width="300" height="90" alt=""></a></li>
      <li><a href="#"><img src="images/good-food.jpg" width="300" height="90" alt=""></a></li>
      <li class="last"><a href="#"><img src="images/pet-grooming.jpg" width="300" height="90" alt=""></a></li>
    </ul>
  </div>
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
    <div class="section">Copyright &copy; 2012 <a href="#">Company Name</a> All rights reserved | Website Template By <a target="_blank" href="http://www.freewebsitetemplates.com/">freewebsitetemplates.com</a></div>
  </div>
</div>
</body>
</html>
