<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}

$data = mysqli_query($conn, "
    SELECT transaksi.*, users.nama as user, buku.judul 
    FROM transaksi
    JOIN users ON transaksi.id_user = users.id
    JOIN buku ON transaksi.id_buku = buku.id
");
?>

<h2>Data Transaksi</h2>
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<a href="tambah_transaksi.php">+ Tambah Transaksi</a>
<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>User</th>
    <th>Buku</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Status</th>
</tr>

<?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['user'] ?></td>
    <td><?= $row['judul'] ?></td>
    <td><?= $row['tanggal_pinjam'] ?></td>
    <td><?= $row['tanggal_kembali'] ?></td>
    <td>
        <?= $row['status'] ?>

        <?php if ($row['status'] == 'pinjam') { ?>
            | <a href="kembali.php?id=<?= $row['id'] ?>">Kembalikan</a>
        <?php } ?>
    </td>
</tr>

<?php } ?>
</table>

<br>
<a href="dashboard.php">Kembali</a>