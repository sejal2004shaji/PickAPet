<?php
// Include your database connection
include("php/config.php");

if (isset($_POST['Email'])) {
    $Email = $_POST['Email'];

    // Delete the user from the database
    $delete_query = "DELETE FROM users WHERE Email='$Email'";

    if (mysqli_query($conn, $delete_query)) {
        echo "<script>alert('User deleted successfully');</script>";
        echo "<script>window.location.href='admin.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>