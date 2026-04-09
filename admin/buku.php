<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}

$data = mysqli_query($conn, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div>Perpus</div>
    <div>
        <a href="dashboard.php">Home</a>
        <a href="buku.php">Buku</a>
        <a href="anggota.php">Anggota</a>
        <a href="transaksi.php">Transaksi</a>
        <a href="../auth/logout.php">Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="container">
    <h2>Data Buku</h2>

    <a href="tambah_buku.php" class="btn btn-tambah">+ Tambah Buku</a>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>
                <img src="../assets/img/<?= $row['gambar'] ?>" width="60">
            </td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['penulis'] ?></td>
            <td><?= $row['stok'] ?></td>
            <td>
                <a href="edit_buku.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                <a href="hapus_buku.php?id=<?= $row['id'] ?>" class="btn btn-hapus">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>