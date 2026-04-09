<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$user = mysqli_fetch_assoc($data);

if ($user) {
    $_SESSION['login'] = true;
    $_SESSION['id'] = $user['id']; // 🔥 INI PENTING BANGET
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] == 'admin') {
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../user/dashboard.php");
    }
} else {
    echo "Login gagal!";
}