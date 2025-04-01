<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Done - Assestify</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #1e1e1e;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full height of the viewport */
        }
        .progress-bar {
            display: flex;
            justify-content: space-between;
            width: calc(80% - 24px);
            align-items: center;
            margin: 10px auto;
        }
        .progress-bar .step {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #6B7280;
        }
        .progress-bar .step.active {
            color: #3a7d5e;
        }
        .progress-bar .step .circle {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: #E5E7EB;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
        }
        .progress-bar .step.active .circle {
            background-color: #3a7d5e;
            color: #FFFFFF;
        }
        .progress-bar .line {
            flex-grow: 1;
            height: 2px;
            background-color: #E5E7EB;
            margin: 0 10px;
        }
        .progress-bar .line.active {
            background-color: #3a7d5e;
        }
        .container {
            background-color: #1e3d32;
            padding: 160px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center; /* Center text */
            width: 90%; /* Full width with some margin */
            max-width: 600px; /* Limit max width */
            margin: 20px auto;
        }
        .h2 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }
        p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .button {
            background-color: #3a7d5e; /* Button background color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Padding */
            color: #ffffff; /* Text color */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 16px; /* Font size */
            font-weight: bold; /* Bold text */
            margin: 10px; /* Space between buttons */
            transition: background-color 0.3s; /* Add transition for smooth effect */
            width: 300px;
        }
        .button:hover {
            background-color: #2e6b4f; /* Darker green on hover */
        }
    </style>
</head>
<body>
<h2>Done!</h2>
<br>
<div class="progress-bar">
            <div class="step active">
                <div class="circle">1</div>
                Basic Information
            </div>
            <div class="line active"></div>
            <div class="step active">
                <div class="circle">2</div>
                Create Questions
            </div>
            <div class="line active"></div>
            <div class="step active">
                <div class="circle">3</div>
                Done
            </div>
        </div>
        <br> <br> 
    <div class="container">

        <p>Your questions have been saved successfully!</p>
        <button class="button" onclick="window.location.href='lecturedash.php'">Go Back to Home</button>
        <button class="button" onclick="window.location.href='singleans.php'">Create More Questions</button>
    </div>
</body>
</html>