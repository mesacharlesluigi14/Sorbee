<?php
    @include 'config.php';
    session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Database: View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="uvad.css" rel="stylesheet">
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
                <a class="nav-link" href="admin_page.php">
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

<?php
    $sql = "SELECT * FROM user_form";
    $result = mysqli_query($conn, $sql);
?>

<table>
    <thead>
        <tr>
            <td colspan="4" style="text-align: center; font-weight: bold; font-size: 22px; color: white; background: linear-gradient(to right, #FFAAB4, #FF5C8D); text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); font-family: 'Lilita One', sans-serif;">ACCOUNT DATABASE</td>
        </tr>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>USERTYPE</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo strtoupper($row['user_type']); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>