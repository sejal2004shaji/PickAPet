<?php 
session_start(); // Start session to access session variables

// Check if pet_id is passed via GET request
if (isset($_GET['pet_id'])) {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "tutorial");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the buyer's email from the session if logged in
    if (isset($_SESSION['username'])) {
        $username = $conn->real_escape_string($_SESSION['username']);
        
        // Fetch the buyer's email from the users table using the username
        $buyer_sql = "SELECT Email, Address, Phone_no FROM users WHERE Username = '$username'";
        $buyer_result = $conn->query($buyer_sql);
        
        if ($buyer_result && $buyer_result->num_rows > 0) {
            $user_details = $buyer_result->fetch_assoc(); // Fetch user details (email, address, phone)
            $buyer_email = $user_details['Email']; // Fetch buyer's email
        } else {
            die("Buyer details not found.");
        }
    } else {
        die("Username is not set in the session.");
    }

    // Fetch pet details based on the pet_id
    $pet_id = intval($_GET['pet_id']);
    $pet_sql = "SELECT pet_type, breed, price, media, username FROM pet_upload_requests WHERE id = $pet_id";
    $pet_result = $conn->query($pet_sql);

    if ($pet_result && $pet_result->num_rows > 0) {
        $pet_details = $pet_result->fetch_assoc();
        $seller_username = $pet_details['username']; // Fetch the seller's username
    } else {
        die("No pet details found for the given pet_id.");
    }

    // Fetch seller email from the users table
    $seller_sql = "SELECT Email FROM users WHERE Username = '$seller_username'";
    $seller_result = $conn->query($seller_sql);

    if ($seller_result && $seller_result->num_rows > 0) {
        $seller_email = $seller_result->fetch_assoc()['Email'];
    } else {
        die("Seller email not found.");
    }

    $conn->close();
} else {
    die("pet_id is not set in the request.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary - Pick A Pet</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f2f5;
            padding: 10px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 22px;
            font-weight: 600;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .details {
            margin-bottom: 15px;
        }
        .info-group {
            margin-bottom: 15px;
        }
        .info-title {
            font-size: 12px;
            color: #777;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 3px;
        }
        .info-content {
            font-size: 16px;
            color: #444;
            background-color: #fafafa;
            padding: 8px 12px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        img {
            max-width: 200px;
            height: auto;
            border-radius: 8px;
            display: block;
            margin: 15px auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        .button {
            display: inline-block;
            width: calc(100% - 20px); /* Adjust width */
            margin: 10px 0; /* Add margin between buttons */
            padding: 10px;
            font-size: 16px;
            color: white;
            background: #007BFF;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            text-align: center;
            box-shadow: 0 3px 6px rgba(0, 123, 255, 0.2);
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .separator {
            border-bottom: 1px solid #f0f0f0;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Order Summary</div>

        <div class="details">
            <div class="info-group">
                <div class="info-title">Buyer</div>
                <div class="info-content"><?php echo htmlspecialchars($username); ?></div>
            </div>
            <div class="info-group">
                <div class="info-title">Email</div>
                <div class="info-content"><?php echo htmlspecialchars($buyer_email); ?></div>
            </div>
            <div class="info-group">
                <div class="info-title">Address</div>
                <div class="info-content"><?php echo isset($user_details['Address']) ? htmlspecialchars($user_details['Address']) : "Address not available"; ?></div> <!-- Handle missing address -->
            </div>
            <div class="info-group">
                <div class="info-title">Phone</div>
                <div class="info-content"><?php echo isset($user_details['Phone_no']) ? htmlspecialchars($user_details['Phone_no']) : "Phone number not available"; ?></div> <!-- Handle missing phone number -->
            </div>
        </div>

        <div class="separator"></div>

        <?php if (isset($pet_details)) { ?>
        <div class="details">
            <?php
            $pet_image_path = 'img/' . htmlspecialchars($pet_details['media']);
            if (file_exists($pet_image_path)) {
                echo '<img src="' . $pet_image_path . '" alt="Pet Image">';
            } else {
                echo '<p>Image file not found: ' . $pet_image_path . '</p>';
            }
            ?>
            <div class="info-group">
                <div class="info-title">Pet Type</div>
                <div class="info-content"><?php echo htmlspecialchars($pet_details['pet_type']); ?></div>
            </div>
            <div class="info-group">
                <div class="info-title">Breed</div>
                <div class="info-content"><?php echo htmlspecialchars($pet_details['breed']); ?></div>
            </div>
            <div class="info-group">
                <div class="info-title">Price</div>
                <div class="info-content">₹<?php echo htmlspecialchars($pet_details['price']); ?></div>
            </div>
        </div>
        <?php } ?>

        <form action="confirm_order.php" method="POST">
            <input type="hidden" name="pet_id" value="<?php echo $pet_id; ?>">
            <input type="hidden" name="buyer_email" value="<?php echo $buyer_email; ?>"> <!-- The logged-in user's email -->
            <input type="hidden" name="seller_email" value="<?php echo $seller_email; ?>"> <!-- Seller's email -->
            <button type="submit" class="button">Confirm Order</button>
        </form>

        <button class="button" onclick="window.location.href='purpose.php'">Continue to Payment</button>
    </div>
</body>
</html>