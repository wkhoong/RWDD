<?php
    include("FetchQuestion2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>16:9 Centered Layout</title>

    <style>
        :root {
            --bg-primary: #171717;
            --bg-secondary: #2a3935;
            --text-primary: #d3efe9;
            --text-secondary: #47b298;
            --accent: #19715c;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: var(--bg-primary);
            color: #ffffff;
            height: 100%;
        }

        h2 {
            margin: 0;
        }

        header {
            background-color: #2a3935;
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

        .quiz {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 1200px;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .question-number {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: #d3efe9;
            text-align: center;
        }

        .question-box {
            background-color: #2a3935;
            border-radius: 8px;
            padding: 1.5rem;
            display: grid;
        }

        .question-container {
            background-color: #2b3b37;
            width: 1520px;
            height: 360px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        span {
            font-size: 1.3rem;
            color: #d3efe9;
        }

        .answer-box {
            border: 1px solid #36b79d;
            border-radius: 5px;
            padding: 10px 15px;
            margin: 0 auto;
            width: 60%;
            max-width: 600px;
            color: var(--text-primary);
            background-color: transparent;
            margin-bottom: 24px;
            margin-top: 24px;
        }

        .navigation {
            margin-top: 1rem;
            display: flex;
            justify-content: right;
            gap: 1rem;
        }

        .nav-button {
            background-color: #d3efe9;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            color: #171717;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .nav-button:hover {
            background-color: #19715c;
            color: #d3efe9
        }

        @media (max-width: 768px) {
            /* .answers {
        flex-wrap: 1 1 calc(50%-20%);
      } */

            .answers {
                grid-template-columns: 1fr;
            }

            header h2 {
                margin-right: 1rem;
                transform: translateX(0%);
            }
        }

        @media (max-width: 480px) {
            .answers {
                grid-template-columns: 1fr;

            }

            header h2 {
                margin-right: 1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <a href="index.php">Assestify</a>
        <h2>History</h2>
    </header>

    <main>
        <div class="quiz">
            <p class="question-number" id=numQ>Question 1 of 10</p>
            <div class="question-box">
                <span id="showQ">Question..</span>
                <input type="text" class="answer-box" placeholder="Type your answer here">
                <span id="showQ2">Continue Question...</span>
            </div>

            <div class="navigation">
                <a class="nav-button" href="4aQuestion.php">&lt;</a>
                <a class="nav-button">&gt;</a>
            </div>
        </div>
    </main>

    <script>
        // let questionCount = 1;
        const numQ = document.getElementById("numQ");
        const showQ = document.getElementById("showQ");
        const showQ2 = document.getElementById("showQ2");
        
        fetch(`FetchQuestion.php?questionCount=${questionCount}`)
            .then((Response) => response.json())
            .then((data) => {
                numQ.textContent = ("Question "+ data.count + " of 10");
                showQ.textContent = data.firstHalf;
                showQ2.textContent = data.secondHalf;
                
            })

            previousQ.addEventListener("click", () => {
                questionCount --;
                numQ.textContent = `Question ${questionCount} of 10`;
                if (questionCount === 0){
                    previousQ.href = "mainpage.php";
                }else{
                    fetch(`FetchQuestion.php?questionCount=${questionCount}`)
                    .then((response) => response.json())
                    .then((data) => {
                        showQ.textContent = data.quiz;
                    })
                    .catch(error => {
                        console.error("error fetching qeustion: ", error);
                    });
                }
                
            });
        
    </script>



</body>

</html>