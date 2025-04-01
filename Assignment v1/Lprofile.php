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
$user_name = "Kagenou"; // You can fetch this from the database if needed
$user_profile_picture = "https://storage.googleapis.com/a1aa/image/D8VIIQJBKfwQH63KJ0B4kGGkle6M3gdYeYe4jPuPVZOzwnTPB.jpg"; // Example profile picture

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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
        .profile-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-info img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin-right: 20px;
        }
        .profile-info div {
            flex-grow: 1;
        }
        .profile-info label {
            font-weight: bold;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .edit-btn, .logout-btn {
            display: inline-block;
            width: 48%;
            padding: 10px;
            background-color: #8fd3d3;
            color: #2a3b3c;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            margin: 5px; /* Add margin to separate buttons */
        }
        .edit-btn:hover, .logout-btn:hover {
            background-color: #2a3b3c;
            color: #c8f0f0;
        }
        .quiz-management {
            margin-top: 20px;
        }
        .quiz-management h2 {
            color: #8fd3d3;
            margin-bottom: 10px;
        }
        .quiz-management ul {
            list-style-type: none;
            padding: 0;
        }
        .quiz-management li {
            background-color: #3b4b4c;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
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
    <a href="lecturedash.php" class="back-btn">Back</a>
        <h1>Profile</h1>
        <div class="profile-info">
            <img src="<?php echo $user_profile_picture; ?>" alt="Profile Picture">
            <div>
                <label>Name:</label>
                <p><?php echo htmlspecialchars($user_name); ?></p>
                <label>Email:</label>
                <p><?php echo htmlspecialchars($user_email); ?></p>
            </div>
        </div>
        <div class="button-container">
        <button class="edit-btn" onclick="window.location.href='edit_profile.php'">Edit Profile</button>
    <form action="Lprofile.php" method="post" style="display: inline;">
    <input type="hidden" name="logout" value="1">
    <button type="submit" class="edit-btn logout-btn" onclick="return confirm('Are you sure you want to log out?');">Logout</button>    
</form>
</div>

<script>
function confirmLogout() {
    if (confirm("Are you sure you want to log out?")) {
        // If the user confirms, submit the form
        document.querySelector('form[action="Lprofile.php"]').submit();
    }
}
</script>

    </div>
</body>
</html>