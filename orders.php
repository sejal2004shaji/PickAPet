<?php
include("php/config.php");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$Email = $_SESSION['Email'];

// Fetch orders for the logged-in user
$query = "SELECT o.*, u.Username AS StaffName, u.Phone_no AS StaffPhone, u.Address AS StaffAddress, u.State AS StaffState 
          FROM orders o 
          LEFT JOIN users u ON o.StaffEmail = u.Email 
          WHERE o.Email = '$Email'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Error fetching orders: ' . mysqli_error($conn));
}

$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Orders</title>
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
            width: 80%;
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

        .order {
            background: #e7f3fe;
            border-left: 6px solid #2196F3;
            margin: 20px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .order:hover {
            transform: scale(1.02);
        }

        .order p {
            margin: 5px 0;
        }

        .status {
            font-weight: bold;
            color: #ff9800; /* Pending status color */
        }

        .status.completed {
            color: #4caf50; /* Completed status color */
        }

        .staff-info {
            display: none;
            background: #f1f8e9;
            border: 1px solid #c8e6c9;
            padding: 15px;
            margin-top: 10px;
            border-radius: 5px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .staff-info.visible {
            display: block;
        }

        .staff-link {
            color: #2196F3;
            cursor: pointer;
            text-decoration: underline;
        }

        /* Back Button Styles */
        .back-button {
            background-color: #2196F3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 20px;
        }

        .back-button:hover {
            background-color: #1976D2;
        }

        /* Refund and Return Button Styles */
        .action-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 5px;
        }

        .action-button:hover {
            background-color: #d32f2f;
        }
    </style>
    <script>
        function toggleStaffInfo(staffId) {
            var info = document.getElementById('staff-info-' + staffId);
            info.classList.toggle('visible');
        }
    </script>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="window.location.href='home.php'">Back</button>
        <h2>Your Orders</h2>

        <?php if (empty($orders)): ?>
            <p>No orders found.</p>
        <?php else: ?>
            <?php foreach ($orders as $order): ?>
                <div class="order">
                    <h3>Order ID: <?= htmlspecialchars($order['order_id']) ?></h3>
                    <p><strong>Pet Type:</strong> <?= htmlspecialchars($order['pet_type']) ?></p>
                    <p><strong>Breed:</strong> <?= htmlspecialchars($order['breed']) ?></p>
                    <p><strong>Price:</strong> $<?= htmlspecialchars($order['price']) ?></p>
                    <p class="staff-link" onclick="toggleStaffInfo('<?= htmlspecialchars($order['StaffEmail']) ?>')">
                        <strong>Delivery Staff:</strong> <?= htmlspecialchars($order['StaffName']) ?>
                    </p>
                    <div id="staff-info-<?= htmlspecialchars($order['StaffEmail']) ?>" class="staff-info">
                        <p><strong>Phone:</strong> <?= htmlspecialchars($order['StaffPhone']) ?></p>
                        <p><strong>Address:</strong> <?= htmlspecialchars($order['StaffAddress']) ?></p>
                        <p><strong>State:</strong> <?= htmlspecialchars($order['StaffState']) ?></p>
                    </div>
                    <p class="status <?= ($order['OrderStatus'] == 'Pending') ? '' : 'completed' ?>">
                        Status: <?= htmlspecialchars($order['OrderStatus']) ?>
                    </p>
                    <p><strong>Order Date:</strong> <?= htmlspecialchars($order['OrderDate']) ?></p>
                    <button class="action-button" onclick="window.location.href='refund.php?order_id=<?= htmlspecialchars($order['order_id']) ?>'">Refund</button>
                    <button class="action-button" onclick="window.location.href='return.php?order_id=<?= htmlspecialchars($order['order_id']) ?>'">Return</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
