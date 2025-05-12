<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #f0f2f5;
      font-family: Arial, sans-serif;
    }

    .registration-container {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    .registration-container h2 {
      margin-bottom: 20px;
      text-align: center;
    }

    .input-group {
      position: relative;
      margin-bottom: 15px;
    }

    .input-group input {
      width: 100%;
      padding: 10px 10px 10px 40px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
      box-sizing: border-box;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      color: #888;
    }

    .input-group input:focus {
      border-color: #61dafb;
    }

    .registration-container button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #7AB730;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .registration-container button:hover {
      background-color: wheat;
    }

    .message {
      background: #f8d7da;
      color: #721c24;
      padding: 10px;
      border: 1px solid #f5c6cb;
      border-radius: 5px;
      margin-bottom: 15px;
      text-align: center;
    }

    .btn {
      background-color: #61dafb;
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      border-radius: 5px;
      display: inline-block;
      transition: background-color 0.3s ease-in-out;
    }

    .btn:hover {
      background-color: #21a1f1;
    }
  </style>
</head>
<body>
  <div class="registration-container">
    <h2>Register</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Database connection
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tutorial"; // Replace with your database name

        $con = new mysqli($host, $username, $password, $dbname);

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // Function to sanitize and validate input data
        function sanitize_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Validate and sanitize inputs
        $Name = sanitize_input($_POST['Name']);
        $Email = sanitize_input($_POST['Email']);
        $Phone_no = sanitize_input($_POST['Phone_no']);
        $Password = sanitize_input($_POST['Password']);

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

        // Hash the password
        $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

        // Verify if the email is already used
        $verify_query = $con->query("SELECT Email FROM admin WHERE Email='$Email'");

        if ($verify_query->num_rows != 0) {
            echo "<div class='message'>
                      <p>This email is already used. Please try another one.</p>
                  </div><br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
        } else {
            // Insert new record into the database
            $insert_query = "INSERT INTO admin (Name, Email, Phone_no, Password) 
                             VALUES ('$Name', '$Email', '$Phone_no', '$hashed_password')";
            if ($con->query($insert_query) === TRUE) {
                echo "<div class='message'>
                          <p>Registration successful!</p>
                      </div><br>";
                echo "<a href='admlog.php'><button class='btn'>Login Now</button></a>";
            } else {
                echo "Error: " . $insert_query . "<br>" . $con->error;
            }
        }

        $con->close();
    } else {
    ?>
    <form method="POST" action="">
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="Name" placeholder="Name" required>
      </div>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="Email" placeholder="Email" required>
      </div>
      <div class="input-group">
        <i class="fas fa-phone"></i>
        <input type="tel" name="Phone_no" placeholder="Phone Number" required>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="Password" placeholder="Password" required>
      </div>
      <button type="submit" name="submit">Register</button>
    </form>
    <?php
    }
    ?>
    
  </div>
</body>
</html>