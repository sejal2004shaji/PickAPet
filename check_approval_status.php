<?php
include("php/config.php");

session_start();
$email = $_SESSION['email']; // Assuming you store the user's email in the session

$query = "SELECT approved FROM applications WHERE email = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

echo json_encode(['approved' => $row['approved'] == 1]);

mysqli_stmt_close($stmt);
mysqli_close($con);
?>
