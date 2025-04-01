<?php
// This is a placeholder for any PHP code you might want to add in the future.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Information - Assestify</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        :root {
            --bg-primary: #171717;
            --bg-secondary: #2a3935;
            --text-primary: #d3efe9;
            --text-secondary: #47b298;
            --accent: #19715c;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-weight: bold;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: var(--bg-secondary);
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 24px;
        }

        header a {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent);
            margin-right: auto;
            margin-left: 1rem;
            text-decoration: none;
        }

        main {
            flex-grow: 1;
            display: flex;

            justify-content: center;
            padding: 0rem 2rem ;
        }

        .content {
            width: 100%;

            padding: 20px;
        }

        .content h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
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
            background-color: var(--bg-secondary);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .button-container {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            place-items: center;
            justify-content: center;
            margin: 20px 0;
        }

        .button {
            background-color: var(--text-primary);
            color: var(--accent);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
            max-width: 200px;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        .button:hover, .button.active {
            background-color: var(--accent);
            color: var(--text-primary);
        }

        .form-group {
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .number-input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid var(--text-primary);
            background-color: var(--bg-secondary);
            color: var(--text-primary);
            margin-top: 5px;
            text-align: center;
        }

        .backNext-container {
            display: flex;
            /* grid-template-columns: repeat(autofit, minmax(110px, 1fr)); */
            gap: 20px;
            justify-content: center;
            place-items: center;
            margin-top: 20px;
        }

        .next-button, .back-button {
            background-color: var(--accent);
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            color: var(--text-primary);
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            max-width: 150px;
            transition: background-color 0.3s;
        }

        .next-button:hover, .back-button:hover {
            background-color: var(--text-secondary);
        }

        @media (max-width: 768px) {
            

            .container {
                padding: 20px;
            }

            .button-container {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }

            .number-input {
                /* width: 200px; */
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            .progress-bar {
                flex-direction: column;
                align-items: flex-start;
            }

            .progress-bar .line {
                display: none;
            }

            header a {
                margin: 0;
                font-size: clamp(24px, 2vw, 2rem);
            }

            main {
                padding: 0rem 1rem;
            }

            .content h2 {
                font-size: 18px;
            }

            .button-container {
                grid-template-columns: 1fr;
            }

            .number-input {
                /* width: 200px; */
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="lecturedash.php">Assestify</a>
    </header>
    <main>
        <div class="content">
            <br><br>
            <h2>Basic Information</h2>
            <br>
            <div class="progress-bar">
                <div class="step active">
                    <div class="circle">1</div>
                    Basic Information
                </div>
                <div class="line active"></div>
                <div class="step">
                    <div class="circle">2</div>
                    Create Questions
                </div>
                <div class="line"></div>
                <div class="step">
                    <div class="circle">3</div>
                    Done
                </div>
            </div>
            <br><br>
            <div class="container">
                <h3>Select Subject:</h3>
                <div class="button-container" id="subjectButtons">
                    <button class="button" data-value="maths">Maths</button>
                    <button class="button" data-value="science">Science</button>
                    <button class="button" data-value="literature">Literature</button>
                    <button class="button" data-value="history">History</button>
                    <button class="button" data-value="chemistry">Chemistry</button>
                    <button class="button" data-value="geography">Geography</button>
                </div>
                <h3>Select Difficulty Level:</h3>
                <div class="button-container" id="difficultyButtons">
                    <button class="button" data-value="easy">Easy</button>
                    <button class="button" data-value="intermediate">Intermediate</button>
                    <button class="button" data-value="hard">Hard</button>
                </div>
                <div class="form-group">
                    <h3>Number of Questions:</h3>
                    <input type="number" id="numberOfQuestions" class="number-input" min="1" max="100" placeholder="Enter number of questions">
                </div>
                <div class="backNext-container">
                    <button class="back-button" id="backButton">Back</button>
                    <button class="next-button" id="nextButton">Next</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        let selectedSubject = '';
        let selectedDifficulty = '';

        document.querySelectorAll('#subjectButtons .button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('#subjectButtons .button').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                selectedSubject = this.getAttribute('data-value');
            });
        });

        document.querySelectorAll('#difficultyButtons .button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('#difficultyButtons .button').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                selectedDifficulty = this.getAttribute('data-value');
            });
        });

        document.getElementById('nextButton').addEventListener('click', function() {
            const numberOfQuestions = document.getElementById('numberOfQuestions').value;

            if (selectedSubject && numberOfQuestions) {
                localStorage.setItem('subject', selectedSubject);
                localStorage.setItem('numberOfQuestions', numberOfQuestions);
                window.location.href = 'singleans.php';
            } else {
                alert('Please select a subject and enter the number of questions.');
            }
        });

        document.getElementById('backButton').addEventListener('click', function() {
            window.location.href = 'lecturedash.php';
        });
    </script>
</body>
</html>