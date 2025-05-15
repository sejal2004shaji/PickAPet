<?php
session_start();
include("php/config.php");

if (!isset($_SESSION['Email'])) {
    header("Location: login1.php"); // Redirect to login if not logged in
    exit();
}

// Get pet details from URL parameters
$media = $_GET['media'];
$breed = $_GET['breed'];
$price = $_GET['price'];
$pet_type = $_GET['pet_type'];
$email = $_SESSION['Email']; // Use Email from session

// Handle the purchase process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm'])) {
        // Store pet details in session
        $_SESSION['pet_details'] = [
            'media' => $media,
            'breed' => $breed,
            'price' => $price,
            'pet_type' => $pet_type
        ];

        // Check if the user has already added their shipping address
        $checkAddressQuery = "SELECT * FROM user_address WHERE Email = '$email'";
        $result = mysqli_query($conn, $checkAddressQuery);

        if (mysqli_num_rows($result) > 0) {
            // If the user has a shipping address, redirect to the payment page
            header("Location: payment.php");
        } else {
            // If the user does not have a shipping address, redirect to the location page
            header("Location: location.php");
        }
        exit();
    } elseif (isset($_POST['cancel'])) {
        // Redirect to home page if the user cancels the purchase
        header("Location: home.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        .checkout-container {
            width: 60%;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            animation: fadeIn 1s ease;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 2.5rem;
            animation: slideIn 1s ease;
        }

        .pet-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            animation: zoomIn 1s ease;
        }

        .pet-details img {
            width: 200px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .pet-details img:hover {
            transform: scale(1.05);
        }

        .pet-info {
            flex: 1;
            margin-left: 20px;
        }

        .pet-info p {
            font-size: 1.2rem;
            margin: 5px 0;
            color: #555;
        }

        .confirm-purchase {
            text-align: center;
            margin-top: 30px;
        }

        .confirm-purchase button {
            padding: 15px 25px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 0 10px;
        }

        .confirm-purchase button:hover {
            background-color: #218838;
        }

        .confirm-purchase .cancel-button {
            background-color: #dc3545;
        }

        .confirm-purchase .cancel-button:hover {
            background-color: #c82333;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes zoomIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h1>Checkout</h1>
        <div class="pet-details">
            <img src="uploads/<?= htmlspecialchars($media) ?>" alt="<?= htmlspecialchars($breed) ?>">
            <div class="pet-info">
                <p><strong>Breed:</strong> <?= htmlspecialchars($breed) ?></p>
                <p><strong>Price:</strong> ₹<?= htmlspecialchars($price) ?></p>
                <p><strong>Estimated Delivery:</strong> 5-6 days</p>
                <p><strong>Shipping Charges:</strong> ₹40</p>
            </div>
        </div>
        <div class="confirm-purchase">
            <form method="post">
                <button type="submit" name="confirm">Confirm Purchase</button>
                <button type="submit" name="cancel" class="cancel-button">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>
