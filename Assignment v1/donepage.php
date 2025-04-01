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
            /* display: flex; */
            /* flex-direction: column; */
            /* align-items: center; */
            /* justify-content: center; */
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
            transform: translateX(-70%);
        }

        .container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #2a3935;
            padding: 24px;
            border-radius: 10px;
            text-align: center;
            /* margin: 0 auto; */
            width: 50%;
            max-width: 400px;
            height: 50%;
            display: flex;
            flex-direction: column;
        }

        .container .status {
            font-size: 32px;
            margin: auto 0;
            font-weight: bold;
            color: #d3efe9;
        }

        .container a {
            background-color: #47b298;
            width: 90%;
            color: #171717;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            align-self: center;
            transition: 0.3s ease;
            text-decoration: none;
        }

        a:hover {
            background-color: #171717;
            color: #d3efe9;
            transform: scale(0.98);
            transition: 0.3s ease;
        }

        @media (max-width: 768px) {
            header h2 {
                margin-right: 1rem;
                transform: translateX(0%);
            }
        }

        @media (max-width: 480px) {
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
        <div class="container">
            <div class="status">Done</div>
            <a href="question summary.php">Summary</a>
        </div>
    </main>
</body>

<script>



</script>

</html>