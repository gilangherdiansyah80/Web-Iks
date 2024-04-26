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
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Perubahan berhasil disimpan.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Menampilkan formulir pengeditan
    if (isset($_GET['id'])) {
        $newsId = $_GET['id'];

        // Lakukan query untuk mendapatkan data berita berdasarkan $newsId
        $query = "SELECT * FROM news WHERE id = $newsId";
        $result = mysqli_query($conn, $query);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>IKS.PI KERA SAKTI CABANG BANDUNG</title>
</head>
<body>
    <header class="fixed-top">
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
    <main style="margin-top: 5rem;">
        <div class="main-content">
            <h1>Edit Berita</h1>
            <div class="container-card">
            <form action="process-edit-news.php" method="post" class="edit-keuangan">
                    <input type="hidden" name="news_id" value="<?= $item['id'] ?>">
                    
                    <label for="title">Judul:</label>
                    <input type="text" name="title" value="<?= $item['title'] ?>">
    
                    <label for="image">Gambar URL:</label>
                    <input type="text" name="image" value="<?= $item['image'] ?>">
    
                    <label for="content">Content:</label>
                    <textarea name="content"><?= $item['content'] ?></textarea>
    
                    <button type="submit">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </main>
    <footer class="mt-5" style="background-color: rgba(208, 208, 208, 0.966);">
      <div class="container">
        <div class="row">
            <p class="text-sm-start d-flex p-2">IKS.PI Kera Sakti merupakan perguruan beladiri yang memadukan kung fu dan pencak silat yang telah berkembang cukup pesat di seantoro pelosok negeri hingga luar negeri yang didirkan oleh R. Totong Kiemdarto pada tahun 1980, IKS.PI Kera Sakti di Kota Bandung sendiri mulai dikenalkan ke masyarakat pasundan mulai tahun 1992 hingga sekarang. Banyaknya peminat dikalangan masyarakat kota bandung khususnya dikarenakan IKS.PI Kera Sakti mencetak bibit bibit atlet yang tangguh dan mumpuni, bukan sekedar silat IKS.PI Kera Sakti juga mengajarkan ilmu kerohanian serta mempererat kekeluargaan yang sangat solid. Dengan Motto perguruan, keempat penjuru kita mencari saudara jika ada musuh pantang tunduk kepala, IKS.PI Kera Sakti Kota Bandung terus berusaha memperkenalkan Perguruan silat ini kepada masyarakat luas.
IKS.PI Kera Sakti Jaya dan Abadi, Kita Berlaga, Kita Bisa, Kita Juara.</p>
          </div>
          <div class="d-flex flex-row pb-3 text-center justify-content-center">
            <a href="mailto:ikspikerasakticabangbandung@email.com" class="text-decoration-none fs-none me-3" style="color: black;"><i class="bi bi-envelope-at-fill">  Email</i></a>
            <a href="https://www.instagram.com/ikspibandung_official/" class="text-decoration-none fs-none me-3" style="color: black;"><i class="bi bi-instagram">  Instagram</i></a>
            <a href="https://www.tiktok.com/@ikspibandung_official" class="text-decoration-none fs-none" style="color: black;"><i class="bi bi-tiktok">  Tiktok</i></a>
        </div>
          
      </div>
    </footer>
            <script src="../js/hamburger.js"></script>
    <script src="../js/admin.js"></script>
    <script src="../js/logout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <?php
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "ID berita tidak valid.";
    }
}
?>
