<?php
// login.php
session_start();

// If user is already logged in, redirect to index
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'config.php';

$error = "";

// Check kung na-submit ang form
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query para hanapin ang user
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if(password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];
            
            // Redirect sa index
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "No user found with that email";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Contact Management System</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="login-page">

<div class="container">
    <!-- Left Panel - Visual Design -->
    <div class="left-panel"></div>

    <!-- Right Panel - Login Form -->
    <div class="right-panel">
        <div class="login-container">
            <h2>Contact Management System</h2>
            <h3>User Login</h3>

            <?php if($error): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" class="login-form">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
            </form>

            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</div>

</body>
</html>
