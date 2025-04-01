<?php
header('Content-Type: application/json'); // Ensure JSON response
include("db.php");

if (isset($_GET['subject']) && isset($_GET['username'])) {
    $subject = $_GET['subject'];
    $username = $_GET['username'];

    // Check if the row exists
    $sql = "SELECT answer_id FROM dbanswersnull 
            WHERE username = ? AND qName = ? AND ua1 IS NULL AND ua10 IS NULL";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode([
            "success" => false,
            "message" => "Failed to prepare SELECT query: " . $conn->error
        ]);
        exit;
    }

    $stmt->bind_param("ss", $username, $subject);
    $stmt->execute();
    $stmt->store_result(); // Store the result for num_rows check
    $stmt->bind_result($answer_id);

    if ($stmt->num_rows > 0) {
        // Row already exists
        $stmt->fetch();
        echo json_encode([
            "success" => true,
            "answer_id" => $answer_id,
            "message" => "Row already exists!",
        ]);
    } else {
        // Insert a new row
        $stmt->close();
        $insert_sql = "
        INSERT INTO dbanswersnull 
        (username, qName, ua1, ua2, ua3, ua4, ua5, ua6, ua7, ua8, ua9, ua10)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);

        if (!$insert_stmt) {
            echo json_encode([
                "success" => false,
                "message" => "Failed to prepare INSERT query: " . $conn->error
            ]);
            exit;
        }

        // $ua1 = $ua2 = $ua3 = $ua4 = $ua5 = $ua6 = $ua7 = $ua8 = $ua9 = $ua10 = null;
        $insert_stmt->bind_param(
            "ssssssssssss",
            $username, $subject,
            $ua1, $ua2, $ua3, $ua4, $ua5,
            $ua6, $ua7, $ua8, $ua9, $ua10
        );

        if ($insert_stmt->execute()) {
            echo json_encode([
                "success" => true,
                "answer_id" => $insert_stmt->insert_id,
                "message" => "New row inserted successfully!". $insert_stmt
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Error inserting row: " . $insert_stmt->error
            ]);
        }
        $insert_stmt->close();
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Missing subject or username parameters."
    ]);
}

$conn->close();
?>