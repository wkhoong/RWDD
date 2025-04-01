<?php
// Database connection parameters
$host = 'localhost'; // or your database host
$dbname = 'assignment'; // your database name
$username = 'root'; // your database username
$password = ''; // your database password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decode the JSON string into an associative array
    $questions = json_decode($_POST['questions'], true);
    $subject = $_POST['subject']; // Get the subject from POST data

    // Check if questions are valid
    if (is_array($questions) && !empty($questions)) {
        // Loop through each question
        foreach ($questions as $questionData) {
            // Get the data for each question
            $question = $questionData['question'];
            $option_a = $questionData['option_a'];
            $option_b = $questionData['option_b'];
            $option_c = $questionData['option_c'];
            $option_d = $questionData['option_d'];
            $correct_answer = $questionData['correct_answer']; // This should be 'A', 'B', 'C', or 'D'

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO quiz_questions (subject, question, option_a, option_b, option_c, option_d, correct_answer) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $subject, $question, $option_a, $option_b, $option_c, $option_d, $correct_answer);

            // Execute the statement
            if (!$stmt->execute()) {
                echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
                exit; // Exit on error
            }
            
            // Close the statement
            $stmt->close();
        }
        
        echo json_encode(['success' => true, 'message' => 'All questions added successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid questions data.']);
    }
}

// Close the connection
$conn->close();
?>