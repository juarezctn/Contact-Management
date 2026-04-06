<?php
include 'config.php';
include 'auth.php';

$user_id = $_SESSION['user_id'];
// Kunin ang ID
$id = $_GET['id'];

// Delete query (verify ownership)
$sql = "DELETE FROM contacts WHERE id=$id AND user_id=$user_id";

if($conn->query($sql)) {
    // Redirect pabalik
    header("Location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>