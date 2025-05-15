<?php
session_start();
include("php/config.php"); // Include your database connection

// Ensure user is logged in
if (!isset($_SESSION['Email'])) {
    header("Location: login1.php"); // Redirect to login if not logged in
    exit();
}

// Get pet details from URL parameters
$media = $_GET['media'];
$breed = $_GET['breed'];
$price = $_GET['price'];
$pet_type = $_GET['pet_type']; // Get pet_type from URL
$email = $_SESSION['Email']; // Use Email from session

// Insert into the wishlist table
$query = "INSERT INTO wishlist (Email, media, breed, price, pet_type) VALUES ('$email', '$media', '$breed', '$price', '$pet_type')
          ON DUPLICATE KEY UPDATE price = '$price'"; // Update price if already exists

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Added to favorites successfully!');</script>";
    // Redirect to the appropriate pet type page based on the pet_type
    header("Location: petsy{$pet_type}.php"); // Redirect to the correct pet type page
} else {
    echo "<script>alert('Error adding to favorites. Please try again.');</script>";
    header("Location: petsy{$pet_type}.php"); // Redirect to the correct pet type page
}
exit();
?>
