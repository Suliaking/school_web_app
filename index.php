<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>King School</title>
  <link rel="stylesheet" href="src/dist/css/index.css">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

  <!-- Start Landing Page -->

  <div class="landing-page">
    <header>
      <a href="#" class="logo">
        <img src="assets/images/logo.png" alt="King School">
      </a>
      <ul class="links">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#info">Info</a></li>
        <li class="dropdown">
          <span class="dropdown-toggle">Login ▾</span>
          <ul class="dropdown-menu">
            <li><a href="school.php"><i class="icon">🎓</i> Student Login</a></li>
            <li><a href="Admin/school.php"><i class="icon">🔐</i> Teacher Login</a></li>
          </ul>
        </li>
      </ul>
    </header>
  </div>

  <!-- End Landing Page -->

  <div class="content">
    <div class="container">
    <div class="info">
  <h1>About Our School</h1>
  <p>
    Welcome to King School.
  </p>
  <p>
    At King School, we foster a nurturing environment where every student can thrive. Our mission is to provide a well-rounded education that encourages curiosity, creativity, and critical thinking.
  </p>
  <p>
    With a dedicated team of educators, we ensure each child receives personalized attention and support to reach their full potential — both academically and personally.
  </p>
  <p>
    We take pride in our diverse community. Our students are not only prepared for academic success but are also equipped with the values and skills to become responsible, compassionate global citizens.
  </p>
  <p>
    Thank you for choosing King School — where learning is a journey, and every student is valued.
  </p>
</div>

      <div class="image">
        <img src="assets/images/favicon.png" alt="Illustration of creativity and inspiration">
      </div>
    </div>
  </div>

  <!-- Start Gallery Section -->

  <section id="gallery" class="gallery-section">
    <div class="container">
      <h2>School Gallery</h2>
      <div class="gallery-grid">
        <img src="assets/images/gallery1.jpg" alt="Gallery Image 1">
        <img src="assets/images/gallery2.jpg" alt="Gallery Image 2">
        <img src="assets/images/gallery5.jpg" alt="Gallery Image 5">
        <img src="assets/images/gallery4.jpg" alt="Gallery Image 4">
        <img src="assets/images/gallery3.jpg" alt="Gallery Image 3">
        <img src="assets/images/gallery6.jpg" alt="Gallery Image 6">
        <img src="assets/images/gallery7.jpg" alt="Gallery Image 7">
        <img src="assets/images/gallery8.jpg" alt="Gallery Image 8">
        <!-- Add more images as needed -->
      </div>
    </div>
  </section>


  <!-- Info Section -->
  <section id="info" class="info-section" class="info">
    <div class="container">
      <h2>Contact & Info</h2>
      <div class="info-grid">
        <div>
          <h3><i class="fas fa-map-marker-alt"></i> Address</h3>
          <p>123 Learning Street<br>Knowledge City, EDU 45678</p>
        </div>
        <div>
          <h3><i class="fas fa-phone"></i> Contact</h3>
          <p>+123 456 7890<br>info@kingschool.edu</p>
        </div>
        <div>
          <h3><i class="fas fa-clock"></i> Office Hours</h3>
          <p>Mon–Fri: 8AM–4PM<br>Sat: 9AM–12PM</p>
        </div>
        <div>
          <h3><i class="fas fa-share-alt"></i> Follow Us</h3>
          <p>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </p>
        </div>
      </div>
    </div>
  </section>

</body>

</html>