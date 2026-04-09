<?php
session_start();
include '../config/koneksi.php';

$id_user = $_SESSION['id'];

$data = mysqli_query($conn, "
SELECT transaksi.*, buku.judul 
FROM transaksi 
JOIN buku ON transaksi.id_buku = buku.id
WHERE id_user='$id_user'
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Buku</title>
</head>

<body>

<h2>Pengembalian Buku</h2>

<a href="dashboard.php">Kembali</a>
<hr>

<table border="1">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Tanggal Pinjam</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['judul'] ?></td>
    <td><?= $row['tanggal_pinjam'] ?></td>
    <td><?= $row['status'] ?></td>
    <td>
        <?php if($row['status'] == 'pinjam') { ?>
            <a href="proses_kembali.php?id=<?= $row['id'] ?>">Kembalikan</a>
        <?php } else { ?>
            ✔ Sudah kembali
        <?php } ?>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>