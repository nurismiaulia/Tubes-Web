<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO services (name, description, price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssd", $name, $description, $price);

    if ($stmt->execute()) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Gagal menambahkan layanan.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Layanan</title>
</head>
<body>
    <h1>Tambah Layanan</h1>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="name" required>
        <label>Deskripsi:</label>
        <textarea name="description" required></textarea>
        <label>Harga:</label>
        <input type="number" name="price" step="0.01" required>
        <button type="submit">Tambah</button>
    </form>
    <a href="dashboard.php">Kembali</a>
</body>
</html>
