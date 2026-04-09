<?php
session_start();
include '../config/koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<h2>Daftar Buku</h2>

<a href="dashboard.php">Kembali</a>

<div class="container">

<?php while($b = mysqli_fetch_assoc($data)) { ?>
    <div class="card">
       <img src="../assets/img/<?= $b['gambar'] ?: 'default.png' ?>" width="100">
        
        <h3><?= $b['judul'] ?></h3>
        <p><?= $b['penulis'] ?></p>

        <?php if($b['stok'] > 0) { ?>
            <p>Stok: <?= $b['stok'] ?></p>

            <form method="POST" action="proses_pinjam.php">
                <input type="hidden" name="id_buku" value="<?= $b['id'] ?>">
                <button name="pinjam">Pinjam</button>
            </form>

        <?php } else { ?>
            <p style="color:red;">Stok Habis </p>
            <button disabled>Tidak Tersedia</button>
        <?php } ?>

    </div>
<?php } ?>

</div>

</body>
</html>