<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Header with Question</title>
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
            background-color: #171717;
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
        }

        .question {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            color: #d3efe9;
        }

        .answers {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .answer-button {
            padding: 1rem;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            background-color: #47b298;
            color: #171717;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .answer-button2 {
            padding: 1rem;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            background-color: #19715c;
            color: #d3efe9;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .answer-button:hover {
            background-color: #19715c;
            color: #d3efe9;
            transition: background-color 0.3s ease;
            transform: scale(0.98);
        }

        .answer-button2:hover {
            background-color: #47b298;
            color: #171717;
            transition: background-color 0.3s ease;
            transform: scale(0.98);
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
                <p class="question" id="showQ">question</p>
                <div class="answers">
                    <button class="answer-button">True</button>
                    <button class="answer-button2">False</button>
                </div>
            </div>

            <div class="navigation">
                <a class="nav-button" href="4aQuestion.php">&lt;</a>
                <a class="nav-button" href="question7.html">&gt;</a>
            </div>
        </div>
    </main>

    <script>


    </script>
</body>

</html>