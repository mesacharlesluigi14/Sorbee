<?php
    @include 'config.php';
    session_start();

    if (isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];

        $deleteQuery = "DELETE FROM user_form WHERE id = '$id'";
        mysqli_query($conn, $deleteQuery);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['edit_id'];
        $name = $_POST['edit_name'];
        $email = $_POST['edit_email'];

        $updateQuery = "UPDATE user_form SET name = '$name', email = '$email' WHERE id = '$id'";
        mysqli_query($conn, $updateQuery);
    }

    $sql = "SELECT * FROM user_form";
    $result = mysqli_query($conn, $sql);
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
    <link href="uved.css" rel="stylesheet">
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

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">CONFIRM DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Row?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                <a id="deleteLink" class="btn btn-danger">DELETE</a>
            </div>
        </div>
    </div>
</div>

<?php
    $sql = "SELECT * FROM user_form";
    $result = mysqli_query($conn, $sql);
?>

<table>
    <thead>
        <tr>
            <td colspan="6" style="text-align: center; font-weight: bold; font-size: 22px; color: white; background: linear-gradient(to right, #FFAAB4, #FF5C8D); text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); font-family: 'Lilita One', sans-serif;">EDIT ACCOUNT DATABASE</td>
        </tr>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>USERTYPE</th>
            <th>ACTIONS</th> 
        </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo strtoupper($row['user_type']); ?></td>
            <td>
                <a href="#" onclick="showDeleteModal('<?php echo $row['id']; ?>');"><i class="fas fa-trash-alt" style="margin-right: 10px; font-size: 20px;"></i></a>
                <a href="#" onclick="showEditModal('<?php echo $row['id']; ?>', '<?php echo $row['name']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['user_type']; ?>');"><i class="fas fa-edit" style="margin-right: 5px; font-size: 20px;"></i></a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel" style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); font-family: 'Lilita One', sans-serif;">EDIT ROW</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body edit-modal-form">
                <form action="" method="POST">
                    <input type="hidden" id="editId" name="edit_id">
                    <div class="mb-3">
                        <label for="editName" class="form-label">NAME</label>
                        <input type="text" class="form-control" id="editName" name="edit_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">EMAIL</label>
                        <input type="email" class="form-control" id="editEmail" name="edit_email" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showDeleteModal(id) {
        var deleteLink = document.getElementById('deleteLink');
        deleteLink.setAttribute('href', '?delete_id=' + id);
        $('#confirmDeleteModal').modal('show');
    }

    function showEditModal(id, name, email, userType) {
        var editId = document.getElementById('editId');
        var editName = document.getElementById('editName');
        var editEmail = document.getElementById('editEmail');

        editId.value = id;
        editName.value = name;
        editEmail.value = email;

        $('#editModal').modal('show');
    }
</script>
</body>
</html>