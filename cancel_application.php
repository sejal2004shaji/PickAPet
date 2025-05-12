<?php
include("php/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email from the form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Update the user's status to 2 (cancelled)
    $query = "UPDATE users SET status = 2 WHERE Email = '$email'";
    
    if (mysqli_query($conn, $query)) {
        // If the query was successful, display a success message
        echo "<script>
                alert('Application cancelled successfully!');
                window.location.href = 'admin.php';
              </script>";
        exit();
    } else {
        // If there was an error, display an error message
        echo "<script>
                alert('Error cancelling application: " . mysqli_error($conn) . "');
                window.location.href = 'admin.php';
              </script>";
        exit();
    }
}
?>
