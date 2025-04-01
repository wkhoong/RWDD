<?php
header('Content-Type: application/json'); // Ensure JSON response
include("db.php");

if (isset($_GET['subject']) && isset($_GET['username'])) {
    $subject = $_GET['subject'];
    $username = $_GET['username'];

    // Check if a row already exists for this user and subject
    $checkSql = "SELECT answer_id FROM dbanswers WHERE username = ? AND qName = ?";
    $checkStmt = $conn->prepare($checkSql);

    if (!$checkStmt) {
        echo json_encode(["success" => false, "message" => "Failed to prepare check statement: " . $conn->error]);
        exit;
    }

    $checkStmt->bind_param("ss", $username, $subject);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Row already exists, return the existing answer_id
        $row = $checkResult->fetch_assoc();
        echo json_encode(["success" => true, "answer_id" => $row['answer_id'], "message" => "Existing row found"]);
    } else {
        // No existing row, insert a new one
        $insertSql = "INSERT INTO dbAnswers (username, qName) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSql);

        if (!$insertStmt) {
            echo json_encode(["success" => false, "message" => "Failed to prepare insert statement: " . $conn->error]);
            exit;
        }

        $insertStmt->bind_param("ss", $username, $subject);
        
        if ($insertStmt->execute()) {
            $newAnswerId = $insertStmt->insert_id;
            echo json_encode(["success" => true, "answer_id" => $newAnswerId, "message" => "New row inserted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error inserting row: " . $insertStmt->error]);
        }

        $insertStmt->close();
    }

    $checkStmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Missing subject or username in the request"]);
}

$conn->close();
?>