<?php

$host = getenv('MYSQLHOST') ?: 'localhost';
$user = getenv('MYSQLUSER') ?: 'root';
$pass = getenv('MYSQLPASSWORD') ?: '';
$db   = getenv('MYSQLDATABASE') ?: 'sorbeedb';
$port = (int)(getenv('MYSQLPORT') ?: 3306);

// In PHP 8, mysqli_connect throws mysqli_sql_exception on failure.
// We catch it so the page renders gracefully without a database.
try {
    $conn = mysqli_connect($host, $user, $pass, $db, $port);
    $db_available = ($conn !== false);
} catch (Exception $e) {
    $conn = null;
    $db_available = false;
}

?>