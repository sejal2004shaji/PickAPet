<?php
include("php/config.php"); // Include your database connection here

session_start();
$Email = $_SESSION['Email']; // Assume the user is logged in and email is stored in session
$addressExists = false;

$query = "SELECT * FROM user_address WHERE Email = '$Email'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $addressExists = true;
    header("Location: payment.php"); // Redirect to payment page if address already exists
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AddressLine1 = $_POST['address1'];
    $AddressLine2 = $_POST['address2'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $ZipCode = $_POST['zipcode'];
    $Country = $_POST['country'];
    $Phone_no = $_POST['phone']; // Get phone number from POST data

    $sql = "INSERT INTO user_address (Email, AddressLine1, AddressLine2, City, State, ZipCode, Country, Phone_no) VALUES ('$Email', '$AddressLine1', '$AddressLine2', '$City', '$State', '$ZipCode', '$Country', '$Phone_no')";
    if (mysqli_query($conn, $sql)) {
        header("Location: payment.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Shipping Address</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: #ffffff;
            padding: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            animation: slideDown 1s ease;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin: 15px 0;
        }
        label {
            font-size: 14px;
            color: #555;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn-submit {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            animation: fadeIn 1.5s ease;
        }
        .btn-submit:hover {
            background-color: #218838;
        }

        @keyframes slideDown {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Shipping Address</h2>
        <form method="POST">
            <div class="form-group">
                <label for="address1">Address Line 1</label>
                <input type="text" id="address1" name="address1" required>
            </div>
            <div class="form-group">
                <label for="address2">Address Line 2</label>
                <input type="text" id="address2" name="address2">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="zipcode">Zip Code</label>
                <input type="text" id="zipcode" name="zipcode" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" required> <!-- New Phone Number field -->
            </div>
            <button type="submit" class="btn-submit">Save Address</button>
        </form>
    </div>
</body>
</html>
