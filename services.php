<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: indexx.php');
    exit();
}

// Data layanan untuk ditampilkan (dalam aplikasi nyata, data ini berasal dari database)
$services = [
    ['id' => 1, 'name' => 'Facial', 'price' => 200000],
    ['id' => 2, 'name' => 'Manicure', 'price' => 150000],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menambah layanan baru (pada aplikasi nyata, data ini disimpan di database)
    $new_service = [
        'id' => count($services) + 1,
        'name' => $_POST['name'],
        'price' => $_POST['price'],
    ];
    array_push($services, $new_service);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - Klinik Kecantikan</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="sidebar">
        <h2>Klinik Kecantikan</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="patients.php">Pasien</a></li>
            <li><a href="services.php">Layanan</a></li>
            <li><a href="schedule.php">Jadwal</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Data Layanan</h1>
        
        <form action="services.php" method="POST">
            <h3>Tambah Layanan</h3>
            <input type="text" name="name" placeholder="Nama Layanan" required>
            <input type="number" name="price" placeholder="Harga Layanan" required>
            <button type="submit" class="btn">Tambah Layanan</button>
        </form>

        <h3>
