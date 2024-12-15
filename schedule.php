<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit();
}

// Data jadwal untuk ditampilkan (dalam aplikasi nyata, data ini berasal dari database)
$schedules = [
    ['id' => 1, 'service' => 'Facial', 'date' => '2024-12-17', 'time' => '10:00 AM'],
    ['id' => 2, 'service' => 'Manicure', 'date' => '2024-12-18', 'time' => '02:00 PM'],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menambah jadwal baru (pada aplikasi nyata, data ini disimpan di database)
    $new_schedule = [
        'id' => count($schedules) + 1,
        'service' => $_POST['service'],
        'date' => $_POST['date'],
        'time' => $_POST['time'],
    ];
    array_push($schedules, $new_schedule);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal - Klinik Kecantikan</title>
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
        <h1>Jadwal Layanan Klinik</h1>
        
        <form action="schedule.php" method="POST">
            <h3>Tambah Jadwal</h3>
            <input type="text" name="service" placeholder="Nama Layanan" required>
            <input type="date" name="date" required>
            <input type="time" name="time" required>
            <button type="submit" class="btn">Tambah Jadwal</button>
        </form>

        <h3>Daftar Jadwal</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Layanan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
            </tr>
            <?php foreach ($schedules as $schedule): ?>
                <tr>
                    <td><?php echo $schedule['id']; ?></td>
                    <td><?php echo $schedule['service']; ?></td>
                    <td><?php echo $schedule['date']; ?></td>
                    <td><?php echo $schedule['time']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
