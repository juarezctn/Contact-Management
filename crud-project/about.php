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
    <title>About - Contact Manager</title>
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
            <li><a href="about.php" class="nav-link active">About</a></li>
            <li><a href="developers.php" class="nav-link">Developers</a></li>
            <li><a href="logout.php" class="nav-link logout-link">Logout</a></li>
        </ul>
    </div>
</nav>

<!-- Main Content -->
<div class="container">
    <div class="page-container">
        <h1>About</h1>
        
        <p>
            This Contact Management System is designed to help users organize and manage their contacts easily. It allows users to add, edit, delete, and view contact information in a simple and user-friendly way. This project was created to provide a convenient solution for keeping personal and important contact details in one place.
        </p>
        
        <h2 style="color: #c41e3a; margin-top: 30px; margin-bottom: 15px; font-size: 24px;">Features:</h2>
        
        <ul style="color: #555; margin-left: 20px; line-height: 2;">
            <li>Add Contacts</li>
            <li>Edit/Delete Contacts</li>
        </ul>
    </div>
</div>

</body>
</html>
