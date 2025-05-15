<?php
session_start();

// Check if form data is set
if (isset($_POST['pet_id'], $_POST['buyer_email'], $_POST['seller_email'])) {
    $pet_id = intval($_POST['pet_id']);
    $buyer_email = $_POST['buyer_email'];
    $seller_email = $_POST['seller_email'];

    // Get current date and time for the order
    $order_date = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS

    // Database connection
    $conn = new mysqli("localhost", "root", "", "tutorial");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert order into orders table
    $insert_sql = "INSERT INTO orders (buyer_email, seller_email, pet_id, order_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("ssis", $buyer_email, $seller_email, $pet_id, $order_date); // 'ssis' -> string, string, int, string

   

    $stmt->close();
    $conn->close();
} else {
    die("Required form data is missing.");
}
