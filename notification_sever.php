<?php
session_start();

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

if (isset($_SESSION['approved_application_id'])) {
    echo "data: approved\n\n";
    unset($_SESSION['approved_application_id']);
    flush();
} else {
    echo "data: pending\n\n";
    flush();
}
?>
