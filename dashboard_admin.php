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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Dashboard Admin</title>
</head>
<body>
  <div class="row">
    <div class="col-3">
    <div class="brand">
        <div class="logo">
        <img src="image/logo.png">
    </div>
    <h1>Vaksin</h1>
</div>
    <a href="dashboard_admin.php" class="navbar">Dashboard</a>
    <a href="dokter.php" class="navbar">Data Dokter</a>
    <a href="logout.php" class="navbar">Keluar</a>
    </div>

    <div class="col-9">
        <div class="header">
                <h4>Dashboard Admin</h4>
                <h2>Selamat Datang</h2>
        </div>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama vaksin</th>
                        <th>Deskripsi</th>
                        <th>Umur Minimal</th>
                        <th>Umur Maximal</th>
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
                            <td><?= $row['deskripsi'] ?></td>
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
        </div>
        <div class="link">
            <a href="tambah_vaksin_admin.php">Tambahkan data vaksin baru</a>
        </div>
    </div>
  </div>
</body>

</html>
