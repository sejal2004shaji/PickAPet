<?php
include("php/config.php");

// Check if there are any approved applications
$query = "SELECT COUNT(*) AS approved_count FROM applications WHERE approved = 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$approved_count = $row['approved_count'];

mysqli_close($con);

if ($approved_count > 0) {
    echo json_encode(['status' => 'approved']);
} else {
    echo json_encode(['status' => 'pending']);
}
?>
