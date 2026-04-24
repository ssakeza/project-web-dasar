<?php

include 'koneksi.php';

// Cek login
if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}

$query = "SELECT * FROM vaksin";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>

<body>
    <div class="sidebar">
        <h1>vaksin</h1>
        <a href="dashboard_admin.php" class="navbar">Dashboard</a>
        <a href="logout.php" class="navbar">Keluar</a>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="caption">
                <h4>Dashboard Admin</h4>
            </div>
            <div class="profil">
                <h2>Selamat Datang</h2>
            </div>
        </div>


        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama vaksin</th>
                        <th>umur min</th>
                        <th>umur max</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <tr>
                            <td><?= $row['id_vaksin'] ?></td>
                            <td><?= $row['nama_vaksin'] ?></td>
                            <td><?= $row['umur_min']  ?></td>
                            <td><?= $row['umur_max']  ?></td>
                            <td>
                                <a href="edit_vaksin_admin.php?id=<?= $row['id_vaksin'] ?>" class="edit">Edit</a>
                                <a href="hapus_vaksin_admin.php?id=<?= $row['id_vaksin'] ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus mobil ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <a href="tambah_vaksin_admin.php">Tambahkan data vaksin baru</a>
        </div>
    </div>
</body>

</html>
