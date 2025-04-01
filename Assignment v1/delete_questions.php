<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "assignment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the question ID and subject from the URL
$id = isset($_GET['id']) ? $_GET['id'] : '';
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';

// Delete the question
$sql = "DELETE FROM quiz_questions WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Redirect back to the subject questions page
header("Location: subject_questions.php?subject=" . urlencode($subject));
exit();