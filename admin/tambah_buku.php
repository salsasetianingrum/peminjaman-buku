<form method="POST" enctype="multipart/form-data">
    <input type="text" name="judul"><br>
    <input type="text" name="penulis"><br>
    <input type="number" name="stok"><br>
    <input type="file" name="gambar"><br>
    <button name="simpan">Simpan</button>
</form>

<?php
include '../config/koneksi.php';

if(isset($_POST['simpan'])){

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $stok = $_POST['stok'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "../assets/img/".$gambar);

    mysqli_query($conn,"INSERT INTO buku (judul,penulis,stok,gambar)
    VALUES ('$judul','$penulis','$stok','$gambar')");
}
?>