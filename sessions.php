<?php
session_start();
include("php/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // Query to fetch the user's username based on the email
    $sql = "SELECT Username, Password FROM users WHERE Email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($Password, $row['Password'])) {
            // Store the username in session variable
            $_SESSION['Username'] = $row['Username'];

            // Redirect to the dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this email!";
    }
}
?>
