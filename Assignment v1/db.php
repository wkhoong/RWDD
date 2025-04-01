<?php
// Database configuration
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "assignment";

// Enable MySQLi exceptions for error handling
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Establish connection
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception $e) {
    // Handle connection error
    die("Could not connect to the database: " . $e->getMessage());
}
?>
