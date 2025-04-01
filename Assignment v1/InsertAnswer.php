<?php

include("db.php");

if (isset($_GET['userAnswer'])) {
    $questionInd = intval($_GET['questionCount']);
    $questionAns = "an" . $questionInd;
    $rowIndex = 0;
    $sql = "SELECET * FROM dbanswers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if (isset($rows[$rowIndex])) {
            $row = $rows[$rowIndex];
            for ($i = 1; $i <= 10; $i++) {
                $column = "q" . $i;
                if (is_null($row[$column])) {
                    // Update this column
                    $update_sql = "UPDATE dbanswers SET $column = ? WHERE id = ?";
                    $stmt = $conn->prepare($update_sql);
                    $stmt->bind_param("si", $question, $row_id);
        
                    if ($stmt->execute()) {
                        echo "Question added to $column successfully.";
                    } else {
                        echo "Error updating $column: " . $conn->error;
                    }
                    $stmt->close();
                    break;
                }
            }






        
        }
    }
}

?>