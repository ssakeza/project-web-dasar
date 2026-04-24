<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $umur_min = $_POST['umur_min'];
    $umur_max = $_POST['umur_max'];

    //validasi umur min max
    if ($umur_min > $umur_max) {
    echo '<script>alert("Umur minimal tidak boleh lebih besar dari umur maksimal!"); window.history.back();</script>';
    exit;
}

if ($umur_min < 0 || $umur_max < 0) {
    echo '<script>alert("Umur tidak boleh negatif!"); window.history.back();</script>';
    exit;
}


    $sql = "INSERT INTO vaksin (id_vaksin, nama_vaksin, umur_min, umur_max) VALUES ($id, '$nama', $umur_min, $umur_max)";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        echo '<script>alert("vaksin berhasil ditambahkan"); window.location.href = "dashboard_admin.php";</script>';
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($connect);
    }
}
?>

<h1>Data vaksin</h1>

<form action="" method="POST">
    <label>ID Vaksin</label>
    <input type="number" name="id" required> <br>

    <label>nama Vaksin</label>
    <input type="text" name="nama" required> <br>
    
    <label>umur minimal</label>
    <input type="number" name="umur_min" required> <br>
    
    <label>umur maksimal</label>
    <input type="number" name="umur_max" required> <br>

    <button type="submit">simpan</button> <br>
</form>

