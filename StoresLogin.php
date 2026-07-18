<?php
session_start();

if(isset($_SESSION['user_name'])){
}

@include 'config.php';

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
         exit();
      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
         exit();
      }
   }else{
      $error[] = 'INCORRECT EMAIL OR PASSWORD!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sorbee: Stores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
  <link href="storesux.css" rel="stylesheet">
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
          <a class="nav-link active" aria-current="page" href="user_page.php">HOME</a>
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
          <a class="nav-link" href="#">STORES</a>
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

  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="pic/store1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="pic/store2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="pic/store3.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <style>
    .branch-header {
      color: white;
      font-family: "Lilita One", sans-serif;
    }
    
    .btn-primary {
      background-color: #FFCA78; 
      opacity: 1; 
    }
  </style>
  
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="text-center mt-4">
          <img src="pic/logo.png" alt="Logo" width="200" height="100">
        </div>
      <h2 class="mt-4 branch-header">Branch Location</h2>
      
      <form class="d-flex">
        <input id="search-input" class="form-control me-2" type="search" placeholder="Branch Location" aria-label="Branch Location">
        
      </form>
    </div>
    <div class="col-md-6">
      <div class="map-area">
        <iframe id="map-iframe" width="1235" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</div>

<center><h1 class="aboutus">ABOUT US</h1></center>
    <div class="wrapper">
      <h2>Executive Team</h2>
      <hr class="line">
    <center><div class="members">
      <div class="team-mem">
    <img src="pic/Mesa.jpg" class="Mesa">
    <h4>Mr. Mesa</h4>
    <p>Graphic Designer</p>
  </div>
  <div class="team-mem">
    <img src="pic/Reyes.jpg" class="Reyes">
    <h4>Ms. Reyes</h4>
    <p>Graphic Designer</p>
  </div>
  <div class="team-mem">
    <img src="pic/Magan.jpg" class="Magan">
    <h4>Mr. Magan</h4>
    <p>Graphic Designer</p>
  </div>
  <div class="team-mem">
    <img src="pic/Munoz.png" class="Muñoz">
    <h4>Mr. Muñoz</h4>
    <p>Graphic Designer</p>
  </div>
  <div class="team-mem">
    <img src="pic/Manzano.jpg" class="Manzano">
    <h4>Mr. Manzano</h4>
    <p>Graphic Designer</p>
  </div>
  <div class="team-mem">
    <img src="pic/Larga.jpg" class="Larga">
    <h4>Mr. Larga</h4>
    <p>Graphic Designer</p>
  </div></center>
  </div>
  </div>

<script>
 
  var carousel = document.querySelector("#carouselExampleIndicators");
  var mapIframe = document.querySelector("#map-iframe");


  carousel.addEventListener("slide.bs.carousel", function(event) {

    var nextSlideIndex = event.to;


    if (nextSlideIndex === 0) {
      mapIframe.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d682.4261196141389!2d121.10152178625465!3d14.634068311142594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b837a0f4d14d%3A0x3a8d1d623ef42c6f!2sSan%20Roque%2C%20Marikina%2C%201800%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1713678961116!5m2!1sen!2sph";
    } else if (nextSlideIndex === 1) {

      mapIframe.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15443.432849348877!2d121.08268796460777!3d14.607151767336752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b81cdc406411%3A0xb8aeac460bef388e!2sBagumbayan%2C%20Quezon%20City%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1714577293033!5m2!1sen!2sph";
    } else if (nextSlideIndex === 2) {

      mapIframe.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.619946987421!2d121.04902727510658!3d14.620713185868036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7bf57063611%3A0xf5099c872fdb0b67!2sGeneral%20Santos%20Ave%2C%20Cubao%2C%20Quezon%20City%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1714577436211!5m2!1sen!2sph";
    }
  });
</script>
      

  <div class="footerBottom" >
    ® GROUP 6. T.I.P.QC © 2024 COPYRIGHT
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>