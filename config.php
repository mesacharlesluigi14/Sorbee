<?php

$host = getenv('MYSQLHOST') ?: 'localhost';
$user = getenv('MYSQLUSER') ?: 'root';
$pass = getenv('MYSQLPASSWORD') ?: '';
$db = getenv('MYSQLDATABASE') ?: 'sorbeedb';
$port = getenv('MYSQLPORT') ?: 3306;

$conn = mysqli_connect($host, $user, $pass, $db, $port);

?>