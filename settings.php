<?php
include("php/config.php");
session_start();

// Check if user is logged in
if (!isset($_SESSION['Email'])) {
    header("Location: login1.php");
    exit();
}

$email = $_SESSION['Email'];

// Fetch current user data from the database
$sql = "SELECT * FROM users WHERE Email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Handle form submission for updating user profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Username'];
    $phone_no = $_POST['Phone_no'];
    $password = $_POST['Password'];
    $address = $_POST['Address'];
    $state = $_POST['State'];

    // Hash the password before saving it to the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update user data using email to identify the user
    $sql = "UPDATE users SET Username=?, Phone_no=?, Password=?, Address=?, State=? WHERE Email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $username, $phone_no, $hashed_password, $address, $state, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Failed to update profile.');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.5s ease-out;
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .email-display {
            text-align: center;
            margin-bottom: 20px;
            font-size: 16px;
            color: #555;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="password"],
        input[type="tel"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="tel"]:focus {
            border-color: #0072ff;
            box-shadow: 0 0 8px rgba(0, 114, 255, 0.5);
            outline: none;
        }

        button[type="submit"] {
            padding: 10px;
            background-color: #0072ff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056cc;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="email-display">
            Logged in as: <?php echo htmlspecialchars($email); ?>
        </div>
        <h2>Change Profile</h2>
        <form method="POST" action="">
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['Username'] ?? ''); ?>" placeholder="Username" required>
            <input type="tel" name="phone_no" value="<?php echo htmlspecialchars($user['Phone_no'] ?? ''); ?>" placeholder="Phone Number" required>
            <input type="password" name="password" placeholder="New Password" required>
            <input type="text" name="address" value="<?php echo htmlspecialchars($user['Address'] ?? ''); ?>" placeholder="Address" required>
            <input type="text" name="state" value="<?php echo htmlspecialchars($user['State'] ?? ''); ?>" placeholder="State" required>
            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
