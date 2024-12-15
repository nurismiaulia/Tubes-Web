<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit();
}

// Data pasien untuk ditampilkan (dalam aplikasi nyata, data ini berasal dari database)
$patients = [
    ['id' => 1, 'name' => 'Anna', 'dob' => '1995-06-15', 'phone' => '081234567890'],
    ['id' => 2, 'name' => 'Bella', 'dob' => '1993-02-20', 'phone' => '082345678901'],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menambah pasien baru (pada aplikasi nyata, data ini disimpan di database)
    $new_patient = [
        'id' => count($patients) + 1,
        'name' => $_POST['name'],
        'dob' => $_POST['dob'],
        'phone' => $_POST['phone'],
    ];
    array_push($patients, $new_patient);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien - Klinik Kecantikan</title>
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
        <h1>Data Pasien</h1>
        
        <form action="patients.php" method="POST">
            <h3>Tambah Pasien</h3>
            <input type="text" name="name" placeholder="Nama Pasien" required>
            <input type="date" name="dob" required>
            <input type="text" name="phone" placeholder="Nomor Telepon" required>
            <button type="submit" class="btn">Tambah Pasien</button>
        </form>

        <h3>Daftar Pasien</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Nomor Telepon</th>
            </tr>
            <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?php echo $patient['id']; ?></td>
                    <td><?php echo $patient['name']; ?></td>
                    <td><?php echo $patient['dob']; ?></td>
                    <td><?php echo $patient['phone']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
