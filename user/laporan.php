<?php
session_start();
include '../config/koneksi.php';

$id_user = $_SESSION['id'];

// total pinjam
$total = mysqli_query($conn, "
SELECT COUNT(*) FROM transaksi 
WHERE id_user='$id_user' AND status='pinjam'
");
$t = mysqli_fetch_assoc($total);

// data transaksi
$data = mysqli_query($conn, "
SELECT transaksi.*, buku.judul 
FROM transaksi
JOIN buku ON transaksi.id_buku = buku.id
WHERE transaksi.id_user='$id_user'
ORDER BY transaksi.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan User</title>
</head>

<body>

<h2>Laporan Saya</h2>

<a href="dashboard.php">Kembali</a>

<hr>

<h3>Total Buku Dipinjam: <?= $t['total_pinjam'] ?></h3>

<table border="1">
<tr>
    <th>No</th>
    <th>Judul Buku</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
</tr>

<?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['judul'] ?></td>
    <td><?= $row['tanggal_pinjam'] ?></td>
    <td><?= $row['tanggal_kembali'] ?></td>
    <td><?= $row['status'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>