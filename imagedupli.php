<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "tutorial");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all pending requests
$sql = "SELECT * FROM pet_upload_requests WHERE status = 'Pending'";
$result = mysqli_query($conn, $sql);

// Process approval or decline
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $action = $_POST['action'];
    $status = ($action == 'approve') ? 'Approved' : 'Declined';

    $update_sql = "UPDATE pet_upload_requests SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($stmt, "si", $status, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Request has been $status.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);

    // Refresh the page to show updated requests
    header("Location: admintrial.php");
    exit;
}

?>

