<?php
// signup.php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

// Database connection
$host = 'localhost'; // Your database host
$db = 'assignment'; // Your database name
$user = 'root'; // Your database username
$pass = ''; // Your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert the data into the database
    $sql = "INSERT INTO user_credentials (user_name, user_email, user_password) VALUES (:name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        // Set session variables
        $_SESSION['user_id'] = $pdo->lastInsertId(); // Assuming this is your user ID
        $_SESSION['user_name'] = $name; // Store the user's name in session

        // Redirect to library.php on successful registration
        header("Location: lecturedash.php");
        exit(); // Make sure to exit after redirecting
    } else {
        $errorInfo = $stmt->errorInfo();
        $message = "Error: Could not register user. " . $errorInfo[2];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Your CSS styles here */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: linear-gradient(to bottom right, #fff 50%, #d3d3d3 50%);
            width: 600px;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 32px; /* Increased font size */
            margin-bottom: 50px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .checkbox-container input {
            margin-right: 10px;
        }
        .checkbox-container label {
            margin: 0;
        }
        .checkbox-container a {
            color: #000;
            text-decoration: none;
        }
        .checkbox-container a:hover {
            text-decoration: underline;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #006400;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
        background-color: #004d00;
        }
        .or-container {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        .or-container hr {
            flex: 1;
            border: none;
            border-top: 1px solid #ccc;
        }
        .or-container span {
            margin: 0 10px;
            color: #000;
            font-weight: bold;
        }
        .social-login {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .social-login a {
            text-decoration: none;
            color: #000;
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .social-login a i {
            margin-right: 5px;
        }
        .signin-link {
            text-align: center;
        }
        .signin-link a {
            color: #0000ff;
            text-decoration: none;
        }
        .signin-link a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function validateForm() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const nameRegex = /^[a-zA-Z\s]{2,}$/; // At least 2 characters, letters and spaces
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email format
            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/; // Minimum 8 characters, at least one letter and one number

            if (!nameRegex.test(name)) {
                alert("Error: Name must be at least 2 characters long and contain only letters and spaces.");
                return false;
            }
            if (!emailRegex.test(email)) {
                alert("Error: Please enter a valid email address.");
                return false;
            }
            if (!passwordRegex.test(password)) {
                alert("Error: Password must be at least 8 characters long, contain at least one letter and one number.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Get Started Now</h1>
        <form id="signupForm" method="POST" action="" onsubmit="return validateForm();">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            
            <label for="email">Email address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
            <div class="checkbox-container">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="#">terms & policy</a></label>
            </div>
            
            <button type="submit">Sign up</button>
        </form>
        
        <div class="or-container">
            <hr>
            <span>or</span>
            <hr>
        </div>
        
        <div class="social-login">
            <a href="https://accounts.google.com/signin/v2/identifier?client_id=YOUR_GOOGLE_CLIENT_ID&redirect_uri=YOUR_REDIRECT_URI&response_type=code&scope=email"><i class="fab fa-google"></i> Sign in with Google</a>
            <a href="https://www.instagram.com/accounts/login/"><i class="fab fa-instagram"></i> Sign in with Instagram</a>
        </div>
        
        <div class="signin-link">
            <p>Have an account? <a href="login.php">Sign In</a></p>
        </div>
    </div>
</body>
</html>


