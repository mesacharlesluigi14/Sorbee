<?php

    @include 'config.php';

    session_start();


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
    <link href="ua.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <a class="navbar-brand d-lg-none" href="#">
            <img src="pic/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link">
                        <span>ADMIN:
                            <i class="fas fa-user fa-s"></i>
                            <?php echo strtoupper($_SESSION['admin_name']); ?>
                        </span>
                    </a>
                </li>
                <a class="navbar-brand d-none d-lg-block" href="#">
                    <img src="pic/logo.png" alt="">
                </a>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" class="btn">LOGOUT</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="admincon">
    <div class="admintent">
        <h1><span><?php echo $_SESSION['admin_name'] ?> </span> ADMIN PANEL</h1>
    </div>
</div>

<div class="container mt-5 dbselect" style="background-image: url('pic/adbg.jpg'); background-size: 1200px, 400px; background-position: center;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <div class="card mx-3">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h5 class="card-title">Registered Accounts</h5>
                        <p class="card-text">View the registered user accounts Database.</p>
                        <a href="viewregdatabase.php" class="btn db1">View</a>
                    </div>
                </div>
                <div class="card mx-3">
                    <div class="card-body text-center">
                        <i class="fas fa-edit fa-3x mb-3"></i>
                        <h5 class="card-title">Update Accounts</h5>
                        <p class="card-text">Edit the user account information in database.</p>
                        <a href="editregdatabase.php" class="btn db2">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



 

    <script src="function.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>