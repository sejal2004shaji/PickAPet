<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .success-box {
            text-align: center;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #28a745;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="success-box">
        <h2>Payment Successful!</h2>
        <p>Your payment has been processed successfully.</p>
        <button class="btn" onclick="window.location.href='home.php'">OK</button>
        <button class="btn" onclick="window.location.href='delivery_details.php'">View Delivery Details</button>
    </div>
</body>
</html>
