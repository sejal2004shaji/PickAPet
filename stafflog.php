<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-box {
            width: 100%;
        }
        .field {
            margin-bottom: 15px;
        }
        .field label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .message {
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Staff Login</h2>
        </div>
        <div class="form-box">
            <?php 
            // Enable error reporting
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            include("php/config.php");  // Ensure this file exists and connects to the 'tutorial' database

            if(isset($_POST['login'])) {
                if (!$conn) {
                    die("Database connection failed: " . mysqli_connect_error());
                }

                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                // Validate login credentials
                $sql = "SELECT * FROM staff WHERE email='$email' AND password='$password'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // Start session and redirect to dashboard
                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location: dashboard.php"); // Redirect to dashboard
                    exit();
                } else {
                    echo "<div class='message'>Invalid email or password.</div>";
                }
            }
            ?>
            <form action="stafflog.php" method="POST">
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input" required>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input" required>
                </div>
                <button type="submit" class="btn" name="login">Login</button>
            </form>
            <div style="text-align: center; margin-top: 20px;">
                Not a member? <a href="staffform.php">Register</a>
            </div>
        </div>
    </div>
</body>
</html>
