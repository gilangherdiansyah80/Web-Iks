<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses penyimpanan perubahan
    $newsId = $_POST['news_id'];
    $judul = $_POST['title'];
    $gambar = $_POST['image'];
    $content = $_POST['content'];

    // Lakukan query untuk memperbarui data berita
    $query = "UPDATE news SET title='$judul', image='$gambar', content='$content' WHERE id = $newsId";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Perubahan berhasil disimpan.";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Menampilkan formulir pengeditan
    if (isset($_GET['id'])) {
        $newsId = $_GET['id'];

        // Lakukan query untuk mendapatkan data berita berdasarkan $newsId
        $query = "SELECT * FROM news WHERE id = $newsId";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Ambil data berita
            $item = mysqli_fetch_assoc($result);

            // Tampilkan formulir pengeditan
            ?>
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/csss/style.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="image/png" href="../img/ikspibandung.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>IKS.PI KERA SAKTI CABANG BANDUNG</title>
</head>
<body>
    <header>
        <div class="header-content">
            <img class="image" src="../img/ikspibandung.png" alt="">
            <button id="hamburger" tabindex="0">☰</button>
        </div>
        <nav id="hamburger-menu" hidden>
            <ul class="menu-bar">
                <li class="menu-list">
                    <a href="admin.php" class="nav-link">Home</a>
                </li>
                <li class="menu-list">
                    <a href="iks.php" class="nav-link">Berita</a>
                </li>
                <li class="menu-list">
                    <a href="transaksi.php" class="nav-link">
                        <p>Keuangan</p>
                    </a>
                </li>
                <li class="menu-list">
                    <a href="add-dokumentasi.php" class="nav-link">
                        <p>Dokumentasi</p>
                    </a>
                </li>
                <li class="menu-list">
                    <button class="buttonMasukKeluar" id="buttonKeluar">Keluar</button>
                </li>
            </ul>
        </nav>  
    </header>
            <form action="edit-news.php" method="post">
                <input type="hidden" name="news_id" value="<?= $item['id'] ?>">

                <label for="title">Judul:</label>
                <input type="text" name="title" value="<?= $item['title'] ?>">

                <label for="image">Gambar URL:</label>
                <input type="text" name="image" value="<?= $item['image'] ?>">

                <label for="content">Content:</label>
                <textarea name="content"><?= $item['content'] ?></textarea>

                <button type="submit">Simpan Perubahan</button>
            </form>

            <script src="../js/hamburger.js"></script>
    <script src="../js/admin.js"></script>
    <script src="../js/logout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <?php
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "ID berita tidak valid.";
    }
}
?>
