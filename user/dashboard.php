<?php
session_start();
if ($_SESSION['role'] != 'user') {
    header("Location: ../auth/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
</head>

<body>

<h2>Dashboard User</h2>

<a href="dashboard.php">Home</a> |
<a href="pinjam.php">Pinjam Buku</a> |
<a href="kembali.php">Pengembalian</a> |
<a href="laporan.php">Laporan</a> |
<a href="../auth/logout.php">Logout</a>

<hr>

<p>Selamat datang </p>

</body>
</html>