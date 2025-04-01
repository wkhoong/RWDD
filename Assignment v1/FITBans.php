<?php
// Database connection parameters
$host = 'localhost'; 
$dbname = 'assignment'; 
$username = 'root'; 
$password = ''; 

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

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
            $correct_answer = $questionData['correct_answer']; // based on the correct answer

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO quiz_questions (subject, question, option_a, option_b, option_c, option_d, correct_answer) VALUES (?, ?, NULL, NULL, NULL, NULL, ?)");
            if ($stmt === false) {
                die(json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]));
            }

            $stmt->bind_param("sss", $subject, $question, $correct_answer); // Corrected parameter types

            // Execute the statement
            if (!$stmt->execute()) {
                echo json_encode(['success' => false, 'message' => 'Execute failed: ' . $stmt->error]);
                exit; // Exit on error
            }
            
            // Close the statement
            $stmt->close();
        }
        
        // After successfully adding questions
        echo json_encode(['success' => true, 'message' => 'All questions added successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid questions data.']);
    }
}

// Close the connection
$conn->close();
?>
<html>
<head>
    <title>Create Fill In The Blanks Questions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #1e1e1e;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-weight: bold;
        }
        .header {
            background-color: #1e3d32;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header .subject-input {
            font-size: 24px;
            background-color: #1e3d32;
            color: #ffffff;
            border: none;
            text-align: center;
            font-weight: bold;
            width: 300px; /* Set a specific width for the input */
            margin: 0 20px; /* Space between elements */
        }
        .header .save-button {
    background-color: #3a7d5e;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    color: #ffffff;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s; /* Add transition for smooth effect */
}

.header .save-button:hover {
    background-color: #2e6b4f; /* Lighter green on hover */
}
        .content {
            padding: 20px;
        }
        .content h2 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }
        .back-button {
    background-color: #3a7d5e; /* Background color */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 20px; /* Padding */
    color: #ffffff; /* Text color */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 16px; /* Font size */
    font-weight: bold; /* Bold text */
    transition: background-color 0.3s; /* Add transition for smooth effect */
    width: 150px;
}

.back-button:hover {
    background-color: #2e6b4f; /* Darker green on hover */
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
            padding: 40px;
            border-radius: 8px;
            width: calc(92% - 24px);
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column; /* Stack children vertically */
        }
        .button-container {
            display: flex;
            gap: 35px; /* Space between buttons */
            flex-wrap: wrap; /* Allow buttons to wrap */
            justify-content: space-between; /* Distribute space evenly */
        }
        .button {
    background-color: #ffffff; /* Default background color */
    color: #3a5a40; /* Default text color */
    padding: 10px 20px; /* Padding */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 14px; /* Font size */
    flex: 1; /* Allow buttons to grow */
    min-width: 120px; /* Minimum width for buttons */
    margin-left: 12px; /* Space on the left */
    margin-right: 12px; /* Space on the right */
    text-align: center; /* Center the text */
    font-weight: bold; /* Bold text */
    transition: background-color 0.3s, color 0.3s; /* Add transition for smooth effect */
}

.button:hover {
    background-color: #3a7d5e; /* Change background color on hover */
    color: #ffffff; /* Change text color on hover */
}

.button.active {
    background-color: #3a7d5e; /* Active button background color */
    color: #ffffff; /* Active button text color */
}
        .container-2 
        {
            background-color: #1e3d32;
            padding: 40px;
            padding-top: 60px;
            padding-bottom: 60px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: calc(92% - 24px);
            margin: 5px auto;
            display: flex;
            flex-direction: column; /* Stack children vertically */
            align-items: center; /* Center align items */
        }
        .container-2 p {
            margin: 0 0 10px;
            text-align: center;
            color: #ffffff;
        }
        .input-box {
            background-color: #2a5d50;
            border: 1px solid #ffffff;
            border-radius: 10px;
            padding: 10px 20px;
            width: calc(100% - 24px);
            color: #ffffff;
            margin: 20px auto;
            display: block;
            text-align: center;
        }
        .input-box2 {
            padding: 10px 20px;
            border: 1px solid #5a7a7b;
            border-radius: 5px;
            background-color: #2d3e3f;
            color: #c7d3d4;
            width: calc(50% - 24px); /* Full width */
            text-align: center;
            display: block;
            margin: 20px auto;
        }
        .input-box2:hover {
            background-color: #3e5a5b;
        }
        .clear-button {
    background-color: #3a7d5e; /* Background color */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 20px; /* Padding */
    color: #ffffff; /* Text color */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 16px; /* Font size */
    margin-top: 10px; /* Space above the button */
    font-weight: bold; 
    width: calc(25% - 24px); /* Full width */
    transition: background-color 0.3s; /* Add transition for smooth effect */
}

.clear-button:hover {
    background-color: #2e6b4f; /* Lighter green on hover */
}
        .button-container-2 {
            display: flex; /* Use flexbox for layout */
            justify-content: center; /* Center the buttons horizontally */
            margin-top: 20px; /* Space above the button container */
        }

        .previous-button, .next-button {
    background-color: #3a7d5e; /* Background color */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 20px; /* Padding */
    color: #ffffff; /* Text color */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 16px; /* Font size */
    font-weight: bold; /* Bold text */
    margin: 0 10px; /* Space between buttons */
    width: 150px;
    transition: background-color 0.3s; /* Add transition for smooth effect */
}

.previous-button:hover, .next-button:hover {
    background-color: #2e6b4f; /* Darker green on hover */
}
    </style>
</head>
<body>
    <div class="header">
        <h1>Assestify</h1>
        <input type="text" class="subject-input" placeholder="Type subject here">
        <button class="save-button">Save questions</button>
    </div>
    <div class="content">
    <button class="back-button" id="back-button">Back</button>
        <h2>Create Questions</h2>
        <br>
        <div class="progress-bar">
            <div class="step active">
                <div class="circle">
                 1
                </div>
                Basic Information
               </div>
               <div class="line active">
               </div>
               <div class="step active">
                <div class="circle">
                 2
                </div>
                Create Questions
               </div>
               <div class="line">
               </div>
               <div class="step">
                <div class="circle">
                 3
                </div>
                Done
               </div>
        </div>
        <br> <br>
        <div class="container">
            <div class="button-container">
                <button class="button" id="single-correct-answer">Single correct answer</button>
                <button class="button" id="multiple-correct-answers">Multiple correct answers</button>
                <button class="button active">Gap-fill</button>
                <button class="button" id="true-false">True False</button>
            </div>
        </div>
        <div class="container-2">
            <p>Symbol "_" to gap the sentence</p>
            <input type="text" class="input-box" placeholder="Type your question here _ continue your question..." style="font-weight:bold">
            <input type="text" class="input-box2" placeholder="Type your answer here" style="font-weight:bold">
            <button class="clear-button">Clear</button>
        </div>
    </div>
    <div class="button-container-2">
    <button class="previous-button">Previous</button>
    <button class="next-button">Next</button>
</div>
    <script>
let questions = []; // Array to store questions
let currentQuestionIndex = 0; // Initialize the current question index

        document.getElementById('single-correct-answer').addEventListener('click', function() {
            window.location.href = 'singleans.php'; // Redirect to multians.php
        });

        document.getElementById('multiple-correct-answers').addEventListener('click', function() {
            window.location.href = 'multians.php'; // Redirect to multians.php
        });

        document.getElementById('true-false').addEventListener('click', function() {
            window.location.href = 'T&Fans.php'; // Redirect to multians.php
        });

        document.getElementById('back-button').addEventListener('click', function() {
        // Redirect to the previous page or a specific page
        window.location.href = 'basicinfo.php';
        // Alternatively, you can redirect to a specific URL
        // window.location.href = 'previous_page.php'; // Change this to your desired URL
    });

// Add event listener to "Clear" button
document.querySelector('.clear-button').addEventListener('click', function() {
    // Clear the input fields
    const inputBox = document.querySelector('.input-box');
    const inputBox2 = document.querySelector('.input-box2');
    inputBox.value = '';
    inputBox2.value = '';
});


document.querySelector('.next-button').addEventListener('click', function() {
    // Get the question and answer
    const questionInput = document.querySelector('.input-box');
    const answerInput = document.querySelector('.input-box2');

    const questionText = questionInput.value;
    const correctAnswer = answerInput.value;

    // Check if we are at the end of the questions array
    if (currentQuestionIndex < questions.length) {
        // Update the existing question if we are not at the end
        if (questionText && correctAnswer) {
            questions[currentQuestionIndex] = {
                question: questionText,
                option_a: '', // No options for fill-in-the-blank
                option_b: '',
                option_c: '',
                option_d: '',
                correct_answer: correctAnswer // Use the entered correct answer
            };
        } else {
            alert('Please fill in the question and the correct answer.');
            return; // Exit if fields are empty
        }
    } else {
        // Push the current question to the array if we are at the end
        if (questionText && correctAnswer) {
            questions.push({
                question: questionText,
                option_a: '', // No options for fill-in-the-blank
                option_b: '',
                option_c: '',
                option_d: '',
                correct_answer: correctAnswer // Use the entered correct answer
            });
        } else {
            alert('Please fill in the question and the correct answer.');
            return; // Exit if fields are empty
        }
    }

    // Increment the current question index after pushing
    currentQuestionIndex++;

    // Clear the input fields for question and answer
    questionInput.value = '';
    answerInput.value = '';

    console.log(questions); // Log the questions array to the console
});


// Previous button functionality
document.querySelector('.previous-button').addEventListener('click', function() {
    if (currentQuestionIndex > 0) {
        // Save the current question before going back
        const questionInput = document.querySelector('.input-box');
        const answerInput = document.querySelector('.input-box2');

        const questionText = questionInput.value;
        const correctAnswer = answerInput.value;

        // Store the current question if it has been filled
        if (questionText && correctAnswer) {
            questions[currentQuestionIndex] = {
                question: questionText,
                option_a: '',
                option_b: '',
                option_c: '',
                option_d: '',
                correct_answer: correctAnswer
            };
        }

        currentQuestionIndex--; // Decrement the index to go back to the previous question
        const previousQuestion = questions[currentQuestionIndex];

        // Populate the input fields with the previous question data
        document.querySelector('.input-box').value = previousQuestion.question;
        document.querySelector('.input-box2').value = previousQuestion.correct_answer; // Populate the correct answer
    } else {
        alert('No previous question available.');
 }
});

// Optional: Function to display the current question
function displayCurrentQuestion() {
    if (currentQuestionIndex < questions.length) {
        const currentQuestion = questions[currentQuestionIndex];
        document.querySelector('.input-box').value = currentQuestion.question;
        document.querySelector('.input-box2').value = currentQuestion.correct_answer;
    }
}

// Call this function to display the first question if needed
displayCurrentQuestion();


    document.querySelector('.save-button').addEventListener('click', function() {
        const subject = document.querySelector('.subject-input').value;

        // Check if there are questions to save
        if (questions.length === 0) {
            alert('No questions to save.');
            return;
        }

        fetch('save_questions.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                subject: subject,
                questions: JSON.stringify(questions) // Send the questions array as a JSON string
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
            // Redirect to the Done page
            window.location.href = 'done.php'; // Change this to the actual path of your Done page
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    </script>
</body>
</html>