<?php
include 'config.php';
include 'auth.php';

$user_id = $_SESSION['user_id'];
// Kunin ang ID mula URL
$id = $_GET['id'];

// Kunin ang existing data (verify ownership)
$result = $conn->query("SELECT * FROM contacts WHERE id=$id AND user_id=$user_id");

if($result->num_rows == 0) {
    die("Contact not found or you don't have permission to edit this");
}

$row = $result->fetch_assoc();

// Kapag submit
if(isset($_POST['update'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Update query
    $sql = "UPDATE contacts 
            SET name='$name', phone='$phone', email='$email', address='$address'
            WHERE id=$id AND user_id=$user_id";

    if($conn->query($sql)) {
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
    <title>Edit Contact</title>
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
            <li><a href="developers.php" class="nav-link">Developers</a></li>
            <li><a href="logout.php" class="nav-link logout-link">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="form-container">
    <h2>Edit Contact</h2>
    <a href="index.php" class="back-link">← Back to List</a>

    <form method="POST" class="contact-form">
        <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
        <input type="text" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" required>
        <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>
        <textarea name="address" required><?= htmlspecialchars($row['address']) ?></textarea>
        <button type="submit" name="update">Update</button>
    </form>
</div>

</body>
</html>