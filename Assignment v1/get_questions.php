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
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Get the question ID from the URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Fetch the question details
$sql = "SELECT * FROM quiz_questions WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$question = $result->fetch_assoc();

if ($question) {
    echo json_encode(['success' => true, 'question' => $question]);
} else {
    echo json_encode(['success' => false, 'message' => 'Question not found.']);
}

// Close the connection
$conn->close();