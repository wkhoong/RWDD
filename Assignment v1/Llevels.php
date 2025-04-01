<?php
// This is a placeholder for any PHP code you might want to add in the future.
?>

<html>
<head>
    <title>
        Assestify - Levels
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
        .level-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }
        .level {
            background-color: #2a3b3c;
            flex: 1 1 calc(33% - 20px); /* Responsive width */
            min-width: 260px; /* Minimum width */
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: none; /* Remove border for button */
            transition: background-color 0.3s; /* Add transition for hover effect */
        }
        .level:hover {
            background-color: #8fd3d3; /* Change background on hover */
            color: #2a3b3c; /* Change text color on hover */
        }
        .level:hover p {
            color: #2a3b3c; /* Change text color of paragraph on hover */
            font-weight: bold;
        }

        .level:hover h3 {
            color: #2a3b3c; /* Change icon color on hover */
            font-weight: bold;
        }
        .level h3 {
            color: #d3d3d3;
            margin-bottom: 10px;
            font-size: 24px;
 }
        .level p {
            color: #8fd3d3;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1>
            Assestify
        </h1>
        <a href="lecturedash.php">
            Library
        </a>
        <a href="Lsubjects.php">
            Subject
        </a>
        <a class="active" href="#">
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
                Levels
            </h2>
            <div class="search-bar">
                <input placeholder="Search" type="text"/>
                <button>
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="level-container">
            <div class="level">
                <h3>Easy</h3>
                <p>
                    This level covers basic concepts and introductory questions in the following subjects:
                    <br/> 
                    - Maths: Basic arithmetic and geometry.
                    <br/> 
                    - Science: Fundamental principles of physics and chemistry.
                    <br/> 
                    - Literature: Understanding of simple texts and themes.
                    <br/> 
                    - History: Key events and figures in history.
                    <br/> 
                    - Geography: Basic geographical terms and locations.
                    <br/> 
                    - Chemistry: Introduction to elements and compounds.
                </p>
            </div>
            <div class="level">
                <h3>Intermediate</h3>
                <p>
                    This level includes more complex questions that require a deeper understanding:
                    <br/> 
                    - Maths: Algebra and basic calculus.
                    <br/> 
                    - Science: Intermediate concepts in biology and chemistry.
                    <br/> 
                    - Literature: Analysis of themes and character development.
                    <br/> 
                    - History: Understanding of significant historical movements.
                    <br/> 
                    - Geography: Concepts of physical and human geography.
                    <br/> 
                    - Chemistry: Reactions and properties of substances.
                </p>
            </div>
            <div class="level">
                <h3>Hard</h3>
                <p>
                    This level challenges students with advanced questions:
                    <br/> 
                    - Maths: Advanced calculus and statistics.
                    <br/> 
                    - Science: In-depth studies in physics and advanced biology.
                    <br/> 
                    - Literature: Critical analysis of complex texts.
                    <br/> 
                    - History: Detailed study of historical analysis and interpretations.
                    <br/> 
                    - Geography: Advanced geographical theories and case studies.
                    <br/> 
                    - Chemistry: Complex chemical equations and laboratory techniques.
                </p>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('createQuestionsBtn').addEventListener('click', function() {
            window.location.href = 'basicinfo.php';
        });
    </script>
</body>
</html>