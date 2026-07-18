<?php

@include 'config.php';

session_start();

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

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      } elseif ($row['user_type'] == 'operator') {
        $_SESSION['operator_name'] = $row['name'];
        header('location:ioperator_page.php');
    }
   }else{
      $error[] = 'INCORRECT EMAIL OR PASSWORD!';
   }

};
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
          <a class="navbar-brand d-none d-lg-block" href="#">
            <img src="" alt="">
          </a>
        </ul>
      </div>
    </nav>

    <div class="form-container">
    <form id="guestForm" action="login_form.php" method="post">
    <img src="pic/logo.png" alt="" style="width: 150px; height: auto;">
    <?php
    if(isset($error)){
      foreach($error as $error){
        echo '<span class="error-msg">'.$error.'</span>';
      };
    };
    ?>
    <input type="email" name="email" required placeholder="EMAIL" class="form-input">
    <input type="password" name="password" required placeholder="PASSWORD" class="form-input">
    <input type="submit" name="submit" value="LOGIN" class="form-btn">
    <button type="button" class="guest-btn" onclick="navigateToGuest()">GUEST</button>
    <p>DON'T HAVE AN <a href="register_form.php">ACCOUNT?</a></p>
  </form>
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
    <script>
  function submitGuestForm() {
    document.getElementById("guestForm").submit();
  }

  function navigateToGuest() {
    window.location.href = "homeGuest.html";
  }
</script>
    <section>
      <img src="pic/ph.png" alt="Philippine Icon" class="philippine-icon">
      ® GROUP 6. T.I.P.QC © 2024 COPYRIGHT
    </section>

    <script src="function.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

