<?php
include("db.php");

if (isset($_GET['subject'])) {
  $subject = $_GET['subject'];
  $sql = "SELECT * FROM quiz_questions WHERE subject = ? LIMIT 10";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    die("Failed to prepare statement: " . $conn->error);
  }
  $stmt->bind_param("s", $subject);
  $stmt->execute();
  // $stmt->bind_result($quizId);
  $result = $stmt->get_result();


  // if ($result->num_rows > 0) {
  //   $quizId = [];
  //   $row = $result->fetch_assoc();
  //   // echo json_encode(["qName" => $row["subject"]]);
  //   $qName = $row["subject"];

  // } else {
  //   $quizId = 1;
  //   error_log("No questions found for subject = $subject.");
  // }

  // $stmt->close();
  // } 

  if ($result->num_rows > 0) {
    $quizId = [];
    while ($row = $result->fetch_assoc()) {
      $quizId[] = $row['id'];
      $qName = $row["subject"];
    }
  } else {
    $quizId = 1;
    error_log("No questions found for subject = $subject.");
  }
  $stmt->close();
} else {
  echo json_encode(["error: " => $subject]);
  $quizId = 1;
}

$quizId = array_slice($quizId, 0, 10);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiple Answer Question</title>
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
      color: var(--text-primary);
      height: 100%;
    }

    h2 {
      margin: 0;
    }

    .container {
      width: 90%;
      max-width: 950px;
      text-align: center;
    }

    .quiz {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%;
      max-width: 1200px;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .question-number {
      font-size: 1.2rem;
      margin-bottom: 1rem;
      color: var(--text-primary);
      text-align: center;
    }

    .question-box {
      background-color: var(--bg-secondary);
      border-radius: 8px;
      padding: 1.5rem;
    }

    .question {
      font-size: 1.3rem;
      margin-bottom: 1.5rem;
      color: var(--text-primary);
    }

    .answers {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }

    .answer-container {
      display: flex;
      align-items: center;
      background-color: var(--accent);
      padding: 1rem;
      border-radius: 8px;
      color: var(--text-primary);
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .answer-container2 {
      display: flex;
      align-items: center;
      background-color: #2e8b75;
      padding: 1rem;
      border-radius: 8px;
      color: #d3efe9;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .answer-container3 {
      display: flex;
      align-items: center;
      background-color: #47b298;
      padding: 1rem;
      border-radius: 8px;
      color: #171717;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .answer-container4 {
      display: flex;
      align-items: center;
      background-color: #6cd1b3;
      padding: 1rem;
      border-radius: 8px;
      color: var(--bg-primary);
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .answer-container:hover {
      background-color: #6cd1b3;
      color: var(--bg-primary);
      transform: scale(0.98);
    }

    .answer-container2:hover {
      background-color: var(--text-secondary);
      color: var(--bg-primary);
      transform: scale(0.98);
    }

    .answer-container3:hover {
      background-color: #2e8b75;
      color: var(--text-primary);
      transform: scale(0.98);
    }

    .answer-container4:hover {
      background-color: var(--accent);
      color: var(--text-primary);
      transform: scale(0.98);
    }

    .answer-container input[type="checkbox"] {
      margin-right: 1rem;
      accent-color: var(--text-secondary);
      transform: scale(1.3);
    }

    .navigation {
      margin-top: 1rem;
      display: flex;
      justify-content: right;
      gap: 1rem;
    }

    .nav-button {
      background-color: var(--text-primary);
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      color: var(--bg-primary);
      font-size: 1.2rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      justify-content: center;
      align-items: center;
    }

    .nav-button:hover {
      background-color: var(--accent);
      color: var(--text-primary);
    }

    header {
      background-color: var(--bg-secondary);
      padding: 1rem;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    header a {
      font-size: 1.5rem;
      font-weight: bold;
      color: var(--accent);
      margin-right: auto;
      margin-left: 1rem;
      text-decoration: none;
    }

    header h2 {
      color: var(--text-secondary);
      margin-right: auto;
      transform: translateX(-70%);
    }

    @media (max-width: 768px) {
      .answers {
        grid-template-columns: 1fr;
      }

      header h2 {
        margin-right: 1rem;
        transform: translateX(0%);
      }
    }
  </style>
</head>

<body>
  <header>
    <a href="index.php">Assestify</a>
    <h2 id="h2">History</h2>
  </header>

  <main>
    <div class="quiz">
      <p class="question-number" id="numQ">Question 1 of 10</p>
      <div class="question-box">
        <p class="question" id="showQ">Which of these are fruits?</p>
        <div class="answers">
          <label class="answer-container">
            <input type="checkbox" name="answer" value="Apple" id="an1">
            Apple
          </label>
          <label class="answer-container2">
            <input type="checkbox" name="answer" value="Carrot" id="an2">
            Carrot
          </label>
          <label class="answer-container3">
            <input type="checkbox" name="answer" value="Banana" id="an3">
            Banana
          </label>
          <label class="answer-container4">
            <input type="checkbox" name="answer" value="Potato" id="an4">
            Potato
          </label>
        </div>
      </div>

      <div class="navigation">
        <a class="nav-button" id="previousQ">&lt;</a>
        <a class="nav-button" id="nextQ">&gt;</a>
      </div>
    </div>
  </main>

  <script>
    let questionCount = 1;
    const nextQ = document.getElementById("nextQ");
    const previousQ = document.getElementById("previousQ");

    const showQ = document.getElementById("showQ");
    const h2 = document.getElementById("h2");
    const qName = <?php echo json_encode($selectedSubject); ?>;

    const an1 = document.getElementById("an1");
    const an2 = document.getElementById("an2");
    const an3 = document.getElementById("an3");
    const an4 = document.getElementById("an4");

    nextQ.addEventListener("click", () => {
      questionCount++;
      // console.log(questionCount);
      h2.textContent = qName;
      numQ.textContent = `Question ${questionCount} of 10`;
      previousQ.removeAttribute("href");
      if (questionCount > 10) {
        nextQ.href = "donepage.php";
      } else {
        fetch(`FetchQuestion2.php?questionCount=${quizIdList[questionCount-1]}`)
          .then((response) => response.json())
          .then((data) => {
            showQ.textContent = data.quiz;
            an1.textContent = data.s1;
            an2.textContent = data.s2;
            an3.textContent = data.s3;
            an4.textContent = data.s4;


          })
          .catch(error => {
            console.error("error fetching qeustion: ", error);
          });
      }

    });

    previousQ.addEventListener("click", () => {
      questionCount--;
      numQ.textContent = `Question ${questionCount} of 10`;
      if (questionCount > 1) {
        previousQ.href = "mainpage.php";
      } else {
        fetch(`FetchQuestion2.php?questionCount=${quizIdList[questionCount-1]}`)
          .then((response) => response.json())
          .then((data) => {
            showQ.textContent = data.quiz;
            an1.textContent = data.s1;
            an2.textContent = data.s2;
            an3.textContent = data.s3;
            an4.textContent = data.s4;
          })
          .catch(error => {
            console.error("error fetching qeustion: ", error);
          });
      }
      if (questionCount === 10) {
        nextQ.removeAttribute("href");
      }

    });
  </script>
</body>

</html>