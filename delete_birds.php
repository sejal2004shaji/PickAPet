<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "tutorial");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the file name to delete
    $sql = "SELECT media FROM pet_upload_requests WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($media);
    $stmt->fetch();
    $stmt->close();

    // Delete the record from the database
    $sql = "DELETE FROM pet_upload_requests WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Delete the file from the server
        if (file_exists("uploads/birds/" . $media)) {
            unlink("uploads/birds/" . $media);
        }
        echo "";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect to the previous page (optional)
    header("Location: petsybirds.php");
    exit();
}
?>