<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="ux.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
      <a class="navbar-brand d-lg-none" href="#">
        <img src="pic/logo.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">HOME</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="CategALogin.php">TREATS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CategBLogin.php">DRINKS</a>
          </li>
          <a class="navbar-brand d-none d-lg-block" href="#">
            <img src="pic/logo.png" alt="">
          </a>
          <li class="nav-item">
            <a class="nav-link" href="StoresLogin.php">STORES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cartLogin.php">CARTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php" class="btn">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
  <div class="content">
    <h3><span><i class="fas fa-user fa-xs"></i> USER</span></h3>
    <h1><span><?php echo $_SESSION['user_name'] ?></span></h1>
  </div>
</div>

    <div class="welcome-container">
      <img class="welcome-image" src="pic/welcome.png" alt="Welcome Image">
    </div>

    <div class="header-section">
      <div class="header-content">
        <a class="header-button" href="#"></a>
      </div>
    </div>
    
    <div class="view-more-section">
      <div class="title-container">
        <h1 class="title-text-first">SOR AND BEE</h1>
        <h1 class="title-text-second">ASTONISHED</h1>
      </div>
      <div class="view-more-content">
        <p class="description-text">Sorbee's commitment to quality is evident in their use of high-quality ingredients to create their ice cream. They strive to create a creamy and flavorful product that rivals traditional ice cream, ensuring that customers can enjoy a satisfying frozen dessert experience.</p>
        <a class="know-more-button" href="#" onclick="openModal()"></a>
      </div>
    </div>
    
    <div class="divider-container">
      <div class="divider-image"></div>
    </div>
    
    <!-- Modal -->
    <div id="videoModal" class="modal">
      <div class="modal-content">
        <video controls autoplay>
          <source src="media/comm.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <button class="exit-button" onclick="closeModal()">X</button>
      </div>
    </div>

    <footer>
      <img src="pic/logo.png" alt="Logo" class="footer-logo">
      <div class="footer-container">
        <div class="footer-column store-locations">
          <h3>STORE LOCATIONS</h3>
          <ul class="location-list">
            <li>
              <div class="location-details">
                <img src="pic/location-icon.png" alt="Location Icon" class="location-icon">
                <div class="location-info">
                  <span class="location-name">121 j.p rIZAL sTREET, sAN rOQUE mARIKINA cITY, 1801  PHILIPPINES</span>
                  <span class="location-hours">MONDAY - SATURDAY: 7:30 AM - 8:30 PM</span>
                </div>
              </div>
            </li>
            <li>
              <div class="location-details">
                <img src="pic/location-icon.png" alt="Location Icon" class="location-icon">
                <div class="location-info">
                  <span class="location-name">41 Eastwood Avenue Bagumbayan, Quezon City, 1800, PHILIPPINES</span>
                  <span class="location-hours">MONDAY - FRIDAY: 10:30 AM - 10:30 PM</span>
                </div>
              </div>
            </li>
            <li>
              <div class="location-details">
                <img src="pic/location-icon.png" alt="Location Icon" class="location-icon">
                <div class="location-info">
                  <span class="location-name">General Roxas AveNUE, Cubao, Quezon City, 1109 , Philippines</span>
                  <span class="location-hours">MONDAY - FRIDAY: 9:30 AM - 9:30 PM</span>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="footer-column contact-info">
          <h3>CONTACT INFO</h3>
          <ul class="contact-list">
            <li>(+63) 9391482211</li>
            <li>8888-7777-8888</li>
          </ul>
        </div>
      </div>
    </footer>

    <section>
      <img src="pic/ph.png" alt="Philippine Icon" class="philippine-icon">
      ® GROUP 6. T.I.P.QC © 2024 COPYRIGHT
    </section>

    <script src="function.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>




