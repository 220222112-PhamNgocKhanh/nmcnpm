<!DOCTYPE html>
<html>
<head>
    <title>About Us | PetGuide</title>
    <meta charset="utf-8">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/header.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <style>
      .about-hero {
        background: linear-gradient(90deg, #e0f7fa 0%, #fff 100%);
        padding: 60px 0 40px 0;
        text-align: center;
      }
      .about-hero h1 {
        font-size: 3em;
        color: #2d7a5f;
        margin-bottom: 16px;
        font-family: 'Bungee Spice', cursive, sans-serif;
        letter-spacing: 1px;
      }
      .about-hero p {
        font-size: 1.35em;
        color: #444;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
      }
      .about-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 48px;
        padding: 56px 0 32px 0;
        background: #f8f9fa;
      }
      .about-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px #5c9d7e18;
        padding: 38px 32px 32px 32px;
        max-width: 340px;
        min-width: 260px;
        text-align: center;
        transition: box-shadow 0.2s, transform 0.2s;
        position: relative;
      }
      .about-card:hover {
        box-shadow: 0 8px 32px #5c9d7e33;
        transform: translateY(-6px) scale(1.03);
      }
      .about-card img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        margin-bottom: 20px;
        border-radius: 50%;
        border: 3px solid #e0f7fa;
        background: #f8f9fa;
      }
      .about-card h3 {
        color: #2d7a5f;
        font-size: 1.35em;
        margin-bottom: 12px;
        font-weight: bold;
      }
      .about-card p {
        color: #666;
        font-size: 1.08em;
        line-height: 1.5;
      }
      .about-values {
        background: #fff;
        padding: 48px 0 32px 0;
        text-align: center;
      }
      .about-values h2 {
        color: #2d7a5f;
        font-size: 2.2em;
        margin-bottom: 24px;
        font-family: 'Bungee Spice', cursive, sans-serif;
      }
      .about-values-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 36px;
      }
      .about-value-item {
        background: linear-gradient(90deg, #e0f7fa 0%, #fff 100%);
        border-radius: 12px;
        padding: 28px 32px;
        min-width: 220px;
        max-width: 340px;
        color: #2d7a5f;
        font-size: 1.13em;
        font-weight: 500;
        box-shadow: 0 2px 10px #5c9d7e11;
        border: 1px solid #e0f7fa;
      }
      .about-team {
        background: #f8f9fa;
        padding: 48px 0 32px 0;
        text-align: center;
      }
      .about-team h2 {
        color: #2d7a5f;
        font-size: 2em;
        margin-bottom: 24px;
        font-family: 'Bungee Spice', cursive, sans-serif;
      }
      .team-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 36px;
      }
      .team-member {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 2px 12px #5c9d7e18;
        padding: 24px 20px 18px 20px;
        max-width: 220px;
        min-width: 180px;
        text-align: center;
        transition: box-shadow 0.2s, transform 0.2s;
      }
      .team-member:hover {
        box-shadow: 0 8px 32px #5c9d7e33;
        transform: translateY(-4px) scale(1.04);
      }
      .team-member img {
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 12px;
        border: 2px solid #e0f7fa;
      }
      .team-member h4 {
        color: #2d7a5f;
        font-size: 1.1em;
        margin-bottom: 6px;
        font-weight: bold;
      }
      .team-member p {
        color: #666;
        font-size: 0.98em;
        margin-bottom: 0;
      }
      @media (max-width: 900px) {
        .about-section, .about-values-list, .team-list { flex-direction: column; align-items: center; }
      }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div id="body">
      <div class="about-hero">
        <h1>About PetGuide</h1>
        <p>PetGuide is your trusted companion in caring for your beloved pets. We are passionate about providing the best products, expert advice, and a loving community for all pet lovers. Our mission is to make every pet's life healthier, happier, and more joyful.</p>
      </div>
      <div class="about-section">
        <div class="about-card">
          <img src="images/friendly-pets.jpg" alt="Friendly Service">
          <h3>Friendly Service</h3>
          <p>Our team is dedicated to helping you find the perfect products and solutions for your pets, with a smile and expert guidance.</p>
        </div>
        <div class="about-card">
          <img src="images/healthy-dog.jpg" alt="Health & Wellness">
          <h3>Health & Wellness</h3>
          <p>We offer a curated selection of healthy food, supplements, and care products to keep your pets in top shape.</p>
        </div>
        <div class="about-card">
          <img src="images/pet-lover.jpg" alt="Community">
          <h3>Pet Lovers Community</h3>
          <p>Join our community to share experiences, get advice, and connect with other pet owners who care as much as you do.</p>
        </div>
        <div class="about-card">
          <img src="images/pet-grooming.jpg" alt="Grooming & Care">
          <h3>Grooming & Care</h3>
          <p>From grooming essentials to fun accessories, we help your pets look and feel their best every day.</p>
        </div>
      </div>
      <div class="about-values">
        <h2>Our Core Values</h2>
        <div class="about-values-list">
          <div class="about-value-item">Love and respect for all animals</div>
          <div class="about-value-item">Quality and safety in every product</div>
          <div class="about-value-item">Expertise and continuous learning</div>
          <div class="about-value-item">Building a supportive pet community</div>
          <div class="about-value-item">Sustainability and responsibility</div>
        </div>
      </div>
      <div class="about-team">
        <h2>Meet Our Team</h2>
        <div class="team-list">
          <div class="team-member">
            <img src="images/pet-lover2.jpg" alt="Anna Nguyen">
            <h4>Ngoc Khanh</h4>
            <p>Founder & CEO</p>
          </div>
          <div class="team-member">
            <img src="images/puppy2.jpg" alt="David Tran">
            <h4>Huu Thang</h4>
            <p>Veterinary Advisor</p>
          </div>
          <div class="team-member">
            <img src="images/cat2.jpg" alt="Linh Le">
            <h4>Tuan Quang</h4>
            <p>Product Manager</p>
          </div>
          <div class="team-member">
            <img src="images/bird2.jpg" alt="Minh Pham">
            <h4>Nam xoan</h4>
            <p>Customer Support</p>
          </div>
          <div class="team-member">
            <img src="images/bird2.jpg" alt="Thuc Tran">
            <h4>Thuc Tran</h4>
            <p>Customer Support</p>
          </div>
        </div>
      </div>
      <?php include 'footer.php'; ?>
</body>
</html>
