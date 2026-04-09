<?php
include '../config/koneksi.php';

$users = mysqli_query($conn, "SELECT * FROM users WHERE role='user'");
$buku = mysqli_query($conn, "SELECT * FROM buku");
?>

<form method="POST">
    <h2>Pinjam Buku</h2>

    <label>User:</label><br>
    <select name="id_user" required>
        <option value="">-- Pilih User --</option>
        <?php while($u = mysqli_fetch_assoc($users)) { ?>
            <option value="<?= $u['id'] ?>"><?= $u['nama'] ?></option>
        <?php } ?>
    </select><br><br>

    <label>Buku:</label><br>
    <select name="id_buku" required>
        <option value="">-- Pilih Buku --</option>
        <?php while($b = mysqli_fetch_assoc($buku)) { ?>
            <option value="<?= $b['id'] ?>"><?= $b['judul'] ?></option>
        <?php } ?>
    </select><br><br>

    <button type="submit" name="pinjam">Pinjam</button>
</form>

<?php
if (isset($_POST['pinjam'])) {

    // ambil data dengan aman
    $id_user = $_POST['id_user'] ?? '';
    $id_buku = $_POST['id_buku'] ?? '';

    // validasi
    if ($id_user != '' && $id_buku != '') {

        $tgl = date('Y-m-d');

        mysqli_query($conn, "INSERT INTO transaksi 
        (id_user, id_buku, tanggal_pinjam, status)
        VALUES ('$id_user', '$id_buku', '$tgl', 'pinjam')");

        echo "✅ Berhasil pinjam!";
        
        // biar ga ke-submit ulang
        echo "<meta http-equiv='refresh' content='1;url=transaksi.php'>";

    } else {
        echo "❌ Pilih user & buku dulu!";
    }
}
?>
