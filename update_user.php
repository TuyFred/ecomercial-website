<?php
require_once 'pdo-connectional.php';

$userData = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];

    // Fetch user data based on user_id for pre-filling the form
    try {
        $stmt = $pdo->prepare("SELECT username, email, phone, status FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Database query error: " . htmlspecialchars($e->getMessage());
    }
}

// Handle form submission for updating user data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    try {
        $stmt = $pdo->prepare("UPDATE users SET username = :username, email = :email, phone = :phone, status = :status WHERE user_id = :user_id");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        echo "User updated successfully.";
        header("Location: dash.php");
    } catch (PDOException $e) {
        echo "Database update error: " . htmlspecialchars($e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Update User Details</h2>
    <form method="POST" action="">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>">

        <div class="form-group">
            <label for="username"><i class="fas fa-user"></i> Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($userData['username'] ?? ''); ?>" required>
        </div>

        <div class="form-group">
            <label for="email"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($userData['email'] ?? ''); ?>" required>
        </div>

        <div class="form-group">
            <label for="phone"><i class="fas fa-phone"></i> Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($userData['phone'] ?? ''); ?>">
        </div>

        <div class="form-group">
            <label for="status"><i class="fas fa-check-circle"></i> Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active" <?php echo (isset($userData['status']) && $userData['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                <option value="inactive" <?php echo (isset($userData['status']) && $userData['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
            </select>
        </div>

        <button type="submit" name="update" class="btn btn-primary"><i class="fas fa-save"></i> Update User</button>
        <a href="manage_users.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Users</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>