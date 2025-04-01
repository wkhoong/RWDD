<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== true) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Assuming user data is stored in session for demonstration
$user_email = $_SESSION["email"];
$user_name = $_SESSION["name"]; // Fetch from session
$user_id = $_SESSION["user_id"]; // Assuming user_id is stored in session

// Initialize error messages
$name_error = $email_error = $password_error = "";
$success_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = trim($_POST["name"]);
    $new_email = trim($_POST["email"]);
    $new_password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // Validate name
    if (empty($new_name)) {
        $name_error = "Name is required.";
    }

    // Validate email
    if (empty($new_email)) {
        $email_error = "Email is required.";
    } elseif (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format.";
    }

    // Validate password
    if (!empty($new_password) || !empty($confirm_password)) {
        if (empty($new_password)) {
            $password_error = "Password is required.";
        } elseif ($new_password !== $confirm_password) {
            $password_error = "Passwords do not match.";
        }
    }

    // If no errors, update the session and database
    if (empty($name_error) && empty($email_error) && empty($password_error)) {
        // Database connection (replace with your actual database credentials)
        $servername = "localhost"; // or your server name
        $username = "root";
        $password = '';
        $dbname = "assignment";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE user_credentials SET user_name = ?, user_email = ?, user_password = ? WHERE user_id = ?");
        
        // Hash the password if it's being updated
        $hashed_password = !empty($new_password) ? password_hash($new_password, PASSWORD_DEFAULT) : $_SESSION["user_password"];

        // Bind parameters
        $stmt->bind_param("sssi", $new_name, $new_email, $hashed_password, $user_id);

        // Execute the statement
        if ($stmt->execute()) {
            // Update session variables
            $_SESSION["email"] = $new_email; // Update email in session
            $_SESSION["name"] = $new_name; // Update name in session
            $_SESSION["user_password"] = $hashed_password; // Update password in session if changed
            $success_message = "Profile updated successfully!";
        } else {
            $success_message = "Error updating profile: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #b3b3b3;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #2a3b3c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #8fd3d3;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
            display: block;
            margin-right: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input {
            width: 100%; /* Ensure input fields take full width */
            padding: 10px;
            border: 1px solid #8fd3d3;
            border-radius: 5px;
            background-color: #1a1a1a;
            color: #b3b3b3;
        }
        .error-message {
            color: #ff4d4d;
            font-size: 12px;
        }
        .success-message {
            color: #4caf50;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }
        .save-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #8fd3d3;
            color: #2a3b3c;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
        }
        .save-btn:hover {
            background-color: #2a3b3c;
            color: #c8f0f0;
        }
        .back-btn {
            display: inline-block;
            width: auto;
            padding: 10px 20px;
            background-color: #8fd3d3;
            color: #2a3b3c;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            margin-bottom: 20px; /* Space below the button */
        }
        .back-btn:hover {
            background-color: #2a3b3c;
            color: #c8f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
    <a href="Lprofile.php" class="back-btn">Back</a>
        <h1>Edit Profile</h1>
        <?php if (!empty($success_message)): ?>
            <div class="success-message "><?php echo htmlspecialchars($success_message); ?></div>
        <?php endif; ?>
        <form action="edit_profile.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user_name); ?>">
                <div class="error-message"><?php echo $name_error; ?></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_email); ?>">
                <div class="error-message"><?php echo $email_error; ?></div>
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password">
                <div class="error-message"><?php echo $password_error; ?></div>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password">
            </div>
            <button type="submit" class="save-btn">Save Changes</button>
        </form>
    </div>
</body>
</html>