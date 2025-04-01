<?php

if (isset($_GET['selectedSubject'])) {
  $selectedSubject = $_GET['selectedSubject'];
  // echo json_encode(["selectedSubject" => $selectedSubject]);
}else {
  // echo json_encode(["error" => "No subject selected"]);
  // exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assetify - History Box</title>
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
      font-family: Arial, sans-serif;
      background-color: #000000;
      height: 100vh;
    }

    .header {
      background-color: #2a3935;
      padding: 1rem;
      display: flex;
      justify-content: left;
      align-items: center;
      margin-bottom: 2rem;
    }

    .header a {
      color: #19715C;
      font-size: 24px;
      margin: 0;
      margin-left: 1rem;
      font-weight: bold;
      text-decoration: none;
    }


    .container {
      /* position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%); */

      margin-top: 1rem;
      height: 73vh;
      width: 75%;
      max-width: 1200px;
      /* height: calc(100vh - 80px);  */
      /* height: 90%; */
      /* display: flex; */
      /* flex-direction: row; */
      background-color: #2a3935;
      justify-content: center;
      /* align-items: center; */
      text-align: center;
      margin: auto;
      border-radius: 8px;
      padding: 2rem;
    }


    .sidebar {
      width: 150px;
      height: 700px;
      background-color: #b3b3b3;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .sidebar img {
      width: 50px;
      height: 50px;
    }


    /* .main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      /* width: 80%;
      height: 90%;

    } */


    .history-box {
      /* width: 90%; */
      height: 91%;
      background-color: #19715c;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
      /* margin: 1rem 0; */
    }

    .history-box h1 {
      color: #d3efe9;
      font-size: 28px;
      margin: 0;
      margin-top: 1rem;
      font-weight: bold;
    }

    .history-box h2 {
      color: #d3efe9;
      font-size: 22px;
      margin: 0;
      margin-top: 0.5rem;
      margin-bottom: 1rem;
      ;
      font-weight: lighter;
    }

    .icon-container {
      width: 200px;
      height: 200px;
      background-color: #19715c;
      border-radius: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 4rem;
    }

    .icon-container img {
      width: 180px;
      height: 180px;
    }

    .start-button {
      width: 120px;
      height: 50px;
      background-color: #2a3935;
      color: #d3efe9;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
      font-weight: bold;
      /* align-content: center;
      text-align: center; */
      display: grid;
      place-items: center;
      text-decoration: none;
      transition: 0.3s ease;
    }

    .start-button:hover {
      background-color: #d3efe9;
      color: #19715c;
      transition: 0.3s ease;
      transform: scale(0.98);
    }
  </style>
</head>

<body>

  <div class="header">
    <a href="index.php">Assestify</a>
  </div>

  <main>
    <div class="container">
      <!-- <div class="main"> -->
      <div class="history-box">
        <h1>High School</h1>
        <h2 id="debug">History</h2>
        <div class="icon-container">
          <img src="https://imagepng.org/wp-content/uploads/2017/11/mapa-brasil-em-branco-6.png" alt="History Icon">
        </div>
        <a class="start-button" id="start" /*href="4aQuestion.php" * />Start</a>
      </div>
    </div>
    </div>
  </main>

  <script>

    const subject = <?php echo json_encode($selectedSubject); ?>;
    let username = "Bali";
    const start = document.getElementById("start");
    const debug = document.getElementById("debug");

    debug.textContent = subject;

    // start.href = "4aQuestion.php";
    start.addEventListener("click", () => {
         fetch(`4aQuestion.php?subject=${subject}`)
        .then((response) => response.text())
        .then((data) => {
          if (subject === "Maths" || subject === "Literature" || subject === "History"){
          window.location.href = `4aQuestion.php?subject=${subject}`;
          console.log("Response from 4aQuestion.php:", data);
        }else if (subject === "Chemistry"){
          window.location.href = `multiAnswer.php?subject=${subject}`;
          console.log("Response from multiAnswer.php:", data);
        }else if (subject === "Science"){
          window.location.href = `qTrueFalse.php?subject=${subject}`;
          console.log("Response from qTrueFalse.php:", data);
        }else if (subject === "Geography"){
          window.location.href = `gapFil.php?subject=${subject}`;
          console.log("Response from gapFil.php:", data);
        }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    });


  </script>





</body>

</html>