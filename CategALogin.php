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
  <title>Sorbee Menu: Treats</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
  <link href="CategA.css" rel="stylesheet">
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
            <a class="nav-link" href="#">TREATS</a>
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
  
  <div class="container mt-5">
    <div class="item-center cone-divider">
      <div class = "cone-image">
      </div>
    </div>
    <div class="divider">
      <img src="pic/cones.png" alt="Divider Image">
  </div>
    <!-- First Row -->
    <div class="row mb-4">
        <!-- Box 1 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://www.pngkey.com/png/detail/16-162289_cotton-candy-cotton-candy-ice-cream-png.png">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Tri-Color Delight</p>
              <p class="text-center item-price">30.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Tri-Color Delight', 'the specialty flavors and the appealing sight of the ice cream. Enjoy your “Tri-Color Delight!” 😊🍦', '30.00 PHP', 'https://www.pngkey.com/png/detail/16-162289_cotton-candy-cotton-candy-ice-cream-png.png')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>
  
        <!-- Box 2 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://4.imimg.com/data4/VJ/QT/GLADMIN-182259/chocolate-ice-cream-cone-250x250.jpg">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Chocolate Swirl</p>
              <p class="text-center item-price">35.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Chocolate Swirl Fantasy', 'A   rich and creamy chocolate ice cream served in a crispy cone, perfect for satisfying your sweet cravings 🍦.', '35.00 PHP', 'https://4.imimg.com/data4/VJ/QT/GLADMIN-182259/chocolate-ice-cream-cone-250x250.jpg')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>
  
        <!-- Box 3 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://www.nestleprofessional.co.id/sites/default/files/srh_recipes/b683df6af4cbdd4ff565dae0506d70ca_vanilla_serve.png">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Vanilla Dream</p>
              <p class="text-center item-price">30.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Classic Vanilla Dream', 'A delightful swirl of creamy vanilla ice cream nestled in a crispy, golden waffle cone, offering a heavenly taste with every bite 🍦.', '30.00 PHP', 'https://www.nestleprofessional.co.id/sites/default/files/srh_recipes/b683df6af4cbdd4ff565dae0506d70ca_vanilla_serve.png')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>
  
        <!-- Box 4 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://cdn11.bigcommerce.com/s-ek50668lzs/images/stencil/1280x1280/products/4086/4666/strawberry-cone__29310.1704216516.jpg?c=1?imbypass=on">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Strawberry Bliss</p>
              <p class="text-center item-price">32.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Strawberry Bliss Cone', 'A creamy strawberry ice cream nestled in a crispy cone, offering a perfect blend of sweetness and crunchiness 🍦.', '32.00 PHP', 'https://cdn11.bigcommerce.com/s-ek50668lzs/images/stencil/1280x1280/products/4086/4666/strawberry-cone__29310.1704216516.jpg?c=1?imbypass=on')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>
      </div>

    <div class="divider">
      <img src="pic/cups.png" alt="Divider Image">
  </div>
    
    <!-- Second Row -->
    <div class="row mb-4">
      <!-- Box 5 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRJeGC2FqKAs18BOez3FMvyxoMB9wVHPRRCSThuwjOc13C8V28a">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Choco Indulgence</p>
            <p class="text-center item-price">63.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Choco Indulgence', 'A heavenly dessert with layers of creamy ice cream and rich chocolate sauce, topped with a cherry and chocolate bars 😋.', '63.00 PHP', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRJeGC2FqKAs18BOez3FMvyxoMB9wVHPRRCSThuwjOc13C8V28a')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 6 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRvMMsbw0G7fF-NbAXz1qcvdW3mr6OfK5oGiT5lMI3sZK1Y4OHC">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Choco Mint Delight</p>
            <p class="text-center item-price">65.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Choco Mint Delight', 'A perfect blend of mint and chocolate ice cream, adorned with a cookie and fresh mint 🍨.', '65.00 PHP', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRvMMsbw0G7fF-NbAXz1qcvdW3mr6OfK5oGiT5lMI3sZK1Y4OHC')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 7 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://3.imimg.com/data3/PX/FC/MY-11513121/fabulous-fer-rocher-sundae-ice-cream-250x250.jpg">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Sweet Symphony</p>
            <p class="text-center item-price">70.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Sweet Symphony', 'A luscious mix of creamy ice cream and crunchy toppings, all drizzled with delectable sauces 😋.', '70.00 PHP', 'https://3.imimg.com/data3/PX/FC/MY-11513121/fabulous-fer-rocher-sundae-ice-cream-250x250.jpg')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 8 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlRD6pxopK6lJlU9gY3A01DWmXLyEOuwecWdAO9VrRkFKHlDX5">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Choco Delight</p>
            <p class="text-center item-price">66.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Choco Delight', 'A divine concoction of chocolate ice cream, whipped cream, and crispy wafers, crowned with a cherry 🍦.', '66.00 PHP', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlRD6pxopK6lJlU9gY3A01DWmXLyEOuwecWdAO9VrRkFKHlDX5')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>
    </div>

    <div class="divider">
      <img src="pic/sundaes.png" alt="Divider Image">
  </div>

    <!-- Third Row -->
      <div class="row mb-4">
        <!-- Box 9 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://th.bing.com/th/id/OIG4.G8wBcZOrvNZ5p.Wp28UI?w=173&h=173&c=6&r=0&o=5&dpr=1.3&pid=ImgGn">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Choco Vanilla Delight</p>
            <p class="text-center item-price">40.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Choco Vanilla Delight', 'A creamy concoction of chocolate and vanilla ice cream swirled together in a clear cup 🍦.', '40.00 PHP', 'https://th.bing.com/th/id/OIG4.G8wBcZOrvNZ5p.Wp28UI?w=173&h=173&c=6&r=0&o=5&dpr=1.3&pid=ImgGn')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 10 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://th.bing.com/th/id/OIG1.VrYabiNMKxrr1m6dRYwT?pid=ImgGn">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Mango Swirl Delight</p>
            <p class="text-center item-price">45.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Mango Swirl Delight', 'A creamy concoction of chocolate and vanilla ice cream swirled together in a clear cup 🍦.', '45.00 PHP', 'https://th.bing.com/th/id/OIG1.VrYabiNMKxrr1m6dRYwT?pid=ImgGn')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 11 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://th.bing.com/th/id/OIG2.aC50IVRux7LqGABr5gf7?pid=ImgGn">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Caramel Swirl Delight</p>
            <p class="text-center item-price">50.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Caramel Swirl Delight', 'A creamy ice cream masterpiece adorned with a rich caramel drizzle, served in an eco-friendly cup 🍦.', '50.00 PHP', 'https://th.bing.com/th/id/OIG2.aC50IVRux7LqGABr5gf7?pid=ImgGn')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 12 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://th.bing.com/th/id/OIG4.wdOmHu4HB2Aex6thYvhE?pid=ImgGn">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Matcha Swirl Delight</p>
            <p class="text-center item-price">48.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Matcha Swirl Delight', 'A creamy soft serve ice cream served atop a crunchy mix of nuts in a green cup 🍦.', '48.00 PHP', 'https://th.bing.com/th/id/OIG4.wdOmHu4HB2Aex6thYvhE?pid=ImgGn')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>
    </div>

      <div class="divider">
      <img src="pic/floats.png" alt="Divider Image">
  </div>

      <!-- Fourth Row -->
      <div class="row mb-4">
        <!-- Box 13 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://t3.ftcdn.net/jpg/06/72/97/82/240_F_672978285_4j8zH5J89Yl1qn63zfTz5OK1TBqe9u3t.jpg">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Choco Float</p>
            <p class="text-center item-price">80.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Choco Float', 'A tempting mix of chocolate syrup and vanilla ice cream, topped with fluffy whipped cream 🍦.', '80.00 PHP', 'https://t3.ftcdn.net/jpg/06/72/97/82/240_F_672978285_4j8zH5J89Yl1qn63zfTz5OK1TBqe9u3t.jpg')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 14 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://th.bing.com/th/id/OIG1.eXfvEFxjJIgzE3GGQKYj?pid=ImgGn">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Frothy Root Float</p>
            <p class="text-center item-price">85.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Frothy Root Float', 'A fizzy and creamy float that is the perfect blend of soda and vanilla ice cream 🍦.', '85.00 PHP', 'https://th.bing.com/th/id/OIG1.eXfvEFxjJIgzE3GGQKYj?pid=ImgGn')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 15 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://th.bing.com/th/id/OIG2.ZFmq56WnQpv43V20gIl5?pid=ImgGn">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Strawberry Cream</p>
            <p class="text-center item-price">83.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Strawberry Cream Float', 'A delightful blend of fizzy soda and creamy vanilla ice cream, garnished with a fresh strawberry 🍦.', '83.00 PHP', 'https://th.bing.com/th/id/OIG2.ZFmq56WnQpv43V20gIl5?pid=ImgGn')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>

      <!-- Box 16 -->
      <div class="col-lg-3 mb-4">
        <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
          <div class="product-info">
            <div class="backframe">
                <div class="innerframe">
                    <img class="itemframe" src="https://th.bing.com/th/id/OIG2.I9gKOIwOFih2IBW7x7hP?pid=ImgGn">
                </div>
            </div>
            </div>
            <p class="font-bold text-center item-name">Matcha Leaf Float</p>
            <p class="text-center item-price">90.00<span class="currency"> PHP</span></p> 
            <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Matcha Leaf Float', 'A mesmerizing blend of creamy green tea ice cream topped with chewy bubbles, nestled in a glass of refreshing iced tea 🍦.', '90.00 PHP', 'https://th.bing.com/th/id/OIG2.I9gKOIwOFih2IBW7x7hP?pid=ImgGn')">
              <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
            </button>
        </div>
      </div>
    </div>

        <div class="divider">
          <img src="pic/yogurts.png" alt="Divider Image">
      </div>

      <!-- Fifth Row -->
      <div class="row mb-4">
          <!-- Box 17 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://th.bing.com/th/id/OIG2.E52TA8PRLXrj5PHD5uk9?pid=ImgGn">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Mango Tango Yogurt</p>
              <p class="text-center item-price">70.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Mango Tango Yogurt', 'A delightful combination of creamy yogurt ice cream and fresh mango cubes, offering a tangy flavor explosion 🍦.', '70.00 PHP', 'https://th.bing.com/th/id/OIG2.E52TA8PRLXrj5PHD5uk9?pid=ImgGn')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>

        <!-- Box 18 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://th.bing.com/th/id/OIG1.5_k_epI6l8dNN5bJ8Bhv?pid=ImgGn">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Blueberry Bliss Yogurt</p>
              <p class="text-center item-price">75.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Blueberry Bliss Yogurt', 'A creamy yogurt ice cream swirled with blueberry syrup for a refreshing treat 🍦.', '75.00 PHP', 'https://th.bing.com/th/id/OIG1.5_k_epI6l8dNN5bJ8Bhv?pid=ImgGn')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>

        <!-- Box 19 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://th.bing.com/th/id/OIG2.Q4MBrFmZFwpQMEFKNWKT?pid=ImgGn">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Raspberry Ripple</p>
              <p class="text-center item-price">85.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Raspberry Ripple Yogurt', 'A creamy yogurt ice cream adorned with fresh raspberries for a tangy and refreshing treat 🍦', '85.00 PHP', 'https://th.bing.com/th/id/OIG2.Q4MBrFmZFwpQMEFKNWKT?pid=ImgGn')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>

        <!-- Box 20 -->
        <div class="col-lg-3 mb-4">
          <div class="flex flex-col items-center bg-yellow-100 p-2 rounded-lg shadow-lg">
            <div class="product-info">
              <div class="backframe">
                  <div class="innerframe">
                      <img class="itemframe" src="https://th.bing.com/th/id/OIG4.BcENKegnIzMHsl.AMKKv?pid=ImgGn">
                  </div>
              </div>
              </div>
              <p class="font-bold text-center item-name">Coconut Craze Yogurt</p>
              <p class="text-center item-price">80.00<span class="currency"> PHP</span></p> 
              <button class="mt-2 cart-button p-2 rounded-full" onclick="showItemDetails('Coconut Craze Yogurt', ' A creamy coconut yogurt ice cream topped with chocolate balls and sprinkled with shredded coconut for a delightful taste sensation 🍦.', '80.00 PHP', 'https://th.bing.com/th/id/OIG4.BcENKegnIzMHsl.AMKKv?pid=ImgGn ')">
                <img src="pic/addtocart.png" alt="Add to Cart" class="items-center cart-icon">
              </button>
          </div>
        </div>
      </div>  
    </div>

  <!-- Modal -->
  <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-text modal-box modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="itemModalLabel">Item Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="itemDetails">
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn mod-add-to-cart" id="addToCartBtn">
            <img src="pic/addtocart.png" alt="Modal Add to Cart" class="items-center mod-cart-icon">
          </button>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="CategA.js"></script>
</body>
</html>
