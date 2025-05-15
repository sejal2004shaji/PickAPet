<?php
// Start session
session_start();

// Database connection parameters
$servername = "localhost";  // Replace with your server name or IP address
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "tutorial"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input directly
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Query to fetch user record based on email and password
    $sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $row = $result->fetch_assoc();
        // Set session variables
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['Username'] = $row['Username'];

        // Redirect to the image upload page
        header('Location: home.php');
        exit; // Ensure script stops here to prevent further execution
    } else {
        // Login failed
        echo "<script>alert('Incorrect email or password. Please try again.');</script>";
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .login-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      width: 300px;
      transition: box-shadow 0.3s ease;
    }
    
    .login-container:hover {
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }
    
    .login-container h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
    
    .form-group {
      margin-bottom: 15px;
    }
    
    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #666;
    }
    
    .form-group input[type="email"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
      transition: border-color 0.3s ease;
    }
    
    .form-group input[type="email"]:focus,
    .form-group input[type="password"]:focus {
      border-color: #4CAF50;
      outline: none;
    }
    
    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
      transition: background-color 0.3s ease;
    }
    
    button[type="submit"]:hover {
      background-color: #45a049;
    }
    
    .bottom-text {
      text-align: center;
      margin-top: 15px;
    }
    
    .bottom-text p {
      margin: 0;
    }
    
    .bottom-text a {
      color: #007bff;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    
    .bottom-text a:hover {
      color: #0056b3;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" id="Email" name="Email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" id="Password" name="Password" placeholder="Enter your password" required>
      </div>
      <button type="submit">Login</button>
    </form>
    <div class="bottom-text">
      <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
  </div>
</body>
</html>
