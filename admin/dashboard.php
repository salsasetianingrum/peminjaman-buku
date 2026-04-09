<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- <title>Dashboard Admin</title> -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<!-- CONTENT -->
<div class="container">
    <h2>Dashboard Admin</h2>

    <p>Selamat datang di sistem perpustakaan </p>

    <br>

    <div class="card-container">
        <div class="card">
            <h3>Data Buku</h3>
            <p>Kelola semua buku</p>
            <a href="buku.php" class="btn btn-tambah">Masuk</a>
        </div>

        <div class="card">
            <h3>Anggota</h3>
            <p>Kelola data anggota</p>
            <a href="anggota.php" class="btn btn-tambah">Masuk</a>
        </div>

        <div class="card">
            <h3>Transaksi</h3>
            <p>Peminjaman & pengembalian</p>
            <a href="transaksi.php" class="btn btn-tambah">Masuk</a>
        </div>
    </div>
</div>

</body>
</html>