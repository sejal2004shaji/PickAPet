<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $_SESSION['approved_application_id'] = $id;
}
?>
