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
  <title>History</title>

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
      color: #d3efe9;
      height: 100%;
      /* position: relative; */
    }

    .container {
      width: 90%;
      max-width: 950px;
      text-align: center;
    }

    h2 {
      margin: 0;
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
      background-color: #19715c;
      color: #d3efe9;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }

    .answer-button2 {
      padding: 1rem;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      background-color: #2e8b75;
      color: #d3efe9;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }

    .answer-button3 {
      padding: 1rem;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      background-color: #47b298;
      color: #171717;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }

    .answer-button4 {
      padding: 1rem;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      background-color: #6cd1b3;
      color: #171717;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }

    .answer-button:hover {
      background-color: #6cd1b3;
      color: #171717;
      transition: background-color 0.3s ease;
      transform: scale(0.98);
    }

    .answer-button2:hover {
      background-color: #47b298;
      color: #171717;
      transition: background-color 0.3s ease;
      transform: scale(0.98);
    }

    .answer-button3:hover {
      background-color: #2e8b75;
      color: #d3efe9;
      transition: background-color 0.3s ease;
      transform: scale(0.98);
    }

    .answer-button4:hover {
      background-color: #19715c;
      color: #d3efe9;
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
  <!-- <div class="container"> -->
  <header>
    <a href="index.php">Assestify</a>
    <h2>History</h2>
  </header>


  <main>
    <div class="quiz">
      <!-- <div> -->
      <p class="question-number" id=numQ>Question 1 of 10</p>
      <div class="question-box">
        <p class="question" id="showQ">Question</p>
        <div class="answers">
          <a class="answer-button" id="an1">Answer</a>
          <a class="answer-button2" id="an2">Answer</a>
          <a class="answer-button3" id="an3">Answer</a>
          <a class="answer-button4" id="an4">Answer</a>
        </div>
      </div>
      <!-- </div> -->

      <div class="navigation">
        <a class="nav-button" id=previousQ>&lt;</a>
        <a class="nav-button" id="nextQ">&gt;</a>
      </div>
    </div>
  </main>

  <script>
    const quizIdList = <?php echo json_encode($quizId); ?>;
    let questionCount = 1;
    const qName = "<?php echo isset($qName) ? $qName : ''; ?>";
    const uAnswer = [];

    const numQ = document.getElementById("numQ");
    const nextQ = document.getElementById("nextQ");
    const previousQ = document.getElementById("previousQ");
    const showQ = document.getElementById("showQ");

    const an1 = document.getElementById("an1");
    const an2 = document.getElementById("an2");
    const an3 = document.getElementById("an3");
    const an4 = document.getElementById("an4");

    previousQ.href = "mainpage.php";
    numQ.textContent = ("Question " + questionCount + " of 10 ");
    fetch(`FetchQuestion2.php?questionCount=${quizIdList[questionCount-1]}`)
      .then((response) => response.json())
      .then((data) => {
        showQ.textContent = data.quiz;
        an1.textContent = data.s1;
        an2.textContent = data.s2;
        an3.textContent = data.s3;
        an4.textContent = data.s4;
        // console.log("result; ", data);
      })
      .catch(error => {
        console.error("error fetching 1 ", error);
      });



    nextQ.addEventListener("click", () => {
      questionCount++;
      // console.log(questionCount);
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

    an1.addEventListener("click", () => {
      questionCount++;
      numQ.textContent = `Question ${questionCount} of 10`;
      previousQ.removeAttribute("href");
      
      fetch(`FetchQuestion2.php?questionCount=${quizIdList[questionCount-1]}`)
        .then((response) => response.json())
        .then((data) => {
          showQ.textContent = data.quiz;
          an1.textContent = data.s1;
          an2.textContent = data.s2;
          an3.textContent = data.s3;
          an4.textContent = data.s4;
          uAnswer.push(data.s1);
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("An error occurred. Please try again.");
        });
        if (questionCount > 10) {
        an1.href = "donepage.php";
        // Convert `uAnswer` array to JSON before sending
        fetch(`saveAns.php`, {
            method: "POST", // Use POST for better compatibility
            headers: {
              "Content-Type": "application/json", // Specify JSON format
            },
            body: JSON.stringify({
              qName: qName,
              uAnswer: uAnswer, // Send the entire array
            }),
          })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              console.log(data.message); // Successfully saved
              alert("Saving answer: " + data.message);
            } else {
              console.error("Error saving answer:", data.message);
              alert("Error saving answer: " + data.message);
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            alert("An error occurred while saving answers.");
          });
        return;
      }
    });


    an2.addEventListener("click", () => {
      questionCount++;
      numQ.textContent = `Question ${questionCount} of 10`;
      previousQ.removeAttribute("href");
      if (questionCount > 10) {
        an2.href = "donepage.php";
        // Convert `uAnswer` array to JSON before sending
        fetch(`saveAns.php`, {
            method: "POST", // Use POST for better compatibility
            headers: {
              "Content-Type": "application/json", // Specify JSON format
            },
            body: JSON.stringify({
              qName: qName,
              uAnswer: uAnswer, // Send the entire array
            }),
          })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              console.log(data.message); // Successfully saved
              alert("Saving answer: " + data.message);
            } else {
              console.error("Error saving answer:", data.message);
              alert("Error saving answer: " + data.message);
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            alert("An error occurred while saving answers.");
          });
        return;
      }
      fetch(`FetchQuestion2.php?questionCount=${quizIdList[questionCount-1]}`)
        .then((response) => response.json())
        .then((data) => {
          showQ.textContent = data.quiz;
          an1.textContent = data.s1;
          an2.textContent = data.s2;
          an3.textContent = data.s3;
          an4.textContent = data.s4;
          uAnswer.push(data.s2);
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("An error occurred. Please try again.");
        });
    });

    an3.addEventListener("click", () => {
      questionCount++;
      numQ.textContent = `Question ${questionCount} of 10`;
      previousQ.removeAttribute("href");
      if (questionCount > 10) {
        an3.href = "donepage.php";
        // Convert `uAnswer` array to JSON before sending
        fetch(`saveAns.php`, {
            method: "POST", // Use POST for better compatibility
            headers: {
              "Content-Type": "application/json", // Specify JSON format
            },
            body: JSON.stringify({
              qName: qName,
              uAnswer: uAnswer, // Send the entire array
            }),
          })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              console.log(data.message); // Successfully saved
              alert("Saving answer: " + data.message);
            } else {
              console.error("Error saving answer:", data.message);
              alert("Error saving answer: " + data.message);
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            alert("An error occurred while saving answers.");
          });
        return;
      }
      fetch(`FetchQuestion2.php?questionCount=${quizIdList[questionCount-1]}`)
        .then((response) => response.json())
        .then((data) => {
          showQ.textContent = data.quiz;
          an1.textContent = data.s1;
          an2.textContent = data.s2;
          an3.textContent = data.s3;
          an4.textContent = data.s4;
          uAnswer.push(data.s3);
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("An error occurred. Please try again.");
        });
    });

    an4.addEventListener("click", () => {
      questionCount++;
      numQ.textContent = `Question ${questionCount} of 10`;
      previousQ.removeAttribute("href");
      if (questionCount > 10) {
        an4.href = "donepage.php";
        // Convert `uAnswer` array to JSON before sending
        fetch(`saveAns.php`, {
            method: "POST", // Use POST for better compatibility
            headers: {
              "Content-Type": "application/json", // Specify JSON format
            },
            body: JSON.stringify({
              qName: qName,
              uAnswer: uAnswer, // Send the entire array
            }),
          })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              console.log(data.message); // Successfully saved
              alert("Saving answer: " + data.message);
            } else {
              console.error("Error saving answer:", data.message);
              alert("Error saving answer: " + data.message);
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            alert("An error occurred while saving answers.");
          });
        return;
      }
      fetch(`FetchQuestion2.php?questionCount=${quizIdList[questionCount-1]}`)
        .then((response) => response.json())
        .then((data) => {
          showQ.textContent = data.quiz;
          an1.textContent = data.s1;
          an2.textContent = data.s2;
          an3.textContent = data.s3;
          an4.textContent = data.s4;
          uAnswer.push(data.s4);
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("An error occurred. Please try again.");
        });
    });
  </script>

</body>

</html>