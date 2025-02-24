<?php
session_start();
// Database connection settings
$host = 'localhost';
$dbname = 'db_ecommercial';
$username = 'root';
$password = 'Fred0727167240@';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
        // Get user input from the registration form
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
        $created_by = 1; // Set created_by as admin (you can adjust this based on your session/user system)
        $updated_by = 1; // Set updated_by as admin (this can be dynamic in a real system)
        $role_id = null; // Default user role (you can set this based on your system)
        $status = 'active'; // Default user status

        // Prepare the SQL query to insert user data
        $sql = "INSERT INTO users (username, email, phone, created_by, updated_by, role_id, status, password)
                VALUES (:username, :email, :phone, :created_by, :updated_by, :role_id, :status, :password)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters to prevent SQL injection
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':created_by', $created_by);
        $stmt->bindParam(':updated_by', $updated_by);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':password', $password);

        // Execute the query
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error during registration.";
        }
    }
} catch (PDOException $e) {
    // Handle connection error
    echo "Error: " . $e->getMessage();
}
?>


<?php


try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        // Get user input from the login form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare the SQL query to check if the user exists
        $sql = "SELECT user_id, username, password, role_id, status FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if user exists and password matches
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, start a session and store user details
            $_SESSION['user_id'] = $user['user_id'];
           
            // Redirect to dashboard or home page
            header("Location: dash.php");
            exit;
        } else {
            // Incorrect credentials
            echo "Invalid email or password.";
        }
    }
} catch (PDOException $e) {
    // Handle connection error
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .container {
            width: 800px;
            height: 500px;
            background-color: #fff;
            display: flex;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .welcome-container {
            width: 50%;
            background-color: #4a90e2;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px;
        }

        .welcome-container h2 {
            font-size: 26px;
            margin-bottom: 10px;
        }

        .welcome-container p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .welcome-container .toggle-btn {
            padding: 10px 20px;
            font-size: 16px;
            border: 2px solid #fff;
            border-radius: 8px;
            background: none;
            color: #fff;
            cursor: pointer;
        }

        .welcome-container .toggle-btn:hover {
            background-color: #fff;
            color: #4a90e2;
        }

        .form-container {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            width: 100%;
            margin-bottom: 15px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 10px 15px;
            padding-left: 40px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            color: #333;
        }

        .form-group .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .forgot-password {
            font-size: 14px;
            color: #999;
            text-align: right;
            width: 100%;
            margin-top: -10px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            background-color: #4a90e2;
            color: #fff;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #357ABD;
        }

        .social-login {
            margin-top: 15px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .social-login i {
            font-size: 24px;
            color: #333;
            cursor: pointer;
        }

        .social-login i:hover {
            color: #4a90e2;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Welcome Back Section -->
        <div class="welcome-container">
            <h2 id="welcome-title">Hello, Welcome!</h2>
            <p id="welcome-message">Don't have an account?</p>
            <button class="toggle-btn" id="toggleToRegister" onclick="showRegister()">Register</button>
        </div>
        <!-- Login Form -->
        <div class="form-container" id="loginForm">
            <h2>Login</h2>
            <div class="form-group">
                <form method="POST">
                <input type="text" placeholder="email" required name="email">
                <i class="fas fa-user icon"></i>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" required name="password">
                <i class="fas fa-lock icon"></i>
            </div>
            <p class="forgot-password">Forgot password?</p>
            <button class="btn" name="login">Login</button>
             </form>
            <p style="margin-top: 10px; color: #999;">or login with social platforms</p>
            <div class="social-login">
                <i class="fab fa-google"></i>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-github"></i>
                <i class="fab fa-linkedin"></i>
            </div>
        </div>
        <!-- Registration Form -->

        <div class="form-container hidden" id="registerForm">
            <h2>Registration</h2>
            <form method="POST">
                <div class="form-group">
                    <input type="text" placeholder="Username" required name="username">
                    <i class="fas fa-user icon"></i>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email" required name="email">
                    <i class="fas fa-envelope icon"></i>
                </div>
                <div class="form-group">
                    <input type="phone" placeholder="phone" required name="phone">
                    <i class="fas fa-envelope icon"></i>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" required name="password">
                    <i class="fas fa-lock icon"></i>
                </div>
                <button class="btn" name="submit">Register</button>
                <p style="margin-top: 10px; color: #999;">or register with social platform</p>
                <div class="social-login">
                    <i class="fab fa-google"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-github"></i>
                    <i class="fab fa-linkedin"></i>
                </div>
        </div>
    </div>
    </form>
    <script>
        function showRegister() {
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('registerForm').classList.remove('hidden');
            document.getElementById('welcome-title').innerText = 'Welcome Back!';
            document.getElementById('welcome-message').innerText = 'Already have an account?';
            document.getElementById('toggleToRegister').innerText = 'Login';
            document.getElementById('toggleToRegister').setAttribute('onclick', 'showLogin()');
        }

        function showLogin() {
            document.getElementById('registerForm').classList.add('hidden');
            document.getElementById('loginForm').classList.remove('hidden');
            document.getElementById('welcome-title').innerText = 'Hello, Welcome!';
            document.getElementById('welcome-message').innerText = 'Don\'t have an account?';
            document.getElementById('toggleToRegister').innerText = 'Register';
            document.getElementById('toggleToRegister').setAttribute('onclick', 'showRegister()');
        }
    </script>
</body>

</html>
