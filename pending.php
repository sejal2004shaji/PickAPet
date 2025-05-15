<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include('php/config.php');

// Initialize email variable
$email = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $email = sanitize($_POST["email"]);
    $resume = $_FILES["resume"];
    $license_image = $_FILES["license_image"];

    // Check if user exists
    $sql_check = "SELECT * FROM users WHERE Email='$email'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Directory paths for uploads
        $resumeDir = "resumes/";
        $licenseDir = "dimages/";

        // File paths
        $resumePath = $resumeDir . basename($resume["name"]);
        $licensePath = $licenseDir . basename($license_image["name"]);

        // Move uploaded files to their respective directories
        if (move_uploaded_file($resume["tmp_name"], $resumePath) && move_uploaded_file($license_image["tmp_name"], $licensePath)) {
            // Update the user's resume and license paths, set status to 'pending'
            $sql_update = "UPDATE users 
                           SET ResumePath='$resumePath', LicensePath='$licensePath', Status=0 
                           WHERE Email='$email'";

            if (mysqli_query($conn, $sql_update)) {
                echo "<p>Your application has been submitted and is pending approval.</p>";
            } else {
                echo "<p>Database update failed: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>Failed to upload files. Please try again.</p>";
        }
    } else {
        echo "<p>No user found with the provided email.</p>";
    }
}

// Function to sanitize input
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}
?>

<!-- HTML for displaying status -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        p {
            text-align: center;
            font-size: 18px;
        }

        .btn-back {
            display: block;
            margin: 20px auto;
            width: 200px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Application Status</h2>

        <?php
        // Fetch user status from the database if the email is set
        if ($email) {
            $sql_status = "SELECT Status FROM users WHERE Email='$email'";
            $result_status = mysqli_query($conn, $sql_status);
            $row = mysqli_fetch_assoc($result_status);
            $status = $row['Status'];

            if ($status == 0) {
                echo "<p>Your application is pending approval.</p>";
            } elseif ($status == 1) {
                echo "<p>Your application has been approved!</p>";
                // Note: Removed the Go to Dashboard button
            } elseif ($status == 2) {
                echo "<p>Your application has been rejected. Please contact support.</p>";
            } else {
                echo "<p>Unknown status.</p>";
            }
        } else {
            echo "<p>Please submit your application to see the status.</p>";
        }
        ?>

        <!-- Back button to redirect to login.php -->
        <a href="login.php" class="btn btn-primary btn-back">Back to Login</a>
    </div>
</body>
</html>
