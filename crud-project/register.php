<?php
// register.php
session_start();

// If user is already logged in, redirect to index
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'config.php';

$error = "";
$success = "";

// Check kung na-submit ang form
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password match
    if($password !== $confirm_password) {
        $error = "Passwords do not match";
    } else if(strlen($password) < 6) {
        $error = "Password must be at least 6 characters";
    } else {
        // Check kung may existing email
        $check_sql = "SELECT * FROM users WHERE email = '$email'";
        $check_result = $conn->query($check_sql);

        if($check_result->num_rows > 0) {
            $error = "Email already registered";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user
            $sql = "INSERT INTO users (name, email, password) 
                    VALUES ('$name', '$email', '$hashed_password')";

            if($conn->query($sql)) {
                $success = "Registration successful! <a href='login.php'>Login now</a>";
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Contact Management System</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="login-page">

<div class="container">
    <!-- Left Panel - Visual Design -->
    <div class="left-panel"></div>

    <!-- Right Panel - Register Form -->
    <div class="right-panel">
        <div class="register-container">
            <h2>Contact Management System</h2>
            <h3>Create Account</h3>

            <?php if($error): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php if($success): ?>
                <div class="success-message"><?= $success ?></div>
            <?php else: ?>
            <form method="POST" class="register-form">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password (min 6 chars)" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit" name="register">Register</button>
            </form>
            <?php endif; ?>

            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</div>

</body>
</html>
