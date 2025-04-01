<?php

include("db.php");

if (isset($_GET['questionCount'])) {
    $questionInd = intval($_GET['questionCount']);
    $sql = "SELECT * FROM quiz_questions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $rowIndex = $questionInd-1;
        if (isset($rows[$rowIndex])) {
            $row = $rows[$rowIndex];
            echo json_encode([
                "count" => $questionInd,
                "quiz" => $row["question"],
                "s1" => $row["option_a"],
                "s2" => $row["option_b"],
                "s3" => $row["option_c"],
                "s4" => $row["option_d"],
                
            ]);
        } else {
            // echo htmlspecialchars($row[$questionInd]);
            echo json_encode(["quiz" => "Question not found."]);
            exit;
        }
    } else {
        echo json_encode(["quiz" => "Qeustion not found."]);
        exit;
    }
    $conn->close();
}

?>