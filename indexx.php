<?php
// Redirect to dashboard if already logged in
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header('Location: dashboardcb.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Klinik Kecantikan</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="login-container">
        <h2>Login ke Dashboard Klinik Kecantikan</h2>
        <form action="login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>
