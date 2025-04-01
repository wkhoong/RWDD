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
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decode the JSON string into an associative array
    $questions = json_decode($_POST['questions'], true);
    $subject = $_POST['subject']; // Get the subject from POST data

    // Loop through each question
    foreach ($questions as $questionData) {
        // Get the data for each question
        $question = $questionData['question'];
        $option_a = $questionData['option_a'];
        $option_b = $questionData['option_b'];
        $correct_answer = $questionData['correct_answer']; // 'A' or 'B'

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO quiz_questions (subject, question, option_a, option_b, option_c, option_d, correct_answer) VALUES (?, ?, ?, ?, NULL, NULL, ?)");
        $stmt->bind_param("ssssss", $subject, $question, $option_a, $option_b, $correct_answer);

        // Execute the statement
        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    }
    
    // After successfully adding questions
    echo json_encode(['success' => true, 'message' => 'All questions added successfully!']);
    exit; // Make sure to exit after sending the response
}

// Close the connection
$conn->close();
?>
<html>
<head>
    <title>Create True or False Questions</title>
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
            margin-bottom: 20px;
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
        }
        .button-container {
            display: flex;
            gap: 35px;
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
        .container-2 {
            background-color: #1e3d32;
            padding: 40px;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: calc(92% - 24px);
            margin: 20px auto;
        }
        .question-input {
            background-color: #2a5d50;
            border: 1px solid #ffffff;
            border-radius: 10px;
            padding: 10px;
            width: calc(99% - 24px);
            color: #ffffff;
            margin: 20px auto;
            display: block;
            text-align: center;
        }
        .options {
            display: flex;
            justify-content: space-between;
            margin-left: 10px;
            margin-right: 10px;
        }
        .option {
            padding: 80px;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            color: #2a2a2a;
            background-color: #8fd6bd;
            flex: 1 1 calc(50% - 20px);
            margin: 10px;
            font-weight: bold;
        }
        .option:nth-child(2) {
            background-color: #4a8f7c;
        }
        .option + .option {
            margin-left: 2%;
        }
        .answer-input {
    background-color: #3a7d5e;
    border: none;
    border-radius: 5px;
    padding: 78.5px;
    color: #ffffff;
    cursor: text;
    font-size: 16px;
    flex: 1 1 calc(50% - 20px); /* Responsive sizing */
    margin: 10px;
    font-weight: bold;
    text-align: center; /* Center the text */
    transition: background-color 0.3s; /* Add transition for smooth effect */
}

.answer-input:hover {
    background-color: #2e6b4f; /* Darker shade on hover */
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
        .correct-answer-selection {
            margin: 20px auto; /* Space above the selection */
            padding: 10px; /* Padding around the selection */
            background-color: #2a5d50; /* Background color to match the theme */
            border-radius: 8px; /* Rounded corners */
            display: flex; /* Use flexbox for layout */
            flex-direction: column; /* Stack radio buttons vertically */
            width: calc(97.5% - 24px); /* Match the width of other inputs */
            margin-left: 20px; /* Align with other elements */
            margin-right: 20px; /* Align with other elements */
        }
        .correct-answer-selection .answer-options {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-left: 10px;
            margin-right: 10px;
        }
        .correct-answer-selection label {
            margin-bottom: 10px; /* Space between radio buttons */
            color: #ffffff; /* Text color */
            font-size: 16px; /* Font size */
            cursor: pointer;
            flex: 1 1 calc(50% - 20px); /* Responsive sizing */
            margin: 10px;
        }
        .correct-answer-selection input[type="radio"] {
            margin-right: 10px; /* Space between radio button and label */
            cursor: pointer; /* Change cursor to pointer on hover */
        }
        .correct-answer-selection .clear-button {
    background-color: #3a7d5e; /* Background color */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 20px; /* Padding */
    color: #ffffff; /* Text color */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 16px; /* Font size */
    margin-top: 10px; /* Space above the button */
    font-weight: bold; 
    transition: background-color 0.3s; /* Add transition for smooth effect */
}

.clear-button:hover {
    background-color: #2e6b4f; /* Lighter green on hover */
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
                <button class="button" id="gap-fill">Gap-fill</button>
                <button class="button active">True False</button>
            </div>
        </div>
        <div class="container-2">
    <input type="text" class="question-input" placeholder="Type your question here" style="font-weight: bold">
    <div class="options">
    <input type="text" class="answer-input" placeholder="Type answer option here">
    <input type="text" class="answer-input" placeholder="Type answer option here">
    </div>
    <div class="correct-answer-selection">
        <div class="answer-options">
            <label>
                <input type="radio" name="correct_answer" value="A"> Option A
            </label>
            <label>
                <input type="radio" name="correct_answer" value="B"> Option B
            </label>
        </div>
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

        document.getElementById('gap-fill').addEventListener('click', function() {
            window.location.href = 'FITBans.php'; // Redirect to multians.php
        });

        document.getElementById('back-button').addEventListener('click', function() {
        // Redirect to the previous page or a specific page
        window.location.href = 'basicinfo.php';
        // Alternatively, you can redirect to a specific URL
        // window.location.href = 'previous_page.php'; // Change this to your desired URL
    });

    document.querySelector('.next-button').addEventListener('click', function() {
        // Get the question and answer options
        const questionInput = document.querySelector('.question-input');
        const answerInputs = document.querySelectorAll('.answer-input');

        const questionText = questionInput.value;
        const answerOptions = Array.from(answerInputs).map(input => input.value);

        // Get the selected correct answer
        const correctAnswerInput = document.querySelector('input[name="correct_answer"]:checked');
        const correctAnswer = correctAnswerInput ? correctAnswerInput.value : null;

        // Store the question and answer options
        if (questionText && answerOptions.every(option => option) && correctAnswer) {
            // Store the current question at the current index
            questions[currentQuestionIndex] = {
                question: questionText,
                option_a: answerOptions[0], // True
                option_b: answerOptions[1], // False
                option_c: '',
                option_d: '',
                correct_answer: correctAnswer // Use the selected correct answer
            };

            // Increment the index for the current question
            currentQuestionIndex++;

            // Clear the input fields for question and answers
            questionInput.value = '';
            answerInputs.forEach(input => input.value = '');
            document.querySelectorAll('input[name="correct_answer"]').forEach(input => input.checked = false); // Clear selected radio buttons

            console.log(questions); // Log the questions array to the console
        } else {
            alert('Please fill in the question, all answer options, and select the correct answer.');
        }
    });

    // Previous button functionality
    document.querySelector('.previous-button').addEventListener('click', function() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--; // Decrement the index to go back to the previous question
            const previousQuestion = questions[currentQuestionIndex];

            // Populate the input fields with the previous question data
            document.querySelector('.question-input').value = previousQuestion.question;
            document.querySelectorAll('.answer-input').forEach((input, index) => {
                input.value = previousQuestion[`option_${String.fromCharCode(97 + index)}`]; // option_a, option_b, etc.
            });

            // Check the correct answer radio button
            document.querySelector(`input[name="correct_answer"][value="${previousQuestion.correct_answer}"]`).checked = true;
        } else {
            alert('No previous question available.');
        }
    });

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

        // Add event listener to "Clear" button
        document.querySelector('.clear-button').addEventListener('click', function() {
            // Clear the selection
            document.querySelectorAll('input[name="correct_answer"]').forEach(radio => {
                radio.checked = false;
            });
        });
    </script>
</body>
</html>