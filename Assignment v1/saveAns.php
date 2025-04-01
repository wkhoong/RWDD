<?php
$username = "Chali";

include("db.php");

// Retrieve and decode JSON input
$input = file_get_contents("php://input");
$data = json_decode($input, true); // Decode as associative array

if (isset($data['qName']) && isset($data['uAnswer']) && is_array($data['uAnswer'])) {
    $qName = $data['qName'];
    $uAnswers = $data['uAnswer']; // This is now an array of answers

    // Loop through the answers and save them row by row
    foreach ($uAnswers as $userAnswer) {
        $sql = "INSERT INTO dbanswers (username, qName, userAnswer) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            echo json_encode(["success" => false, "message" => "SQL preparation failed: " . $conn->error]);
            exit;
        }

        // Bind parameters and execute
        $stmt->bind_param("sss" ,$username, $qName, $userAnswer);
        if ($stmt->execute()) {
            continue; // Move to the next answer
        } else {
            echo json_encode(["success" => false, "message" => "Error saving answer: " . $stmt->error]);
            $stmt->close();
            exit;
        }
    }

    echo json_encode(["success" => true, "message" => "All answers saved successfully"]);
    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Missing or invalid parameters"]);
}

$conn->close();
