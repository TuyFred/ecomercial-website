<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection
require_once 'pdo-connectional.php';

// Function to retrieve all users
function getAllUsers($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT user_id, username, email, phone, created_at, updated_at, status FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle database query error
        echo "Database query error: " . htmlspecialchars($e->getMessage());
        return [];
    }
}

// Function to delete a user
function deleteUser($pdo, $userId) {
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $userId);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Database deletion error: " . htmlspecialchars($e->getMessage());
        return false;
    }
}

// Check if PDO connection is established
if (!$pdo) {
    die("Database connection failed: " . htmlspecialchars($pdo->errorInfo()[2]));
}

// Handle delete request
if (isset($_POST['delete'])) {
    $userId = $_POST['user_id'];
    if (deleteUser($pdo, $userId)) {
        echo "User deleted successfully.";
    } else {
        echo "Failed to delete user.";
    }
}

// Retrieve users
$users = getAllUsers($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <!-- Sidebar -->
        <aside>
            <div class="top">
                <div class="logo">
                    <h2>C<span class="danger">BABAR</span></h2>
                </div>
                <div class="close" id="close_btn">
                    <span class="material-symbols-outlined">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="#"><span class="material-symbols-outlined">grid_view</span><h3>Dashboard</h3></a>
                <a href="#" class="active"><span class="material-symbols-outlined">person_outline</span><h3>Customers</h3></a>
                <a href="#"><span class="material-symbols-outlined">insights</span><h3>Analytics</h3></a>
                <a href="#"><span class="material-symbols-outlined">mail_outline</span><h3>Messages</h3><span class="msg_count">14</span></a>
                <a href="#"><span class="material-symbols-outlined">receipt_long</span><h3>Products</h3></a>
                <a href="manage_users.php"><span class="material-symbols-outlined">manage_accounts</span><h3>Manage Users</h3></a>
                <a href="#"><span class="material-symbols-outlined">report_gmailerrorred</span><h3>Reports</h3></a>
                <a href="#"><span class="material-symbols-outlined">settings</span><h3>Settings</h3></a>
                <a href="#"><span class="material-symbols-outlined">add</span><h3>Add Product</h3></a>
                <a href="#"><span class="material-symbols-outlined">logout</span><h3>Logout</h3></a>
            </div>
        </aside> 

        <!-- Main Content -->
        <main class="home">
            <h1>Manage Users</h1>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($user['phone'] ?? 'N/A'); ?></td>
                                <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                                <td><?php echo htmlspecialchars($user['updated_at'] ?? 'N/A'); ?></td>
                                <td><?php echo htmlspecialchars($user['status'] ?? 'N/A'); ?></td>
                                <td>
                                    <form method="POST" action="update_user.php" style="display:inline;">
                                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id']); ?>">
                                        <button type="submit">Update</button>
                                    </form>
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id']); ?>">
                                        <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7">No users found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>

        <!-- Right Section -->
        <div class="right">
            <div class="top">
                <button id="menu_bar">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-outlined active">light_mode</span>
                    <span class="material-symbols-outlined">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p><b>FRED</b></p>
                        <p>Admin</p>
                    </div>
                    <div class="profile-photo">
                        <img src="image/profile-1.svg" alt="Profile Picture">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>