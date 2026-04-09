<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}

$data = mysqli_query($conn, "SELECT * FROM anggota");
?>

<h2>Data Anggota</h2>
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<a href="tambah_anggota.php">+ Tambah Anggota</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>

<?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['kelas'] ?></td>
    <td>
        <a href="edit_anggota.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="hapus_anggota.php?id=<?= $row['id'] ?>">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>

<br>
<a href="dashboard.php">Kembali</a>