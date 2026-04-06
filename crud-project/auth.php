<?php
// auth.php
// This file checks if user is logged in

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
