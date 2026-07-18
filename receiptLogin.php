<?php
session_start();


@include 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="receiptLogin.css" rel="stylesheet">
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
            <a class="nav-link" href="logout.php" class="btn">LOGOUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cartLogin.php">CARTS</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
  <div class="receipt">
    <div class="summary rounded-5">
      <h2 style="text-align: center; position: relative; top: 10px;">PURCHASE RECEIPT</h2>
      <hr style="border: none; height: 2px; background-color: black; margin: 10px auto;">
      <form id="receiptForm" method="POST" action="record_purchase.php">
        <table class="table">
          <thead>
            <tr>
              <th>PRODUCTS</th>
              <th>QUANTITY</th>
              <th>AMOUNT</th>
            </tr>
          </thead>
          <tbody id="cartItemsContainer">
            <!-- Cart items will be loaded here dynamically -->
          </tbody>
        </table>
      </form>
    
      <div class="modal fade" id="processingModal" tabindex="-1" aria-labelledby="processingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="processingModalLabel">Processing Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Your order is being processed. Please wait...</p>
      </div>
    </div>
  </div>
</div>
              <div class="shortsum">
                <hr style="height:2px;border-width:0;color:gray;background-color:#fff;">
                <div class="container text-center">
                  <div class="row align-items-start">
                    <div class="col totals">
                      <p>SUBTOTAL</p>
                      <p>TAXES</p>
                      <p>TOTAL</p>
                    </div>
                    <div class="col prices">
                      <p id="subtotal">0</p>
                      <p id="taxes">0</p>
                      <p id="total">0</p> 
                    </div>              
                  </div>
                </div>
              </div>

              <div class="checkbutton">
                <div class="row">
                  <div class="col">
                    <div class="continue">
                      <a class="nav-link active" aria-current="page" href="CategALogin.php"><u>CONTINUE SHOPPING</u></a>
                    </div>
                  </div>
                  <div class="col">
                    <div class="button button d-grid gap-2 d-md-flex justify-content-md-end">
                      <button type="submit" class="btn btn1" id="checkoutButton">DONE</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      
    </div>
    <script>
      function loadCartItemsForReceipt() {
        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        const cartItemsContainer = document.getElementById('cartItemsContainer');
        let subtotal = 0;

        cartItems.forEach(item => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${item.name}</td>
            <td>${item.quantity}</td>
            <td>${(parseFloat(item.price) * parseInt(item.quantity)).toFixed(2)}</td>
          `;
          cartItemsContainer.appendChild(row);
          subtotal += parseFloat(item.price) * parseInt(item.quantity || 0);
        });

        const subtotalElement = document.getElementById('subtotal');
        const taxes = subtotal * 0.12; // Assuming 12% tax
        const total = subtotal + taxes;

        subtotalElement.textContent = subtotal.toFixed(2);
        document.getElementById('taxes').textContent = taxes.toFixed(2);
        document.getElementById('total').textContent = total.toFixed(2);
      }

      document.addEventListener('DOMContentLoaded', loadCartItemsForReceipt);
      document.getElementById('checkoutButton').addEventListener('click', function () {
        const processingModal = new bootstrap.Modal(document.getElementById('processingModal'));
  processingModal.show();

        this.disabled = true; // Disable the button to prevent multiple submissions

        const userName = "<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?>";
        const totalAmount = parseFloat(document.getElementById('total').textContent).toFixed(2);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'record_purchase.php');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
          // Handle the response if needed
          // For example, display a success message
          console.log(xhr.responseText);
        };
        xhr.send('user_name=' + encodeURIComponent(userName) + '&total_amount=' + encodeURIComponent(totalAmount));
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
  </body>
</html>
