<?php
include("php/config.php");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['Email'])) {
    header("Location: login.php");
    exit();
}

// Get the order ID from the query parameter
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : '';
$Email = $_SESSION['Email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the refund request
    $refund_reason = mysqli_real_escape_string($conn, $_POST['refund_reason']);

    // Update the order status to 'Refund Requested'
    $update_query = "UPDATE orders SET OrderStatus = 'Refund Requested', RefundReason = '$refund_reason' WHERE OrderID = '$order_id' AND Email = '$Email'";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Refund request submitted successfully.'); window.location.href='orders.php';</script>";
    } else {
        echo "<script>alert('Error submitting refund request: " . mysqli_error($conn) . "');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request Refund</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            color: #333;
        }

        .container {
            width: 40%;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            animation: fadeIn 0.5s ease;
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-button {
            background-color: #2196F3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .submit-button:hover {
            background-color: #1976D2;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Request Refund</h2>
        <form method="POST">
            <label for="refund_reason">Reason for Refund:</label>
            <textarea name="refund_reason" id="refund_reason" required></textarea>
            <button type="submit" class="submit-button">Submit Refund Request</button>
        </form>
    </div>
</body>
</html>
