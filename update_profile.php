<?php
include("php/config.php");
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login1.php");
    exit();
}

$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $address = $_POST['Address'];
    $state = $_POST['State'];

    // Update user data using email to identify the user
    $sql = "UPDATE users SET Username=?, Password=?, Address=?, State=? WHERE Email=?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("sssss", $username, $password, $address, $state, $email);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Profile updated successfully!'); window.location.href = 'settings.php';</script>";
        } else {
            echo "<script>alert('Failed to update profile.'); window.location.href = 'settings.php';</script>";
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "<script>alert('Failed to prepare the statement.'); window.location.href = 'settings.php';</script>";
    }
}

$conn->close(); // Close the database connection
?>
