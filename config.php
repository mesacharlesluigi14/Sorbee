<?php

$host = getenv('MYSQLHOST') ?: 'localhost';
$user = getenv('MYSQLUSER') ?: 'root';
$pass = getenv('MYSQLPASSWORD') ?: '';
$db   = getenv('MYSQLDATABASE') ?: 'sorbeedb';
$port = (int)(getenv('MYSQLPORT') ?: 3306);

// Suppress connection warnings; check $db_available before using $conn
$conn = @mysqli_connect($host, $user, $pass, $db, $port);
$db_available = ($conn !== false);

?>