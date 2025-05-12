<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;700&family=Roboto:wght@400;900&display=swap" rel="stylesheet">
    <title>Pick a Pet</title>
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #C8E6C9; /* Light mint green background */
            color: #1B5E20; /* Dark green text */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .container {
            background: #FFFFFF; /* White background */
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            max-width: 600px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
            padding: 20px; /* Increased padding for more space */
            text-align: center;
            position: relative; /* For absolute positioning of buttons */
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .image-container img {
            width: 100%;
            height: auto;
            max-width: 500px;
            border-radius: 15px;
        }

        .right-panel h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #2E7D32; /* Slightly darker green for contrast */
            font-family: 'Roboto', sans-serif;
            font-weight: 900;
            animation: slideInUp 1s ease-out;
        }

        .right-panel p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #388E3C;
            font-family: 'Raleway', sans-serif;
            font-weight: 300;
            animation: slideInUp 1.2s ease-out;
        }

        .buttons a {
            display: inline-block;
            margin: 10px;
            padding: 12px 30px;
            font-size: 18px;
            color: #fff;
            background: #43A047; /* Vivid green button */
            text-decoration: none;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(67, 160, 71, 0.4);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            animation: fadeInUp 1.5s ease-out;
        }

        .buttons a:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(67, 160, 71, 0.6);
        }

        .button-container {
            position: absolute;
            bottom: 15px;
            left: 15px;
        }

        .button-container-right {
            position: absolute;
            bottom: 15px;
            right: 15px;
        }

        button {
            background: #66BB6A; /* Green for Admin and Staff buttons */
            padding: 12px 25px;
            font-size: 18px;
            color: #fff;
            border: none;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(102, 187, 106, 0.4);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, background 0.3s ease-in-out;
            animation: fadeInRight 1s ease-out;
        }

        button:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(102, 187, 106, 0.6);
            background: #4CAF50; /* Darker green on hover */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideInUp {
            from {
                transform: translateY(100px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="button-container">
        <button id="adminButton">Admin</button>
    </div>
    <div class="button-container-right">
        <button id="staffButton">Staff</button>
    </div>
    <div class="container">
        <div class="image-container">
            <img src="fishimg/at.jpeg" alt="Pet Image">
        </div>
        <div class="right-panel">
            <h1>Welcome to Pick a Pet</h1>
            <p>"Perhaps the greatest gift an animal has to offer is a permanent reminder of who we really are"</p>
            <div class="buttons">
                <a href="login1.php">Login</a>
                <a href="register.php">Register</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('adminButton').addEventListener('click', function() {
            window.location.href = 'admlog.php';
        });
        document.getElementById('staffButton').addEventListener('click', function() {
            window.location.href = 'login.php';
        });
    </script>
</body>
</html>
