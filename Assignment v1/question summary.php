<?php

include("db.php");

// Example answer_id (replace it with dynamic input if needed)
$answer_id = 2;

// Step 1: Retrieve qName from dbanswersnull using answer_id
$sql = "SELECT qName FROM dbanswers WHERE answer_id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Failed to prepare statement: " . $conn->error);
}
$stmt->bind_param("i", $answer_id);
$stmt->execute();
$stmt->bind_result($qName);

if ($stmt->fetch()) {
    // qName successfully retrieved
    $subject = $qName;
} else {
    die("No qName found for answer_id = $answer_id.");
}
$stmt->close();

// Step 2: Find subject (qName) in quiz_questions and retrieve 10 questions
$sql = "SELECT * FROM quiz_questions WHERE subject = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Failed to prepare statement: " . $conn->error);
}
$stmt->bind_param("s", $subject);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $questions = [];
    $optionA = [];
    $optionB = [];
    $optionC = [];
    $optionD = [];
    $correct = [];
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row['question'];
        $optionA[] = $row['option_a'];
        $optionB[] = $row['option_b'];
        $optionC[] = $row['option_c'];
        $optionD[] = $row['option_d'];
        $correct[] = $row['correct_answer'];
    }
} else {
    die("No questions found for subject = $subject.");
}

$questions = array_slice($questions, 0, 10);
$optionA = array_slice($optionA, 0, 10);
$optionB = array_slice($optionB, 0, 10);
$optionC = array_slice($optionC, 0, 10);
$optionD = array_slice($optionD, 0, 10);
$correct = array_slice($correct, 0, 10);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #171717;
            color: #d3efe9;
            height: 100%;
            /* Green text color */
            /* width: 1920px; */
            /* height: 2940px; */
            overflow-y: scroll;
        }

        h2 {
            margin: 0;
        }

        h3,
        h4 {
            margin: 0;
            margin-bottom: 20px;
        }

        header {
            background-color: #2a3935;
            margin-bottom: 2rem;
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header a {
            font-size: 1.5rem;
            font-weight: bold;
            color: #19715c;
            margin-right: auto;
            margin-left: 1rem;
            text-decoration: none;
        }

        header h2 {
            color: #47b298;
            margin-right: auto;
            transform: translateX(-70%)
        }

        .logo {
            font-size: 1.5em;
            font-weight: bold;
        }

        .title {
            font-size: 1.2em;
            font-weight: bold;
            /* Makes the title bold */
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .container {
            position: absolute;
            /* top: 50%; */
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            /* Adjusted width */
            /* height: 2957px; */
            /* Adjusted height */
            background-color: #2A3935;
            /* Updated color */
            /* margin: 3% auto; */
            margin-bottom: 2rem;
            border-radius: 15px;
            padding: 20px;
            box-sizing: border-box;
        }

        .summary-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .summary-header h1 {
            font-size: 24px;
            margin: 2rem;
        }

        .summary-header h2 {
            font-size: 20px;
            margin: 0;
        }

        .progress-bar {
            width: 90%;
            background-color: #344d41;
            border-radius: 20px;
            margin: 0 auto;
            padding: 5px;
        }

        .progress-bar-inner {
            width: 83%;
            /* Adjust the width based on progress */
            height: 20px;
            background-color: #47b298;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #d3efe9;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin: 20px 0;
        }

        .stat-card {
            background-color: #19715c;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            color: #ffffff;
        }

        .try-again {
            text-align: center;
            margin: 20px 0;
        }

        .try-again button {
            background-color: #47b298;
            color: #d3efe9;
            border: none;
            width: 90%;
            height: 39px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
        }

        .question-answers {
            background-color: #171717;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .question {
            background-color: #2a3935;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .answers {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .answer-button {
            padding: 15px;
            font-size: 18px;
            border-radius: 10px;
            color: #ffffff;
            border: none;
        }

        .answer-black {
            background-color: #000000;
        }

        .answer-green {
            background-color: #47B298;
        }

        @media (max-width: 768px) {
            .stats {
                grid-template-columns: 1fr;
            }

            header h2 {
                margin-right: 1rem;
                transform: translateX(0%);
            }
        }

        @media (max-width: 480px) {
            .stats {
                grid-template-columns: 1fr;

            }

            header h2 {
                margin-right: 1rem;
            }

            h3 {
                font-size: clamp(15px, 1vw, 30px);
            }

            h4 {
                font-size: clamp(12px, 1vw, 24px);
            }

            .container {
                width: 90%;
            }

            .answers {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
            }

            .answer-button {
                font-size: clamp(12px, 1vw, 24px);
            }
        }
    </style>
</head>

<body>
    <header>
        <a href="index.php">Assestify</a>
        <h2>History</h2>
    </header>

    <!-- Summary Content -->

    <div class="container">
        <div class="summary-header">
            <h1>Summary</h1>
            <h2>Congratulation Kithong</h2>
        </div>

        <div class="progress-bar">
            <div class="progress-bar-inner">83%</div>
        </div>

        <div class="stats">
            <div class="stat-card">&lt;Correct Number&gt;</div>
            <div class="stat-card">&lt;Wrong Number&gt;</div>
        </div>

        <div class="try-again" >
            <button>Try Again</button>
        </div>

        <div class="question-answers">
            <h3>Question Answers</h3>
            <!-- Questions -->
            <div class="question">
                <h4 id="q1">Question 1</h4>
                <div class="answers">
                    <button class="answer-button answer-black" id="o1a">Answer</button>
                    <button class="answer-button answer-black" id="o1b">Answer</button>
                    <button class="answer-button answer-black" id="o1c">Answer</button>
                    <button class="answer-button answer-black" id="o1d">Answer</button>
                </div>
            </div>
            <!-- Repeat questions as needed -->
            <div class="question">
                <h4 id="q2">Question 2</h4>
                <div class="answers">
                    <button class="answer-button answer-black" id="o2a">Answer</button>
                    <button class="answer-button answer-black" id="o2b">Answer</button>
                    <button class="answer-button answer-black" id="o2c">Answer</button>
                    <button class="answer-button answer-black" id="o2d">Answer</button>
                </div>
            </div>
            <div class="question">
                <h4 id="q3">Question 3</h4>
                <div class="answers">
                    <button class="answer-button answer-black" id="o3a">Answer</button>
                    <button class="answer-button answer-black" id="o3b">Answer</button>
                    <button class="answer-button answer-black" id="o3c">Answer</button>
                    <button class="answer-button answer-black" id="o3d">Answer</button>
                </div>
            </div>
            <div class="question">
                <h4 id="q4">Question 4</h4>
                <div class="answers">
                    <button class="answer-button answer-black" id="o4a">Answer</button>
                    <button class="answer-button answer-black" id="o4b">Answer</button>
                    <button class="answer-button answer-black" id="o4c">Answer</button>
                    <button class="answer-button answer-black" id="o4d">Answer</button>
                </div>
            </div>
            <div class="question">
                <h4 id="q5">Question 5</h4>
                <div class="answers">
                    <button class="answer-button answer-black" id="o5a">Answer</button>
                    <button class="answer-button answer-black" id="o5b">Answer</button>
                    <button class="answer-button answer-black" id="o5c">Answer</button>
                    <button class="answer-button answer-black" id="o5d">Answer</button>
                </div>
            </div>
            <div class="question">
                <h4 id="q6">Question 6</h4>
                <div class="answers">
                    <button class="answer-button answer-black" id="o6a">Answer</button>
                    <button class="answer-button answer-black" id="o6b">Answer</button>
                    <button class="answer-button answer-black" id="o6c">Answer</button>
                    <button class="answer-button answer-black" id="o6d">Answer</button>
                </div>
            </div>
            <div class="question">
                <h4 id="q7">Question 7</h4>
                <div class="answers">
                    <button class="answer-button answer-black" id="o7a">Answer</button>
                    <button class="answer-button answer-black" id="o7b">Answer</button>
                    <button class="answer-button answer-black" id="o7c">Answer</button>
                    <button class="answer-button answer-black" id="o7d">Answer</button>
                </div>
            </div>
            <div class="question">
                <h4 id="q8">Question 8</h4>
                <div class="answers">
                    <button class="answer-button answer-black" id="o8a">Answer</button>
                    <button class="answer-button answer-black" id="o8b">Answer</button>
                    <button class="answer-button answer-black" id="o8c">Answer</button>
                    <button class="answer-button answer-black" id="o8d">Answer</button>
                </div>
            </div>
            <div class="question">
                <h4 id="q9">Question 9</h4>
                <div class="answers">
                    <button class="answer-button answer-black" id="o9a">Answer</button>
                    <button class="answer-button answer-black" id="o9b">Answer</button>
                    <button class="answer-button answer-black" id="o9c">Answer</button>
                    <button class="answer-button answer-black" id="o9d">Answer</button>
                </div>
            </div>
            <div class="question">
                <h4 id="q10">Question 10</h4>
                <div class="answers">
                    <button class="answer-button answer-black" id="o10a">Answer</button>
                    <button class="answer-button answer-black" id="o10b">Answer</button>
                    <button class="answer-button answer-black" id="o10c">Answer</button>
                    <button class="answer-button answer-black" id="o10d">Answer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Embed the PHP array into JavaScript
        const questions = <?php echo json_encode($questions); ?>;
        const optionA = <?php echo json_encode($optionA); ?>;
        const optionB = <?php echo json_encode($optionB); ?>;
        const optionC = <?php echo json_encode($optionC); ?>;
        const optionD = <?php echo json_encode($optionD); ?>;
        const corrects = <?php echo json_encode($correct); ?>;

        // Get the target element
        for (let i = 1; i <= 10; i++) {
            const questionList = document.getElementById(`q${i}`);
            const answerAlist = document.getElementById(`o${i}a`);
            const answerBlist = document.getElementById(`o${i}b`);
            const answerClist = document.getElementById(`o${i}c`);
            const answerDlist = document.getElementById(`o${i}d`);
            if (questionList) {
                questionList.textContent = `${i}: ${questions[i - 1]}`; // Assuming 'questions' array is available
                answerAlist.textContent = `${optionA[i - 1]}`;
                answerBlist.textContent = `${optionB[i - 1]}`;
                answerClist.textContent = `${optionC[i - 1]}`;
                answerDlist.textContent = `${optionD[i - 1]}`;

                const correct = corrects[i - 1].split(",");
                correct.forEach((correctAnswer) => {
                    // Trim any extra spaces (e.g., " A" -> "A")
                    correctAnswer = correctAnswer.trim();
                    if (correctAnswer === 'A') {
                        answerAlist.style.backgroundColor = '#47B298'; // Correct answer background
                    } else if (correctAnswer === 'B') {
                        answerBlist.style.backgroundColor = '#47B298';
                    } else if (correctAnswer === 'C') {
                        answerClist.style.backgroundColor = '#47B298';
                    } else if (correctAnswer === 'D') {
                        answerDlist.style.backgroundColor = '#47B298';
                    }
                });
            }
        }
    </script>
</body>



</html>