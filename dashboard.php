<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include('php/config.php');

// Start session to access user details
session_start();

// Check if the user is logged in
if (!isset($_SESSION['Email'])) {
    header("Location: login.php");
    exit();
}

// Get the logged-in user's email and username
$userEmail = $_SESSION['Email'];
$username = $_SESSION['Username'];

// Handle the "Delivered" button click
if (isset($_POST['deliver'])) {
    $orderId = $_POST['order_id'];
    $updateQuery = "UPDATE orders SET OrderStatus = 'Delivered' WHERE order_id = '$orderId' AND StaffEmail = '$userEmail'";
    $conn->query($updateQuery);
}

// SQL query to retrieve pending order details for the logged-in staff
$orderQuery = "
    SELECT 
        o.order_id AS OrderID,
        o.pet_type,
        o.breed,
        o.price,
        ua.AddressLine1,
        ua.AddressLine2,
        ua.City,
        ua.State,
        ua.ZipCode,
        ua.Country,
        ua.Phone_no
    FROM 
        orders o
    JOIN 
        user_address ua ON o.Email = ua.Email
    WHERE 
        o.StaffEmail = '$userEmail' AND o.OrderStatus = 'Pending'
";

$result = $conn->query($orderQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            padding: 20px;
            max-width: 1200px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
        }

        h3 {
            text-align: center;
            color: #666;
            font-size: 22px;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        td {
            text-align: center;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 15px;
            }

            th, td {
                padding: 10px;
            }

            h2 {
                font-size: 24px;
            }

            h3 {
                font-size: 18px;
            }
        }

        .btn-deliver, .btn-logout {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-deliver:hover {
            background-color: #218838;
        }

        .btn-logout {
            background-color: #dc3545;
            margin: 20px 0;
            display: inline-block;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .btn-container {
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
        <h3>Your Pending Deliveries</h3>

        <div class="btn-container">
            <form action="logout.php" method="POST">
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Pet Type</th>
                    <th>Breed</th>
                    <th>Price</th>
                    <th>Phone No</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip Code</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['OrderID']); ?></td>
                        <td><?php echo htmlspecialchars($row['pet_type']); ?></td>
                        <td><?php echo htmlspecialchars($row['breed']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td><?php echo htmlspecialchars($row['Phone_no']); ?></td>
                        <td><?php echo htmlspecialchars($row['AddressLine1']); ?></td>
                        <td><?php echo htmlspecialchars($row['AddressLine2']); ?></td>
                        <td><?php echo htmlspecialchars($row['City']); ?></td>
                        <td><?php echo htmlspecialchars($row['State']); ?></td>
                        <td><?php echo htmlspecialchars($row['ZipCode']); ?></td>
                        <td><?php echo htmlspecialchars($row['Country']); ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="order_id" value="<?php echo $row['OrderID']; ?>">
                                <input type="submit" name="deliver" class="btn-deliver" value="Delivered">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p style="text-align: center;">No pending deliveries found for your account.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
