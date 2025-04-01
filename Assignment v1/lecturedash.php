<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "assignment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
session_start();
if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== true) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Check if the logged-in user is the designated lecturer
if ($_SESSION["email"] !== "shadowgarden@gmail.com" || $_SESSION["password"] !== "Hokage04") {
    // Redirect to login page if not the designated lecturer
    header("Location: login.php");
    exit;
}

// Fetch data from the database
$sql = "SELECT subject, COUNT(*) AS question_count FROM quiz_questions GROUP BY subject";
$result = $conn->query($sql);

// Initialize an array to store the subjects and their question counts
$subjects = [];

// Loop through the results and store the data in the array
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $subjects[$row['subject']] = $row['question_count'];
  }
} else {
  echo "No subjects found.";
}

// Close the connection
$conn->close();
?>

<html>
 <head>
  <title>
   Assestify
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #b3b3b3;
        }
        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #2a3b3c;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 60px; /* Moved down */
        }
        .sidebar h1 {
            color: #8fd3d3;
            font-size: 24px;
            margin-bottom: 40px;
            transform-origin: center;
        }
        .sidebar a {
            color: #b3b3b3;
            text-decoration: none;
            font-size: 18px;
            margin: 10px 0;
            padding: 5px 10px; /* Smaller padding */
            width: 80%; /* Smaller width */
            text-align: center;
        }
        .sidebar a.active {
            background-color: #8fd3d3;
            color: #2a3b3c;
            border-radius: 5px;
            font-weight: bold;
        }
        .sidebar a:hover {
            background-color: #8fd3d3; /* Change background color on hover */
            color: #2a3b3c; /* Change text color on hover */
            border-radius: 5px; /* Rounded corners on hover */
            font-weight: bold;
        }
        .header {
            background-color: #c8f0f0;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 200px;
            right: 0;
            z-index: 1000;
        }
        .header button {
            background-color: #2a3b3c;
            color: #c8f0f0;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .header button:hover {
            background-color: #8fd3d3; /* Change background color on hover */
            color: #2a3b3c; /* Change text color on hover */
            font-weight: bold;
        }
        .header .profile {
            display: flex;
            align-items: center;
        }
        .header .profile img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .main {
            margin-left: 200px;
            padding: 20px;
            margin-top: 80px; /* Adjusted for fixed header */
        }
        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .main-header h2 {
            color: #8fd3d3;
            font-size: 24px;
            margin: 0;
        }
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-right: 1%;
        }
        .search-bar input {
            padding: 10px;
            border: 1px solid #8fd3d3;
            border-radius: 5px 0 0 5px;
            outline: none;
            width: 200px;
        }
        .search-bar button {
            padding: 10px;
            border: 1px solid #8fd3d3;
            border-left: none;
            background-color: #8fd3d3;
            color: #2a3b3c;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
        .search-bar button:hover {
            background-color: #2a3b3c; /* Change background color on hover */
            color: #c8f0f0; /* Change text color on hover */
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }
        .card {
            background-color: #2a3b3c;
            flex: 1 1 calc(33% - 20px); /* Responsive width */
            min-width: 260px; /* Minimum width */
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: none; /* Remove border for button */
            cursor: pointer; /* Change cursor to pointer */
            transition: background-color 0.3s; /* Add transition for hover effect */
        }
        .card:hover {
            background-color: #8fd3d3; /* Change background on hover */
             color: #2a3b3c; /* Change text color on hover */
        }

        .card:hover p {
            color: #2a3b3c; /* Change text color of paragraph on hover */
            font-weight: bold;
        }
        .card img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .card p {
            color: #8fd3d3;
            font-size: 18px;
            text-align: center;
        }
        

  </style>
 </head>
 <body>
  <div class="sidebar">
   <h1>
    Assestify
   </h1>
   <a class="active" href="#">
    Library
   </a>
   <a href="Lsubjects.php">
    Subject
   </a>
   <a href="Llevels.php">
    Level
   </a>
  </div>
  <div class="header">
  <button id="createQuestionsBtn">Create Questions</button>
  <div class="profile">
    <a href="Lprofile.php" style="display: flex; align-items: center; text-decoration: none;">
      <img alt="Profile Picture" height="40" src="https://storage.googleapis.com/a1aa/image/D8VIIQJBKfwQH63KJ0B4kGGkle6M3gdYeYe4jPuPVZOzwnTPB.jpg" width="40"/>
      <span style="color: #2a3b3c; margin-left: 2px; padding-right: 10px; font-weight: bold;">Kagenou</span>
    </a>
  </div>
</div>
  <div class="main">
   <div class="main-header">
    <h2>
     Library
    </h2>
    <div class="search-bar">
    <input id="subjectSearchInput" placeholder="Search subjects..." type="text" onkeyup="filterSubjects()"/>
     <button>
     <i class="fas fa-search">
      </i>
     </button>
    </div>
   </div>
   <div class="card-container">
    <?php foreach ($subjects as $subject => $count): ?>
<a href="subject_questions.php?subject=<?php echo urlencode($subject); ?>" class="card">
<img alt="<?php echo htmlspecialchars($subject); ?> Image" height="100" 
                 src="<?php 
                     if ($subject === 'Maths') {
                         echo 'https://img.icons8.com/ios-filled/100/d3d3d3/math.png';
                     } elseif ($subject === 'Science') {
                         echo 'https://img.icons8.com/ios-filled/100/d3d3d3/laboratory.png';
                     } elseif ($subject === 'Literature') {
                         echo 'https://img.icons8.com/ios-filled/100/d3d3d3/open-book.png';
                     } elseif ($subject === 'History') {
                         echo 'https://img.icons8.com/ios-filled/100/d3d3d3/timeline.png';
                     } elseif ($subject === 'Chemistry') {
                         echo 'https://img.icons8.com/ios-filled/100/d3d3d3/test-tube.png';
                     } elseif ($subject === 'Geography') {
                         echo 'https://img.icons8.com/ios-filled/100/d3d3d3/map.png';
                     }
                 ?>" 
                 width="100"/>
            <p>
        <?php echo htmlspecialchars($subject); ?><br/>
        <?php echo htmlspecialchars($count); ?> number of questions<br/>

    </p>
</a>
    <?php endforeach; ?>
   </div>
  </div>
  <script>
        document.getElementById('createQuestionsBtn').addEventListener('click', function() {
            window.location.href = 'basicinfo.php';
        });
        
        function filterSubjects() {
        const input = document.getElementById('subjectSearchInput');
        const filter = input.value.toLowerCase();
        const subjectCards = document.querySelectorAll('.card');

        subjectCards.forEach(card => {
            const subjectText = card.querySelector('p').textContent.toLowerCase();
            if (subjectText.includes(filter)) {
                card.style.display = ""; // Show the card
            } else {
                card.style.display = "none"; // Hide the card
            }
        });
    }
    </script>
 </body>
</html>