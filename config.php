<?php
// Database connection details
$host = 'localhost';   // Database host (usually 'localhost')
$db = 'tutorial';      // Your database name
$user = 'root';        // Database username
$pass = '';            // Database password (leave blank if no password)

// Create a connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Connection successful message (optional)
// echo "Connected successfully";
?>
