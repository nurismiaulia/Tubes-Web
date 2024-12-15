<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../public/login.php');
    exit;
}
include '../config/database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM services WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$service = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $update_sql = "UPDATE services SET name = ?, description = ?, price = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssdi", $name, $description, $price, $id);

    if ($update_stmt->execute()) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Gagal mengupdate layanan.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Layanan</title>
</head>
<body>
    <h1>Edit Layanan</h1>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($service['name']) ?>" required>
        <label>Deskripsi:</label>
        <textarea name="description" required><?= htmlspecialchars($service['description']) ?></textarea>
        <label>Harga:</label>
        <input type="number" name="price" value="<?= $service['price'] ?>" step="0.01" required>
        <button type="submit">Update</button>
    </form>
    <a href="dashboard.php">Kembali</a>
</body>
</html>
