<?php

if (isset($_GET['selectedSubject']) && !empty($_GET['selectedSubject'])) {
    $selectedSubject = $_GET['selectedSubject'];
    // echo "selectedSubject: " . htmlspecialchars($selectedSubject);
    // echo json_encode(["selectedSubject" => $selectedSubject]);
    // exit;
} else {
    echo json_encode(["error" => "No subject selected"]);
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assestify</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
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
            background-color: #0f0f0f;
            color: var(--text-primary);
        }

        /* Header styles */
        header {
            background-color: #26332d;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #19715c;
        }

        header a {
            font-size: 24px;
            font-weight: bold;
            color: #19715c;
            text-decoration: none;
        }

        header .profile {
            display: flex;
            align-items: center;
        }

        header .profile img {
            border-radius: 50%;
            /* margin-right: 10px; */
        }

        .main {
            padding: 20px;
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .main-header h2 {
            color: var(--text-secondary);
            font-size: 24px;
        }

        .search-bar input {
            padding: 10px;
            border: 1px solid var(--text-secondary);
            border-radius: 5px 0 0 5px;
            outline: none;
            width: 200px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            /* grid-template-columns: minmax(3, 1fr); */
        }



        .card {
            background-color: #2a3b3c;
            flex: 1 1 calc(33% - 20px);
            min-width: 260px;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .card img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .card p {
            font-size: 18px;
            text-align: center;
            color: #d3efe9;
        }

        .card:hover {
            background-color: var(--text-secondary);
            color: #171717;
        }

        /* .card p:hover {
            background-color: var(--text-secondary);
            color: #171717;
        } */
        
    </style>
</head>

<body>
    <!-- Combined header -->
    <header>
        <a href="index.php">Assestify</a>
        <div class="profile">
            <img alt="Profile Picture" height="40"
                src="https://storage.googleapis.com/a1aa/image/D8VIIQJBKfwQH63KJ0B4kGGkle6M3gdYeYe4jPuPVZOzwnTPB.jpg"
                width="40">
        </div>
    </header>

    <div class="main">
        <div class="main-header">
            <h2 id="h2subject">Math</h2>
        </div>
        <div class="card-container">
            <!-- Repeated card components -->
            <a class="card" id="maths">
                <img alt="Subject Image"
                    src="https://th.bing.com/th/id/OIP.mf403lsRko_2v1OouY7ghAHaHa?w=203&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" />
                <p id="p1">
                    Maths Set 1
                </p>
            </a>

            <a class="card" id="set2">
                <img alt="Subject Image"
                    src="https://th.bing.com/th/id/OIP.mf403lsRko_2v1OouY7ghAHaHa?w=203&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" />
                <p id="p2">
                     Set 2
                </p>
            </a>
            <a class="card" id="Chemistry">
                <img alt="Subject Image"
                    src="https://th.bing.com/th/id/OIP.mf403lsRko_2v1OouY7ghAHaHa?w=203&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" />
                <p id="p3">
                    Chemistry Set 3
                </p>
            </a>
            <a class="card" id="Science">
                <img alt="Subject Image"
                    src="https://th.bing.com/th/id/OIP.mf403lsRko_2v1OouY7ghAHaHa?w=203&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" />
                <p id="p4">
                    Science Set 4
                </p>
            </a>
            <button class="card" id="set5">
                <img alt="Subject Image"
                    src="https://th.bing.com/th/id/OIP.mf403lsRko_2v1OouY7ghAHaHa?w=203&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" />
                <p id="p5">
                    Set 5
                </p>
            </button>
            <button class="card" id="set6">
                <img alt="Subject Image"
                    src="https://th.bing.com/th/id/OIP.mf403lsRko_2v1OouY7ghAHaHa?w=203&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" />
                <p id="p6">
                    Set 6
                </p>
            </button>
        </div>
    </div>

    <script>
        const librarySubject = <?php echo json_encode($selectedSubject); ?>;

        const h2subject = document.getElementById("h2subject");
        // const maths = document.getElementById("maths");
        // const Chemistry = document.getElementById("Chemistry");
        // const Science = document.getElementById("Science");
        // // const selectedSubject = librarySubject;
        const p1 = document.getElementById("p1");
        const p2 = document.getElementById("p2");
        const p3 = document.getElementById("p3");
        const p4 = document.getElementById("p4");
        const p5 = document.getElementById("p5");
        const p6 = document.getElementById("p6");
        h2subject.textContent = librarySubject;

        p1.textContent = librarySubject + " Set 1";
        p2.textContent = librarySubject + " Set 2";
        p3.textContent = librarySubject + " Set 3";
        p4.textContent = librarySubject + " Set 4";
        p5.textContent = librarySubject + " Set 5";
        p6.textContent = librarySubject + " Set 6";

        maths.addEventListener('click', (event) => {
            // selectedSubject = Maths;
            fetch(`mainpage.php?selectedSubject=${librarySubject}`)
                .then(response => response.text())
                .then(data => {
                    window.location.href = `mainpage.php?selectedSubject=${librarySubject}`;
                })
                .catch(error => {
                    console.error("error fetching qeustion: ", error);
                });
        });

        Chemistry.addEventListener('click', (event) => {
            // selectedSubject = Maths;
            fetch(`mainpage.php?selectedSubject=${librarySubject}`)
                .then(response => response.text())
                .then(data => {
                    window.location.href = `mainpage.php?selectedSubject=${librarySubject}`;
                })
                .catch(error => {
                    console.error("error fetching qeustion: ", error);
                });
        });

        Science.addEventListener('click', (event) => {
            // selectedSubject = Maths;
            fetch(`mainpage.php?selectedSubject=${librarySubject}`)
                .then(response => response.text())
                .then(data => {
                    window.location.href = `mainpage.php?selectedSubject=${librarySubject}`;
                })
                .catch(error => {
                    console.error("error fetching qeustion: ", error);
                });
        });

        set2.addEventListener('click', (event) => {
            // selectedSubject = Maths;
            fetch(`mainpage.php?selectedSubject=${librarySubject}`)
                .then(response => response.text())
                .then(data => {
                    window.location.href = `mainpage.php?selectedSubject=${librarySubject}`;
                })
                .catch(error => {
                    console.error("error fetching qeustion: ", error);
                });
        });

        set5.addEventListener('click', (event) => {
            // selectedSubject = Maths;
            fetch(`mainpage.php?selectedSubject=${librarySubject}`)
                .then(response => response.text())
                .then(data => {
                    window.location.href = `mainpage.php?selectedSubject=${librarySubject}`;
                })
                .catch(error => {
                    console.error("error fetching qeustion: ", error);
                });
        });

        set6.addEventListener('click', (event) => {
            // selectedSubject = Maths;
            fetch(`mainpage.php?selectedSubject=${librarySubject}`)
                .then(response => response.text())
                .then(data => {
                    window.location.href = `mainpage.php?selectedSubject=${librarySubject}`;
                })
                .catch(error => {
                    console.error("error fetching qeustion: ", error);
                });
        });
    </script>

</body>

</html>