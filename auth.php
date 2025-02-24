<?php

function registerOrLogin($pdo, $username, $email, $password, $phone = null) {
    // Check if the user already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->execute(['username' => $username, 'email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        // User exists, attempt to login
        if (password_verify($password, $user['password'])) { // Assuming you store hashed passwords
            echo "Login successful!";
            // You can set session variables or other login logic here
        } else {
            echo "Invalid password.";
        }
    } else {
        // User does not exist, proceed with registration
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, phone, password, created_at) VALUES (:username, :email, :phone, :password, NOW())");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'password' => $hashedPassword
        ]);
        echo "Registration successful!";
    }
}

// Example usage
registerOrLogin($pdo, 'testuser', 'test@example.com', 'yourpassword123', '1234567890');

?>