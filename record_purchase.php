<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $totalAmount = $_POST['total_amount'];
    $userName = $_POST['user_name'];
    
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'sorbeedb';

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Example: Insert the user_name and total_amount into the purchase table
    $sql = "INSERT INTO purchase_form(total_amount, user_name) VALUES ('$totalAmount', '$userName')";

    if ($conn->query($sql) === TRUE) {
        echo 'Purchase recorded successfully';
    } else {
        echo 'Error recording purchase: ' . $conn->error;
    }

    $conn->close();
    exit(); // Stop further execution of the script
}

?>
