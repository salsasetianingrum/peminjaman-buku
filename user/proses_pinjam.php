<?php
session_start();
include '../config/koneksi.php';

// cek session
if (!isset($_SESSION['id'])) {
    echo "User belum login";
    exit;
}

// cek data post
if (!isset($_POST['id_buku'])) {
    echo "Buku tidak dipilih";
    exit;
}

$id_user = $_SESSION['id'];
$id_buku = $_POST['id_buku'];
$tgl = date('Y-m-d');

// cek stok dulu
$cek = mysqli_query($conn, "SELECT stok FROM buku WHERE id='$id_buku'");
$data = mysqli_fetch_assoc($cek);

if ($data['stok'] > 0) {

    // simpan transaksi
    mysqli_query($conn, "INSERT INTO transaksi 
    (id_user, id_buku, tanggal_pinjam, status)
    VALUES ('$id_user', '$id_buku', '$tgl', 'pinjam')");

    // kurangi stok
    mysqli_query($conn, "UPDATE buku SET stok = stok - 1 WHERE id='$id_buku'");

    echo "✅ Berhasil pinjam";
    echo "<meta http-equiv='refresh' content='1;url=pinjam.php'>";

} else {
    echo "Stok habis";
}
?>