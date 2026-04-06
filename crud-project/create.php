<?php
include 'config.php';
include 'auth.php';

$user_id = $_SESSION['user_id'];

// Check kung na-submit ang form
if(isset($_POST['submit'])) {

    // Kunin ang input
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Insert query
    $sql = "INSERT INTO contacts (user_id, name, phone, email, address) 
            VALUES ($user_id, '$name', '$phone', '$email', '$address')";

    if($conn->query($sql)) {
        // Redirect pabalik sa index
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
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
            <li><a href="create.php" class="nav-link active">Add Contact</a></li>
            <li><a href="about.php" class="nav-link">About</a></li>
            <li><a href="developers.php" class="nav-link">Developers</a></li>
            <li><a href="logout.php" class="nav-link logout-link">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="form-container">
    <h2>Add Contact</h2>
    <a href="index.php" class="back-link">← Back to List</a>

    <form method="POST" class="contact-form">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <button type="submit" name="submit">Save</button>
    </form>
</div>

</body>
</html>