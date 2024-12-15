<?php
session_start();

// Example credentials for admin
$valid_username = "admin";
$valid_password = "admin123";

// Handle login
if ($_POST['username'] == $valid_username && $_POST['password'] == $valid_password) {
    $_SESSION['logged_in'] = true;
    header('Location: dashboardcb.php');
} else {
    header('Location: indexx.php?error=1');
}
?>
