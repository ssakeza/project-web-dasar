<?php
session_start();
include 'koneksi.php';

$id_vaksin = $_GET['id'];

// Jalankan query hapus tanpa batas user_id
$query = "DELETE FROM vaksin WHERE id_vaksin = $id_vaksin";
if (mysqli_query($connect, $query)) {
    echo '<script>alert("Data vaksin berhasil dihapus."); window.location.href="dashboard_admin.php";</script>';
} else {
    echo '<script>alert("Gagal menghapus data vaksin"); window.location.href="dashboard_admin.php";</script>';
}
exit();
