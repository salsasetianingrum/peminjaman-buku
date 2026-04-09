<?php
include '../config/koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM anggota WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<form method="POST">
    <h2>Edit Anggota</h2>
    <input type="text" name="nama" value="<?= $d['nama'] ?>"><br>
    <input type="text" name="kelas" value="<?= $d['kelas'] ?>"><br>
    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE anggota SET 
        nama='$_POST[nama]',
        kelas='$_POST[kelas]'
        WHERE id='$id'");

    header("Location: anggota.php");
}
?>