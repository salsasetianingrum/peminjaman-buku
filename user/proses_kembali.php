<?php
include '../config/koneksi.php';

$id = $_GET['id'];

// ubah status
mysqli_query($conn, "UPDATE transaksi 
SET status='kembali', tanggal_kembali=NOW()
WHERE id='$id'");

// ambil id buku
$data = mysqli_query($conn, "SELECT id_buku FROM transaksi WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

// tambah stok
mysqli_query($conn, "UPDATE buku SET stok = stok + 1 WHERE id='".$d['id_buku']."'");

header("Location: kembali.php");
?>