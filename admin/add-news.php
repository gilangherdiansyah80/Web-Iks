<?php
session_start();
include 'koneksi.php';

// Ambil semua berita dari basis data
$berita = query("SELECT * FROM news");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>
    <h2>Berita Terbaru</h2>
    <?php foreach ($berita as $item) : ?>
        <div class="judul">
            <h3><?= $item['title'] ?></h3>
        </div>

        <div class="image">
            <!-- Menampilkan gambar dengan tag <img> -->
            <img src="<?= $item['image'] ?>" alt="Gambar Berita">
        </div>
        
        <div class="isi-berita">
            <p><?= $item['content'] ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>
