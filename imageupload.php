<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include('php/config.php');
$message = "";
$success = false;

// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['Email'])) {
    $email = $_SESSION['Email'];
} else {
    header("Location: login1.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pet_type']) && isset($_POST['breed']) && isset($_POST['price']) && isset($_FILES['media'])) {
        $pet_type = $_POST['pet_type'];
        $breed = $_POST['breed'];
        $price = $_POST['price'];

        $status = 0; // Default status as 0 (pending approval)
        $added_to_cart = 0; // Default value for added_to_cart

        // Check file upload
        $media = basename($_FILES['media']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $media;

        // Check if the file is uploaded successfully
        if ($_FILES['media']['error'] === UPLOAD_ERR_OK) {
            // Move the uploaded file to the server's directory
            if (move_uploaded_file($_FILES['media']['tmp_name'], $target_file)) {
                // Insert the request into the database using prepared statements
                $sql = "INSERT INTO pet_upload_requests (Email, pet_type, breed, price, status, media, added_to_cart) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);

                if ($stmt === false) {
                    die('mysqli_prepare() failed: ' . htmlspecialchars(mysqli_error($conn)));
                }

                // Bind parameters (correctly)
                mysqli_stmt_bind_param($stmt, "sssissi", $email, $pet_type, $breed, $price, $status, $media, $added_to_cart);

                // Execute statement
                if (mysqli_stmt_execute($stmt)) {
                    $message = "Your request to upload a pet image has been submitted successfully!";
                    $success = true; // Set success to true
                } else {
                    $message = "Error executing statement: " . htmlspecialchars(mysqli_stmt_error($stmt));
                }

                mysqli_stmt_close($stmt);
            } else {
                $message = "Sorry, there was an error moving your uploaded file.";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $message = "All fields are required.";
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Pet Image Upload Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .header {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .profile-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #ccc;
            display: inline-block;
            margin-top: 10px;
        }
        form {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="file"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .message {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }
    </style>
    <script>
        window.onload = function() {
            <?php if ($success): ?>
                alert("<?php echo htmlspecialchars($message); ?>");
            <?php endif; ?>
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="profile-icon"></div>
        <h2><?php echo htmlspecialchars($email); ?></h2>
    </div>
    <form action="imageupload.php" method="post" enctype="multipart/form-data">
        <h2>Admin Approval Form for Image Uploading</h2>
        
        <label for="pet_typ">Animal Type:</label>
        <select id="pet_typ" name="pet_type" required>
            <option value="">Select animal type</option>
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Bird">Bird</option>
            <option value="Fish">Fish</option>
            <option value="Cow">Cow</option>
            <option value="Rabbit">Rabbit</option>
        </select>
        
        <label for="breed">Breed:</label>
        <input type="text" id="breed" name="breed" required>
        
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        
        <label for="media">Upload Image:</label>
        <input type="file" name="media" required>
        
        <button type="submit">Submit Request</button>
        <?php if ($message): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
    </form>
</body>
</html>
