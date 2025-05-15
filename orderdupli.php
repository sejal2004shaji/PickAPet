<?php
session_start(); // This must be at the top before any output

// Check if pet_id is passed via GET request
if (isset($_GET['pet_id'])) {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "tutorial");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $pet_id = intval($_GET['pet_id']); // Use intval to ensure $pet_id is an integer

    // Fetch pet details based on the pet_id
    $pet_sql = "SELECT pet_type, breed, price, media FROM pet_upload_requests WHERE id = $pet_id";
    $pet_result = $conn->query($pet_sql);

    if ($pet_result && $pet_result->num_rows > 0) {
        $pet_details = $pet_result->fetch_assoc();
    } else {
        die("No pet details found for the given pet_id.");
    }

    // Fetch user details based on the username stored in the session
    if (isset($_SESSION['username'])) {
        $username = $conn->real_escape_string($_SESSION['username']);
        $user_sql = "SELECT Address, State, Phone_no FROM users WHERE Username = '$username'";
        $user_result = $conn->query($user_sql);

        if ($user_result && $user_result->num_rows > 0) {
            $user_details = $user_result->fetch_assoc();
        } else {
            die("User details not found.");
        }
    } else {
        die("Username is not set in the session.");
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
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin-bottom: 20px;
        }
        img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .info {
            font-size: 18px;
        }
        .button {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            color: white;
            background: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Order Summary</div>
        <div class="details">
            <div class="info"><strong>Deliver to:</strong> <?php echo htmlspecialchars($username); ?></div>
            <div class="info"><?php echo htmlspecialchars($user_details['Address']); ?></div>
            <div class="info">Phone: <?php echo htmlspecialchars($user_details['Phone_no']); ?></div>
        </div>
        <?php if (isset($pet_details)) { ?>
        <div class="details">
            <?php
            // Determine the path for the pet image
            $pet_image_path = 'img/' . htmlspecialchars($pet_details['media']);
            
            // Check if file exists
            if (file_exists($pet_image_path)) {
                echo '<img src="' . $pet_image_path . '" alt="Pet Image">';
            } else {
                echo '<p>Image file not found: ' . $pet_image_path . '</p>';
            }
            ?>
            <div class="info"><strong>Pet Type:</strong> <?php echo htmlspecialchars($pet_details['pet_type']); ?></div>
            <div class="info"><strong>Breed:</strong> <?php echo htmlspecialchars($pet_details['breed']); ?></div>
            <div class="info"><strong>Price:</strong> ₹<?php echo htmlspecialchars($pet_details['price']); ?></div>
        </div>
        <?php } ?>
        <button class="button" onclick="window.location.href='purpose.php'">Continue to Payment</button>
    </div>
</body>
</html>
