<?php
include 'config.php';
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developers - Contact Manager</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            CONTACT MANAGER
        </div>
        <ul class="nav-menu">
            <li><a href="index.php" class="nav-link">Contacts</a></li>
            <li><a href="create.php" class="nav-link">Add Contact</a></li>
            <li><a href="about.php" class="nav-link">About</a></li>
            <li><a href="developers.php" class="nav-link active">Developers</a></li>
            <li><a href="logout.php" class="nav-link logout-link">Logout</a></li>
        </ul>
    </div>
</nav>

<!-- Main Content -->
<div class="container">
    <div class="page-container">
        <div class="developers-list" style="display: flex; align-items: center; margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">
            <img src="assets/camua.png" alt="Profile" style="width: 80px; height: 80px; min-width: 80px; margin-right: 20px; border-radius: 50%; object-fit: cover;">
            <h3 style="margin: 0;">Camua, Franz Ella Ricci - UI/UX Designer</h3>
        </div>
        
        <div class="developers-list" style="display: flex; align-items: center; margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">
            <img src="assets/juarez.png" alt="Profile" style="width: 80px; height: 80px; min-width: 80px; margin-right: 20px; border-radius: 50%; object-fit: cover;">
            <h3 style="margin: 0;">Juarez, Christian Jay - Backend Developer</h3>
        </div>
        
        <div class="developers-list" style="display: flex; align-items: center; margin-bottom: 30px; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">
            <img src="assets/penaloza.jpg" alt="Profile" style="width: 80px; height: 80px; min-width: 80px; margin-right: 20px; border-radius: 50%; object-fit: cover;">
            <h3 style="margin: 0;">Penaloza, Milarnie Emmanuel - UI/UX Designer</h3>
        </div>
        
        <div style="padding: 20px; background-color: #f5f5f5; border-left: 4px solid #c41e3a; margin-top: 30px;">
            <p style="margin: 0;"><strong>Contact Us:</strong> <a href="mailto:Cajupe@email.com">Cajupe@email.com</a></p>
        </div>
    </div>
</div>

</body>
</html>
