<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('images/pet-store-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .input-icon input {
            width: 100%;
            padding: 10px 10px 10px 30px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #218838;
        }

        .links {
            text-align: center;
            margin-top: 20px;
        }

        .links a {
            color: #007bff;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
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
        <div class="box form-box">
        <?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection file
include('php/config.php');
            if(isset($_POST['submit'])) {
                $Username = $_POST['Username'];
                $Address = $_POST['Address'];
                $State = $_POST['State'];
                $Phone_no = $_POST['Phone_no'];
                $Age = $_POST['Age'];
                $Email = $_POST['Email'];
                $Password = $_POST['Password'];

                // Validate Phone Number
                if (!preg_match('/^\d{10}$/', $Phone_no)) {
                    echo "<div class='message'>
                              <p>Phone number must be exactly 10 digits.</p>
                          </div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                    exit(); // Stop further execution
                }

                // Validate Password
                if (strlen($Password) < 8 || !preg_match('/[A-Z]/', $Password) || !preg_match('/[a-z]/', $Password) || !preg_match('/\d/', $Password)) {
                    echo "<div class='message'>
                              <p>Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.</p>
                          </div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                    exit(); // Stop further execution
                }

                // Verify if the email is already used
                $verify_query = mysqli_query($conn, "SELECT Email FROM users WHERE Email='$Email'");

                if(mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                              <p>This email is already used. Please try another one.</p>
                          </div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                } else {
                    // Insert new record into the database
                    $insert_query = "INSERT INTO users (Username, Address, State, Phone_no, Age, Email, Password) 
                                    VALUES ('$Username', '$Address', '$State', '$Phone_no', '$Age', '$Email', '$Password')";
                    if(mysqli_query($conn, $insert_query)) {
                        echo "<div class='message'>
                                  <p>Registration successful!</p>
                              </div><br>";
                        echo "<a href='login1.php'><button class='btn'>Login Now</button></a>";
                    } else {
                        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
                    }
                }
            } else {
            ?>
                <header class="header">Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="Username">Username</label>
                        <div class="input-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" name="Username" id="Username" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label for="Email">Email</label>
                        <div class="input-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="Email" id="Email" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label for="Age">Age</label>
                        <div class="input-icon">
                            <i class="fas fa-calendar"></i>
                            <input type="number" name="Age" id="Age" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label for="Password">Password</label>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="Password" id="Password" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label for="Phone_no">Phone no</label>
                        <div class="input-icon">
                            <i class="fas fa-phone"></i>
                            <input type="text" name="Phone_no" id="Phone_no" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label for="State">State</label>
                        <div class="input-icon">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" name="State" id="State" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label for="Address">Address</label>
                        <div class="input-icon">
                            <i class="fas fa-home"></i>
                            <input type="text" name="Address" id="Address" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Register">
                    </div>
                    <div class="links">
                        Already a member? <a href="login1.php">Sign In</a>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>