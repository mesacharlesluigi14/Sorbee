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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="cart.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="cart.js" type="text/Javascript">

  </head>
  <body>
    <div class="full">
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
              <a class="nav-link" href="StoresLogin.php">STORES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">CARTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php" class="btn">LOGOUT</a>
            </li>
          </ul>
        </div>
      </nav>

    <div class="container-fluid">
        <div class="cart">
            <div class="yourcart text-center">
                <h1>YOUR CART</h1>
            </div>
            <div class="backcart">
                <div class="products">
                    <div class="row">
                      <div class="col-sm">
                      </div>
                      <div class="col-sm">
                        <div class="price">
                            <h2>PRICE</h2>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="quantity">
                            <h2>QUANTITY</h2>
                        </div>
                      </div>
                      <div class="col-sm">
                        <div class="total">
                            <h2>TOTAL</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr style="height:2px;border-width:0;color:gray;background-color:#fff; margin-top: 15px;">

                  

                  <div class="productelements" id="cartItemsContainer">
                    <!-- Items will be dynamically inserted here -->
                </div>
                
            </div>     

            <div class="checkout pb-3">
                <div class="checkingout">
                    <p class="tots">TOTAL</p>
                    <p class="amount" id="totalAmount">₱0.00 PHP</p>
                    <p class="tax">TAXES ARE CALCULATED AT CHECKOUT</p>
                </div>
                <div class="checkbutton">
                    <div class="row">
                        <div class="col">
                            <div class="continue">
                              <a class="nav-link active" aria-current="page" href="user_page.php"><u>CONTINUE SHOPPING</u></a>   
                        </div>
                        </div>
                        <div class="col">
                            <div class="button button d-grid gap-2 d-md-flex justify-content-md-end">
                              <button type="button" class="btn btn1" id="checkoutButton">
                                <a class="nav-link active" aria-current="page" href="receiptLogin.php">CHECKOUT</a>
                              </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
              <footer class="container-fluid foot">
                <div class="container text-center">
                  <div class="row align-items-start">
                    <div class="col">
                      <img src="pic/logo.png" alt="" class="footerlogo">
                    </div>
                    <div class="col">
                      <div class="storelocs">
                        <p class="loc">STORE LOCATIONS</p>
                        <p class="RIZAL">121 J.P RIZAL STREET, SAN ROQUE MARIKINA CITY, 1801 METRO MANILA PHILIPPINES<br>MONDAY * SATURDAT: 7:30AM - 8:30 PM</p>
                        <p class="EASTWOOD">41 EASTWOOD AVENUE BAGUMBAYAN, QUEZON CITY, 1800 METRO MANILA, PHILIPPINES<br>MONDAY * FRIDAY: 10:30 AM * 10:30 PM</p>
                        <p class="ROXAS">GENERAL ROXAS AVENUE, CUBAO, QUEZON CITY, 1109 METRO MANILA, PHILIPPINES<br>MONDAY * FRIDAY:9:30 AM * 9:30 PM SATURDAY 8:30 AM * 10:00 PM</p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="contactus">
                        <p class="contact-link">Contact Us</p>
                        <p class="num">*(63) 9391382211</p>
                        <p class="tel">8888-7777-7777</p>
                        <div class="socials">
                          <img src="https://cdn.glitch.global/4000858b-df32-4c72-b2d3-be770b557d89/fb.png?v=1713868413732" class="fb">
                          <img src="https://cdn.glitch.global/4000858b-df32-4c72-b2d3-be770b557d89/twt.png?v=1713868418698" class="twt">
                          <img src="https://cdn.glitch.global/4000858b-df32-4c72-b2d3-be770b557d89/inst.png?v=1713868408279" class="inst">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </footer>

              <footer class="text-center footer-credit">
                <p class="credit">® GROUP 6. T.I.P.QC © 2024 COPYRIGHT</p>
            </footer>

              
         
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="cart.js"></script>
    
  </body>
</html>