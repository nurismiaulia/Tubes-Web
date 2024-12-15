<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: indexx.php');
    exit();
}

// Data statistik untuk Pasien dan Layanan (contoh dari database atau data statis)
$patients_count = 200; // Bisa diganti dengan query untuk menghitung pasien
$services_count = 50; // Bisa diganti dengan query untuk menghitung layanan
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Klinik Kecantikan</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="sidebar">
        <h2>Klinik Kecantikan</h2>
        <ul>
            <li><a href="dashboardcb.php">Dashboard</a></li>
            <li><a href="patients.php">Pasien</a></li>
            <li><a href="services.php">Layanan</a></li>
            <li><a href="schedule.php">Jadwal</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Selamat datang di Dashboard Klinik Kecantikan!</h1>

        <!-- Menambahkan gambar di bagian konten -->
        <div class="image-section">
            <img src="backround.jpg" alt="Klinik Kecantikan" class="dashboard-image">
        </div>

        <div class="stats">
            <div class="card">
                <h3>Jumlah Pasien</h3>
                <p><?php echo $patients_count; ?></p>
            </div>
            <div class="card">
                <h3>Jumlah Layanan</h3>
                <p><?php echo $services_count; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
