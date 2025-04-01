<?php
session_start();

$isloggedIn = $_SESSION['IsLoggedIn'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Assestify</title>
    <style>
        :root {
            --bg-primary: #d3efe9;
            --bg-secondary: #47b298;
            --text-primary: #171717;
            --text-secondary: #2a3935;
            --accent: #19715c;
        }

        .dark-mode {
            --bg-primary: #171717;
            --bg-secondary: #2a3935;
            --text-primary: #d3efe9;
            --text-secondary: #47b298;
            --accent: #19715c;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            transition: background-color 0.3s, color 0.3s;
        }

        header {
            /* background-color: var(--bg-secondary);
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center; */

            background-color: var(--bg-secondary);
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 4vw;
        }

        .logo {
            /* font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent);
            margin-left: 1rem; */

            font-size: 5vw;
            font-weight: bold;
            color: var(--accent);

        }

        nav a {
            /* margin-right: 1rem;
            text-decoration: none;
            color: var(--text-primary);
            vertical-align: middle */

            margin-right: 1rem;
            text-decoration: none;
            color: var(--text-primary);
            vertical-align: middle
        }

        .btn {
            background-color: var(--accent);
            color: var(--text-primary);
            /* margin: 1rem; */
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            vertical-align: middle;
            font-size: 13.3333px;
        }

        .btn:hover {
            background-color: var(--text-secondary);
            color: #d3efe9;
        }

        .btn-inOut,
        .btn-reg {
            /* background-color: transparent;
            color: var(--accent);
            border: 1px solid var(--accent);
            margin-right: 1rem; */

            background-color: transparent;
            color: var(--accent);
            border: 1px solid var(--accent);
            margin-right: 1rem;
        }

        .btn-inOut:hover,
        .btn-reg:hover {
            background-color: var(--accent);
            color: var(--text-primary);
        }




        main {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .hero {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin: 1rem;
            color: var(--text-secondary);
        }

        .hero p {
            font-size: 1.25rem;
            margin: 2rem;
            color: var(--text-primary);
        }

        .background-imageL {
            display: none;
        }

        .background-imageR {
            display: none;
        }

        footer {
            background-color: var(--bg-secondary);
            padding: 2rem;
        }

        .footer-section {
            margin-bottom: 2rem;
        }

        .footer-section h2 {
            font-size: 1.5rem;
            margin-top: 0rem;
            margin-bottom: 1rem;
            color: var(--text-secondary);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1rem;
        }

        .grid-item {
            background-color: var(--accent);
            padding: 1rem;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.3s;
            color: var(--text-primary);
            text-decoration: none;

        }

        .grid-item:hover {
            background-color: var(--text-secondary);
            color: #d3efe9;
        }

        .subject-icon {
            width: 50px;
            height: 50px;
            margin-bottom: 0.5rem;
            fill: none;
            stroke: var(--text-primary);
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .disabled-link {
            color: gray;
            pointer-events: none;
            /* Prevent clicks */
            cursor: not-allowed;
        }

        header img {
            width: 33px;
            height: 33px;
            vertical-align: middle;
            border-radius: 100px;
        }

        @media (min-width: 314px) {
            header {
                background-color: var(--bg-secondary);
                padding: 1rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 15px;
            }

            .logo {
                font-size: clamp(16px, 5vw, 24px);
                font-weight: bold;
                color: var(--accent);

            }

            nav a {
                margin-right: 0.5rem;
                text-decoration: none;
                color: var(--text-primary);
                vertical-align: middle
            }


            .btn {
                background-color: var(--accent);
                color: var(--text-primary);
                margin-right: 0.5rem;
                padding: 0.5rem 1rem;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s, color 0.3s;
                vertical-align: middle;
                font-size: 13.3333px;
            }

            .btn-inOut {
                /* background-color: transparent;
            color: var(--accent);
            border: 1px solid var(--accent);
            margin-right: 1rem; */

                background-color: transparent;
                color: var(--accent);
                border: 1px solid var(--accent);
                /* margin-right: 1rem; */
            }


        }

        @media (min-width: 320px) and (max-width: 400px) {
            .btn-reg {
                display: none;
            }

            header img {
                display: none;
            }

            nav {
                display: flex;
                justify-content: flex-end;
                margin-right: 0;
                align-items: center;
            }

            .btn-inOut {
                /* background-color: transparent;
                color: var(--accent);
                border: 1px solid var(--accent); */
                margin-right: 0;
            }
        }

        @media (min-width: 621px) {
            .background-imageL {
                display: block;
                width: 300px;
                height: 300px;
                opacity: 0.7;
            }
        }

        @media (min-width: 768px) {
            header {
                background-color: var(--bg-secondary);
                padding: 1rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 15px;
            }

            .logo {
                font-size: 24px;
                font-weight: bold;
                color: var(--accent);
                margin-left: 1rem;
            }

            nav a {
                text-decoration: none;
                color: var(--text-primary);
                vertical-align: middle;
            }
        }

        @media (min-width: 981px) {

            .background-imageL {
                display: block;
                width: 300px;
                height: 300px;
                opacity: 0.7;
            }

            .background-imageR {
                display: block;
                width: 300px;
                height: 300px;
                opacity: 0.7;
            }
        }

        @media (min-width: 671px) and (max-width: 1000px) {
            .grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                grid-template-rows: repeat(2, auto);
                gap: 1rem;
            }

            .grid-item {
                background-color: var(--accent);
                padding: 1rem;
                border-radius: 4px;
                text-align: center;
                transition: background-color 0.3s;
                color: var(--text-primary);
                text-decoration: none;

            }

            .grid-item:hover {
                background-color: var(--text-secondary);
                color: #d3efe9;
            }
        }
    </style>
</head>

<body>
    <!--<button class="btn mode-toggle" id="modeToggle">Toggle Dark/Light Mode</button>-->
    <header>
        <div class="logo">Assestify</div>
        <nav>
            <a href="lecturedash.php" >Teacher</a>
            <a class="btn btn-inOut" id="sign-Out" href="Login.php">Sign In</a>
            <a class="btn btn-reg" id="profile-Pic" href="signup.php">Register</a>
        </nav>
    </header>

    <main>
        <img src="Image\student300Center.jpg" alt="Left background" class="background-imageL">
        <div class="hero">
            <h1>Welcome to Assestify</h1>
            <p>Empowering students with interactive assessments and personalized learning experiences.</p>
            <button class="btn" id="modeToggle">Toggle Dark/Light Mode</button>
        </div>
        <img src="Image\Teacher300.jpg" alt="Right background" class="background-imageR">
    </main>

    <footer>
        <div class="footer-section">
            <h2>Subjects</h2>
        </div>

        <div class="footer-section">
            <div class="grid">
                <a class="grid-item" data-subject="Maths">
                    <svg class="subject-icon" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="2" ry="2"></rect>
                        <line x1="7" y1="2" x2="7" y2="22"></line>
                        <line x1="17" y1="2" x2="17" y2="22"></line>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <line x1="12" y1="2" x2="12" y2="22"></line>
                        <line x1="2" y1="7" x2="22" y2="7"></line>
                        <line x1="2" y1="17" x2="22" y2="17"></line>

                    </svg>
                    <p>Math</p>
                </a>
                <div class="grid-item" data-subject="Science">
                    <svg class="subject-icon" viewBox="0 0 24 24">
                        <line x1="13" y1="0" x2="16" y2="5"></line>
                        <line x1="13" y1="0" x2="10" y2="5"></line>
                        <line x1="10" y1="5" x2="10" y2="21"></line>
                        <line x1="16" y1="5" x2="16" y2="21"></line>
                        <line x1="10" y1="6" x2="7" y2="9"></line>
                        <line x1="7" y1="9" x2="7" y2="11"></line>
                        <line x1="7" y1="11" x2="10" y2="11"></line>
                        <line x1="10" y1="17" x2="6" y2="19"></line>
                        <line x1="6" y1="19" x2="6" y2="22"></line>
                        <line x1="6" y1="22" x2="10" y2="21"></line>
                        <line x1="10" y1="21" x2="16" y2="21"></line>
                        <line x1="16" y1="21" x2="20" y2="22"></line>
                        <line x1="20" y1="22" x2="20" y2="19"></line>
                        <line x1="20" y1="19" x2="16" y2="17"></line>
                        // top right wing
                        <line x1="16" y1="6" x2="19" y2="9"></line>
                        <line x1="19" y1="9" x2="19" y2="11"></line>
                        <line x1="19" y1="11" x2="16" y2="11"></line>
                    </svg>
                    <p>Science</p>
                </div>
                <div class="grid-item" data-subject="Literature">
                    <svg class="subject-icon" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg>
                    <p>Literature</p>
                </div>
                <a class="grid-item" data-subject="History">
                    <svg class="subject-icon" viewBox="0 0 24 24">
                        <path d="M3 21h18"></path>
                        <path d="M3 10h18"></path>
                        <path d="M5 6l7-3 7 3"></path>
                        <path d="M4 10v11"></path>
                        <path d="M20 10v11"></path>
                        <path d="M8 14v3"></path>
                        <path d="M12 14v3"></path>
                        <path d="M16 14v3"></path>
                    </svg>
                    <p>History</p>
                </a>
                <a class="grid-item" data-subject="Chemistry">
                    <svg class="subject-icon" viewBox="0 0 24 24">
                        <circle cx="13.5" cy="6.5" r="2.5"></circle>
                        <path d="M17 7l2 2l-1.5 1.5"></path>
                        <circle cx="19" cy="19" r="2"></circle>
                        <path d="M22 19h-3"></path>
                        <path d="M17 14V9"></path>
                        <path d="M6 12a4 4 0 0 1 4-4h3"></path>
                        <circle cx="6" cy="17" r="3"></circle>
                    </svg>
                    <p>Chemistry</p>
                </a>
                <div class="grid-item" data-subject="Geography">
                    <svg class="subject-icon" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="2" ry="2"></rect>
                        <path d="M6 24V15l12-5v24"></path>
                        <circle cx="8" cy="9" r="3"></circle>
                        <circle cx="15" cy="19" r="3"></circle>
                    </svg>
                    <p>Geography</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const modeToggle = document.querySelector('.hero .btn');
        const body = document.body;

        modeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', body.classList.contains('dark-mode'));
        });

        // Check for saved user preference
        if (localStorage.getItem('darkMode') === 'true') {
            body.classList.add('dark-mode');
        }

        document.querySelectorAll('button:not(.hero .btn)').forEach(button => {
            button.addEventListener('click', () => {
                alert('This feature is not implemented in this');
            });
        });

        // const isLoggedIn = $_SESSION['isLoggedIn']; 
        // const isLoggedIn = true;
        const isLoggedIn = <?php echo json_encode($_SESSION['isLoggedIn'] ?? false); ?>;

        const userProfileImage = "https://imagepng.org/wp-content/uploads/2019/08/google-icon-5.png";

        const signOut = document.getElementById("sign-Out"); //also a sign in btn
        const profilePic = document.getElementById("profile-Pic");

        // const userName = $row["user_name"];

        function updateBtn() {
            if (isLoggedIn) {
                signOut.textContent = "Sign Out";
                signOut.href = "logout.php";
                signOut.addEventListener("click", () => {
                    isLoggedIn = false;
                    updateBtn();
                });

                profilePic.innerHTML = '<i alt="Profile" class="fa-regular fa-user fa-xl" style="color: var(--text-primary)">';
                profilePic.innerHTML = '<img alt="Profile Picture" src="https://storage.googleapis.com/a1aa/image/D8VIIQJBKfwQH63KJ0B4kGGkle6M3gdYeYe4jPuPVZOzwnTPB.jpg">';
                // <i class="fa-regular fa-user" style="color: #d3efe9;"></i>
                profilePic.style.backgroundColor = "var(--bg-secondary)";
                profilePic.classList.remove("btn-reg");
                profilePic.classList.add("disabled-link");
                // profilePic.style.cursor("not-allowed");
            } else {
                signOut.textContent = "Sign In";
                signOut.href = "Login.php";
                signOut.removeEventListener("click", () => {});
                profilePic.classList.add("btn");
            }
        }

        signOut.addEventListener("click", (event) => {
            if (isLoggedIn) {
                isLoggedIn = false;
                updateBtn();
            }
        });

        updateBtn();



        // const userName = $row["user_name"];
        function redirectToLibrary(event) {
            event.preventDefault(); // Prevent default navigation
            if (!isLoggedIn) {
                // If not logged in, redirect to the login page
                window.location.href = "login.php?redirect=lecturedash.php";
            } else {
                // If logged in, redirect to the library page
                window.location.href = "lecturedash.php";
            }
        }

        const subjectLinks = document.querySelectorAll('.grid-item');
        let selectedSubject = null;

        subjectLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default navigation

                // Get the subject from the clicked element
                selectedSubject = link.getAttribute('data-subject') || link.textContent.trim();

                if (!isLoggedIn) {
                    // Redirect to the login page
                    alert('You need to log in to access this subject.');
                    window.location.href = 'Login.php';
                } else {
                    // If logged in, send the selected subject to the server
                    fetch(`Student library page.php?selectedSubject=${encodeURIComponent(selectedSubject)}`)
                        .then(response => response.text())
                        .then(data => {
                            console.log("Selected subject sent:", data.selectedSubject);
                            // Navigate to the student library page after successful response
                            // alert('Selected subject sent:', data.selectedSubject);
                            window.location.href = `Student library page.php?selectedSubject=${encodeURIComponent(selectedSubject)}`;
                        })
                        .catch(error => {
                            alert('Error fetching question:', data.selectedSubject);
                            console.error("Error fetching question: ", error);
                        });
                }
            });
        });
    </script>
</body>

</html>