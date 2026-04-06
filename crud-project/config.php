<?php
// config.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 🔌 Database connection settings
$host = "sql207.infinityfree.com";
$user = "if0_41584243";
$password = "ds8OtRAH0b";
$dbname = "if0_41584243_db_contacts";

// Gumawa ng connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check kung successful ang connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>