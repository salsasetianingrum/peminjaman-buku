<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$tgl = date('Y-m-d');

mysqli_query($conn, "UPDATE transaksi SET 
    status='kembali',
    tanggal_kembali='$tgl'
    WHERE id='$id'
");

header("Location: transaksi.php");
?>