<?php
include("php/config.php");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$Email = $_SESSION['Email'];

// Fetch the user's address
$query = "SELECT * FROM user_address WHERE Email = '$Email'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Error fetching user address: ' . mysqli_error($conn));
}
$userAddress = mysqli_fetch_assoc($result);

// Fetch the user's account details
$accountQuery = "SELECT * FROM user_account_details WHERE Email = '$Email'";
$accountResult = mysqli_query($conn, $accountQuery);
if (!$accountResult) {
    die('Error fetching account details: ' . mysqli_error($conn));
}
$accountDetails = mysqli_fetch_assoc($accountResult);

// Fetch staff members with Status = 1
$staffQuery = "SELECT Email FROM users WHERE Status = 1";
$staffResult = mysqli_query($conn, $staffQuery);
if (!$staffResult) {
    die('Error fetching staff members: ' . mysqli_error($conn));
}
$staffEmails = [];
while ($row = mysqli_fetch_assoc($staffResult)) {
    $staffEmails[] = $row['Email'];
}

// Fetch pet purchase details from session
$petDetails = isset($_SESSION['pet_details']) ? $_SESSION['pet_details'] : null;


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle payment with reference ID
    if (isset($_POST['reference_id'])) {
        $referenceId = mysqli_real_escape_string($conn, $_POST['reference_id']);

        // Check if the reference ID matches the fixed reference ID
        if ($referenceId === '12345') {
            // Randomly assign a staff member for delivery
            $assignedStaffEmail = $staffEmails[array_rand($staffEmails)];

            // Fetch pet details to insert into the orders table
            $pet_type = $petDetails['pet_type'];
            $breed = $petDetails['breed'];
            $media = $petDetails['media'];
            $price = $petDetails['price'];

            // Insert order details into the orders table
            $insertOrderQuery = "INSERT INTO orders (Email, StaffEmail, pet_type, breed, media, price, OrderStatus, OrderDate)
                                 VALUES ('$Email', '$assignedStaffEmail', '$pet_type', '$breed', '$media', '$price', 'Pending', NOW())";
            if (!mysqli_query($conn, $insertOrderQuery)) {
                die('Error inserting order: ' . mysqli_error($conn));
            }

            // Clear the pet details from session after the order is placed
            unset($_SESSION['pet_details']);

            // Redirect to the payment success page
            header('Location: paymentsuccess.php');
            exit();
        } else {
            echo "<script>alert('Invalid Reference ID. Please enter the correct reference ID.');</script>";
        }
    }

    // Save account details if entered
    if (isset($_POST['account_number'])) {
        $accountNumber = mysqli_real_escape_string($conn, $_POST['account_number']);
        $accountHolderName = mysqli_real_escape_string($conn, $_POST['account_holder_name']);
        $ifscCode = mysqli_real_escape_string($conn, $_POST['ifsc_code']);

        // Insert or update the account details into the user_account_details table
        if ($accountDetails) {
            // Update existing account details
            $updateQuery = "UPDATE user_account_details SET AccountNumber='$accountNumber', AccountHolderName='$accountHolderName', IFSCCode='$ifscCode' WHERE Email='$Email'";
            if (!mysqli_query($conn, $updateQuery)) {
                die('Error updating account details: ' . mysqli_error($conn));
            }
        } else {
            // Insert new account details
            $insertQuery = "INSERT INTO user_account_details (Email, AccountNumber, AccountHolderName, IFSCCode) VALUES ('$Email', '$accountNumber', '$accountHolderName', '$ifscCode')";
            if (!mysqli_query($conn, $insertQuery)) {
                die('Error inserting account details: ' . mysqli_error($conn));
            }
        }

        // Refresh account details after submission
        $accountResult = mysqli_query($conn, $accountQuery);
        if (!$accountResult) {
            die('Error fetching updated account details: ' . mysqli_error($conn));
        }
        $accountDetails = mysqli_fetch_assoc($accountResult);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
        }
        .container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease;
        }
        .address-box, .payment-options, .order-details {
            width: 48%;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .address-box p {
            color: #555;
            margin: 5px 0;
        }
        .payment-method {
            margin-top: 20px;
        }
        .btn-payment {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            animation: pulse 1.5s infinite;
        }
        .btn-payment:hover {
            background-color: #218838;
        }
        .account-details, .qr-code, .reference-id-section, .order-details-image {
            margin-top: 20px;
            padding: 15px;
            background: #f1f1f1;
            border-radius: 8px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            display: none;
        }
        .qr-code img {
            width: 100%;
            height: auto;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
    <script>
        function showAccountDetails() {
            document.getElementById('account-details').style.display = 'block';
            document.getElementById('qr-code').style.display = 'none';
            document.querySelector('.reference-id-section').style.display = 'block';
        }

        function showQRCode() {
            document.getElementById('qr-code').style.display = 'block';
            document.getElementById('account-details').style.display = 'none';
            document.querySelector('.reference-id-section').style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="address-box">
            <h2>Your Shipping Address</h2>
            <?php if ($userAddress): ?>
                <p><?php echo htmlspecialchars($userAddress['AddressLine1']); ?></p>
                <p><?php echo htmlspecialchars($userAddress['AddressLine2']); ?></p>
                <p><?php echo htmlspecialchars($userAddress['City']); ?>, <?php echo htmlspecialchars($userAddress['State']); ?></p>
                <p><?php echo htmlspecialchars($userAddress['ZipCode']); ?>, <?php echo htmlspecialchars($userAddress['Country']); ?></p>
                <button class="btn-payment" onclick="window.location.href='location.php'">Add New Address</button>
                <button class="btn-payment" onclick="window.location.href='deliverydetails.php'">Delivery Details</button>
            <?php else: ?>
                <p>No address found. Please <a href="location.php">add an address</a>.</p>
            <?php endif; ?>
        </div>
        <div class="payment-options">
            <h2>Payment Options</h2>
            <button class="btn-payment" onclick="showAccountDetails()">Bank Transfer</button>
            <button class="btn-payment" onclick="showQRCode()">QR Code</button>

            <div id="account-details" class="account-details">
                <?php if ($accountDetails): ?>
                    <p><strong>Account Number:</strong> <?php echo htmlspecialchars($accountDetails['AccountNumber']); ?></p>
                    <p><strong>Account Holder:</strong> <?php echo htmlspecialchars($accountDetails['AccountHolderName']); ?></p>
                    <p><strong>IFSC Code:</strong> <?php echo htmlspecialchars($accountDetails['IFSCCode']); ?></p>
                <?php else: ?>
                    <p>No bank account details found. Please enter them below:</p>
                    <form method="POST" action="">
                        <label>Account Number:</label><br>
                        <input type="text" name="account_number" required><br>
                        <label>Account Holder Name:</label><br>
                        <input type="text" name="account_holder_name" required><br>
                        <label>IFSC Code:</label><br>
                        <input type="text" name="ifsc_code" required><br>
                        <input type="submit" class="btn-payment" value="Save Account Details">
                    </form>
                <?php endif; ?>
            </div>

            <div id="qr-code" class="qr-code">
                <p>Scan the QR code below to pay:</p>
                <img src="path/to/qr-code.png" alt="QR Code for payment">
            </div>

            <div class="reference-id-section">
                <form method="POST" action="">
                    <label for="reference_id">Enter Reference ID after Payment:</label>
                    <input type="text" name="reference_id" required><br>
                    <input type="submit" class="btn-payment" value="Pay Now">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
