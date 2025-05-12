<?php
include("php/config.php");

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email and action from the form submission
    $email = $_POST['email'];
    $action = $_POST['action'];

    // Validate the action
    if ($action === 'approve') {
        // Fetch pet_type for the given email
        $type_query = "SELECT pet_type FROM pet_upload_requests WHERE Email = '$email'";
        $type_result = mysqli_query($conn, $type_query);
        
        if ($type_row = mysqli_fetch_assoc($type_result)) {
            $pet_type = $type_row['pet_type'];

            // Update the status to approved (1)
            $approve_query = "UPDATE pet_upload_requests SET status = 1 WHERE Email = '$email'";

            // Execute the query
            if (mysqli_query($conn, $approve_query)) {
                // Show success alert
                echo "<script>
                        alert('Pet approved successfully!');
                        window.location.href = 'petsy{$pet_type}.php'; // Redirect to the specific pet type page
                      </script>";
            } else {
                // Show error alert
                echo "<script>
                        alert('Error updating record: " . mysqli_error($conn) . "');
                        window.location.href = 'admin.php'; // Redirect to admin page
                      </script>";
            }
        } else {
            // Handle case where pet type is not found
            echo "<script>
                    alert('Pet type not found!');
                    window.location.href = 'admin.php'; // Redirect to admin page
                  </script>";
        }
    } elseif ($action === 'decline') {
        // Update the status to declined (2)
        $decline_query = "UPDATE pet_upload_requests SET status = 2 WHERE Email = '$email'";
        
        // Execute the query
        if (mysqli_query($conn, $decline_query)) {
            // Show decline alert
            echo "<script>
                    alert('Pet declined successfully!');
                    window.location.href = 'admin.php'; // Redirect to admin page
                  </script>";
        } else {
            // Show error alert
            echo "<script>
                    alert('Error updating record: " . mysqli_error($conn) . "');
                    window.location.href = 'admin.php'; // Redirect to admin page
                  </script>";
        }
    }
} else {
    // Redirect back to admin if accessed directly
    header("Location: admin.php");
    exit();
}
