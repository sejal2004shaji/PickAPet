<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <h2>Staff Registration</h2>
        </div>
        <div class="form-box">
            <?php 
            // Enable error reporting
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            include("php/config.php");  // Ensure this file exists and connects to the 'tutorial' database

            if(isset($_POST['submit'])) {
                // Check if $conn is defined
                if (!$conn) {
                    die("Database connection failed: " . mysqli_connect_error());
                }

                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                // Input validation
                if (!preg_match('/^\d{10}$/', $phone_no)) {
                    echo "<div class='message'>Phone number must be exactly 10 digits.</div>";
                } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/\d/', $password)) {
                    echo "<div class='message'>Password must be at least 8 characters long and include uppercase, lowercase, and a digit.</div>";
                } else {
                    // Check if email exists
                    $check_email = "SELECT email FROM staff WHERE email='$email'";
                    $res = mysqli_query($conn, $check_email);

                    if (mysqli_num_rows($res) > 0) {
                        echo "<div class='message'>Email already exists!</div>";
                    } else {
                        // Insert data into database
                        $sql = "INSERT INTO staff (name, email, phone_no, password) VALUES ('$name', '$email', '$phone_no', '$password')";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>
                                    alert('Registration successful!');
                                    window.location.href = 'submit_application.php';
                                  </script>";
                        } else {
                            // Print the error if the query fails
                            echo "<div class='message'>Error inserting data: " . mysqli_error($conn) . "</div>";
                        }
                    }
                }
            }
            ?>
            <form action="staffform.php" method="POST">
                <div class="field">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="input" required>
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input" required>
                </div>
                <div class="field">
                    <label for="phone_no">Phone Number</label>
                    <input type="text" name="phone_no" id="phone_no" class="input" required>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input" required>
                </div>
                <button type="submit" class="btn" name="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
