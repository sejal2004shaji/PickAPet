<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }
        .container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            position: relative;
        }
        .icon {
            font-size: 2em;
            cursor: pointer;
            padding: 10px;
        }
        .icon-portion {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: left;
            width: 250px;
            position: absolute;
            top: 10px;
            left: 50px;
            display: none;
            z-index: 1000;
        }
        .icon-portion.active {
            display: block;
        }
        .user-greeting {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .menu {
            list-style: none;
            padding: 0;
        }
        .menu li {
            margin: 10px 0;
        }
        .menu a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            position: relative;
            display: flex;
            align-items: center;
            transition: color 0.3s;
        }
        .menu a i {
            margin-right: 10px;
        }
        .menu a::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #007bff;
            visibility: hidden;
            transform: scaleX(0);
            transition: all 0.3s ease-in-out;
        }
        .menu a:hover {
            color: #0056b3;
        }
        .menu a:hover::after {
            visibility: visible;
            transform: scaleX(1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon" onclick="toggleMenu()">&#9776; <!-- Hamburger icon --></div>
        <div class="icon-portion" id="profileMenu">
            <?php
                $user = "User"; // Replace this with your dynamic user data
                echo "<div class='user-greeting'>Hi, $user</div>";
            ?>
            <ul class="menu">
                <li><a href="edit_profile.php"><i class="fa fa-user"></i> Edit your profile</a></li>
                <li><a href="manage_password.php"><i class="fa fa-lock"></i> Manage password</a></li>
                <li><a href="settings.php"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById('profileMenu');
            menu.classList.toggle('active');
        }
    </script>
</body>
</html>
