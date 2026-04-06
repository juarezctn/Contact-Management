<?php
//Tatawagin yung connection dito
include 'config.php';
include 'auth.php';

// Kunin lahat ng records para sa current user
$user_id = $_SESSION['user_id'];
$search = '';

// Get total contacts count
$total_contacts_result = $conn->query("SELECT COUNT(*) as count FROM contacts WHERE user_id = $user_id");
$total_contacts = $total_contacts_result->fetch_assoc()['count'];

// Handle search
if(isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $result = $conn->query("SELECT * FROM contacts WHERE user_id = $user_id AND (name LIKE '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%' OR address LIKE '%$search%')");
} else {
    $result = $conn->query("SELECT * FROM contacts WHERE user_id = $user_id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management System</title>
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        .total-contacts {
            margin: 10px 0;
            font-size: 1.1em;
            color: #666;
        }
        .total-contacts strong {
            color: #c41e3a;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            CONTACT MANAGER
        </div>
        <ul class="nav-menu">
            <li><a href="index.php" class="nav-link active">Contacts</a></li>
            <li><a href="create.php" class="nav-link">Add Contact</a></li>
            <li><a href="about.php" class="nav-link">About</a></li>
            <li><a href="developers.php" class="nav-link">Developers</a></li>
            <li><a href="logout.php" class="nav-link logout-link">Logout</a></li>
        </ul>
    </div>
</nav>

<!-- Main Content -->
<div class="container">
    <div class="content-header">
        <h1>Contact List</h1>
        <div class="total-contacts">
            <span>Total Contacts: <strong><?= $total_contacts ?></strong></span>
        </div>
        <div class="user-welcome">
            <span>Welcome, <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong></span>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-container" style="margin-bottom: 20px; display: flex; gap: 10px;">
        <form method="GET" style="display: flex; gap: 10px; width: 100%;">
            <input type="text" name="search" placeholder="Search by name, phone, email, or address..." value="<?= htmlspecialchars($search) ?>" style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px;">
            <button type="submit" class="btn-search" style="padding: 10px 20px; background-color: #c41e3a; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">Search</button>
            <?php if($search): ?>
                <a href="index.php" class="btn-clear" style="padding: 10px 20px; background-color: #666; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; text-decoration: none; display: flex; align-items: center;">✕ Clear</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="table-wrapper">
        <table class="contacts-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['address']) ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id'] ?>" class="btn-edit">✎ Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Sigurado ka ba?')">🗑 Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="no-data">
                            <?php if($search): ?>
                                No contacts found matching "<?= htmlspecialchars($search) ?>". <a href="index.php">Clear search</a>
                            <?php else: ?>
                                No contacts found. <a href="create.php">Add one now!</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>