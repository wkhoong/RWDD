<?php
// This is a placeholder for any PHP code you might want to add in the future.
?>

<html>
<head>
    <title>
        Assestify - Subjects
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

        @keyframes hop {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px); /* Adjust the height of the hop */
    }
    100% {
        transform: translateY(0);
    }
}

        .card i {
            animation: hop 3.0s ease-in-out infinite; /* Apply the hop animation */
        }
        .card:hover i {
            color: #2a3b3c; /* Change icon color on hover */
        }

        .card img {
            width: 100px;
            height: 100px;
            background-color: #d3d3d3;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .card p {
            color: #8fd3d3;
            font-size: 32px;
            text-align: center;
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
        <a class="active" href="#">
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
                Subjects
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
    <button class="card">
        <i class="fas fa-calculator" style="font-size: 100px; color: #005f5f"></i>
        <p>
            Maths

        </p>
    </button>
    <button class="card">
        <i class="fas fa-flask" style="font-size: 100px; color: #005f5f"></i>
        <p>
            Science

        </p>
    </button>
    <button class="card">
        <i class="fas fa-book" style="font-size: 100px; color: #005f5f"></i>
        <p>
            Literature

        </p>
    </button>
    <button class="card">
        <i class="fas fa-history" style="font-size: 100px; color: #005f5f"></i>
        <p>
            History

        </p>
    </button>
    <button class="card">
        <i class="fas fa-vial" style="font-size: 100px; color: #005f5f"></i>
        <p>
            Chemistry

        </p>
    </button>
    <button class="card">
        <i class="fas fa-globe" style="font-size: 100px; color: #005f5f;"></i>
        <p>
            Geography

        </p>
    </button>
    <button class="card">
                <i class="fas fa-language" style="font-size: 100px; color: #005f5f;"></i>
                <p>Foreign Languages</p>
            </button>
            <button class="card">
                <i class="fas fa-pencil-ruler" style="font-size: 100px; color: #005f5f;"></i>
                <p>Art</p>
            </button>
            <button class="card">
                <i class="fas fa-music" style="font-size: 100px; color: #005f5f;"></i>
                <p>Music</p>
            </button>
            <button class="card">
                <i class="fas fa-microscope" style="font-size: 100px; color: #005f5f;"></i>
                <p>Biology</p>
            </button>
            <button class="card">
                <i class="fas fa-atom" style="font-size: 100px; color: #005f5f;"></i>
                <p>Physics</p>
            </button>
            <button class="card">
                <i class="fas fa-chart-line" style="font-size: 100px; color: #005f5f;"></i>
                <p>Statistics</p>
            </button>
            <button class="card">
                <i class="fas fa-book-open" style="font-size: 100px; color: #005f5f;"></i>
                <p>English</p>
            </button>
            <button class="card">
                <i class="fas fa-book-reader" style="font-size: 100px; color: #005f5f;"></i>
                <p>Reading</p>
            </button>
            <button class="card">
                <i class="fas fa-chalkboard-teacher" style="font-size: 100px; color: #005f5f;"></i>
                <p>Social Studies</p>
            </button>
            <button class="card">
                <i class="fas fa-microchip" style="font-size: 100px; color: #005f5f;"></i>
                <p>Computer Science</p>
            </button>
            <button class="card">
                <i class="fas fa-dna" style="font-size: 100px; color: #005f5f;"></i>
                <p>Genetics</p>
            </button>
            <button class="card">
                <i class="fas fa-brain" style="font-size: 100px; color: #005f5f;"></i>
                <p>Psychology</p>
            </button>
            <button class="card">
                <i class="fas fa-chart-bar" style="font-size: 100px; color: #005f5f;"></i>
                <p>Economics</p>
            </button>
            <button class="card">
                <i class="fas fa-globe-americas" style="font-size: 100px; color: #005f5f;"></i>
                <p>World History</p>
            </button>
            <button class="card">
                <i class="fas fa-book-dead" style="font-size: 100px; color: #005f5f;"></i> <p>Philosophy</p>
            </button>
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