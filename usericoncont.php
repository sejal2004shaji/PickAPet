<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width:600px;
            height:900px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            color: black;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
        }

        .profile-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #fff;
            display: inline-block;
            margin-top: 10px;
        }

        .nav {
            margin-top: 20px;
        }

        .nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav ul li {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
        }

        .nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            flex-grow: 1;
            display: flex;
            align-items: center;
        }

        .nav a:hover {
            background-color: #7AB730;
        }

        .nav ul li i {
            font-size: 24px;
            color: #bbb;
            margin-right: 15px;
        }

        i.icon {
            color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div>
                <h1 id="welcome-message">Haii</h1>
            </div>
        </header>

        <nav class="nav">
            <ul>
                <li>
                    <a href="orders.php">
                        <i class="icon">&#128230;</i> Orders
                    </a>
                </li>
                <li>
                    <a href="wishlist.php">
                        <i class="icon">&#128205;</i> Wishlist
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="icon">⬅</i> LogOut
                    </a>
                </li>
                <li>
                    <a href="settings.php">
                        <i class="icon">&#9881;</i> Account Settings
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <?php
        session_start();

        // Check if the user is logged in
        if (isset($_SESSION['Email']) && isset($_SESSION['Username'])) {
            $email = $_SESSION['Email'];
            $username = $_SESSION['Username'];
        } else {
            // Redirect to login page if not logged in
            header("Location: login1.php");
            exit();
        }
    ?>

    <script>
        // PHP variables for JavaScript
        const username = "<?php echo $username; ?>";
        const email = "<?php echo $email; ?>";

        // Display the username and email dynamically
        document.getElementById('welcome-message').innerText = ` 🎀 Haii ${username} (${email})`;
    </script>
</body>
</html>
