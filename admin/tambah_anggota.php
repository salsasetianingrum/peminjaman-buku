<form method="POST">
    <h2>Tambah Anggota</h2>
    <input type="text" name="nama" placeholder="Nama" required><br>
    <input type="text" name="kelas" placeholder="Kelas" required><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
include '../config/koneksi.php';

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO anggota (nama, kelas) 
VALUES ('$_POST[nama]', '$_POST[kelas]')");
}
?>