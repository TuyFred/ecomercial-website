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
                <input type="text" placeholder="Username" required>
                <i class="fas fa-user icon"></i>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" required>
                <i class="fas fa-lock icon"></i>
            </div>
            <p class="forgot-password">Forgot password?</p>
            <button class="btn">Login</button>
            <p style="margin-top: 10px; color: #999;">or login with E-commercial</p>
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
            <div class="form-group">
                <input type="text" placeholder="Username" required>
                <i class="fas fa-user icon"></i>
            </div>
            <div class="form-group">
                <input type="email" placeholder="Email" required>
                <i class="fas fa-envelope icon"></i>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" required>
                <i class="fas fa-lock icon"></i>
            </div>
            <button class="btn">Register</button>
            <p style="margin-top: 10px; color: #999;">or register with E-commerical</p>
            <div class="social-login">
                <i class="fab fa-google"></i>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-github"></i>
                <i class="fab fa-linkedin"></i>
            </div>
        </div>
    </div>

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
