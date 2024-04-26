<?php
session_start();
include '../koneksi.php';

// Ambil semua dokumentasi dari basis data
$query = "SELECT * FROM dokumentasi";
$dokumentasi_result = $conn->query($query);

// Periksa apakah query berhasil
if (!$dokumentasi_result) {
    die("Query error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
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
          <ul class="menu-bar" style="width: 100%">
          <li class="menu-list">
              <a href="index-user.php" class="nav-link">Home</a>
            </li>
            <li class="menu-list">
              <div class="nav-link" id="nav-link">Tentang Kami</div>
              <ul class="about-me" id="about-me" style="width: 100%" hidden>
                <li class="nav-item" id="sejarah">
                  <a href="sejarah-user.php" class="nav-link">
                    <p>Sejarah <small>IKS.PI KERA SAKTI</small></p>
                  </a>
                </li>
                <li class="nav-item" id="struktur">
                  <a href="kepengurusan-user.php" class="nav-link">
                    <p>Struktur Kepengurusan</p>
                  </a>
                </li>
                <li class="nav-item" id="struktur">
                  <a href="ketua-ranting-user.php" class="nav-link">
                    <p>Ketua Ranting</p>
                  </a>
                </li>
                <li class="nav-item" id="tempat-latihan">
                  <a href="tempat-latihan-user.php" class="nav-link">
                    <p>Tempat Latihan</p>
                  </a>
                </li>
                <li class="nav-item" id="keuangan">
                  <a href="keuangan-user.php" class="nav-link" id="keuangan">
                    <p>Keuangan</p>
                  </a>
                </li>
                <li class="nav-item" id="keuangan">
                  <a href="dokumentasi.php" class="nav-link" id="keuangan">
                    <p>Dokumentasi</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-list">
              <a href="template-dokumen.php" class="nav-link">
                <p>Template Dokumen</p>
              </a>
            </li>
            <li class="menu-list">
              <a href="https://api.whatsapp.com/send?phone=6281224943494" class="nav-link">
                <p>Contact</p>
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
        <h2>Dokumentasi Terbaru</h2>

        <?php
        // Periksa apakah ada data dokumentasi
        if ($dokumentasi_result->num_rows > 0) {
            while ($item = $dokumentasi_result->fetch_assoc()) {
        ?>
            <div class="container-card">
                <div class="judul" style="width: 100%;">
                    <img src="../uploads/<?= $item['image_path'] ?>" alt="Dokumentasi" class="img-fluid" style="border-radius: 10px; width: 100%;">
                    <h3><?= $item['title'] ?></h3>
                    <p>Tanggal: <?= $item['date_added'] ?></p>
                </div>
            </div>
        <?php
            }
        } else {
            echo "<p>Tidak ada data dokumentasi.</p>";
        }
        ?>
      </div>
    </main>
    <footer class="mt-5" style="background-color: rgba(208, 208, 208, 0.966);">
      <div class="container">
        <div class="row">
            <p class="text-sm-start d-flex p-2">IKS.PI Kera Sakti perpaduan kung fu dan pencak silat yang telah berkembang cukup pesat di seantoro pelosok negeri hingga luar negeri yang didirkan oleh R. Totong Kiemdarto pada tahun 1980, IKS.PI Kera Sakti Kota Bandung sendiri mulai dikenalkan ke masyarakat pasundan mulai tahun 1992 hingga sekarang. Banyaknya peminat dikalangan masyarakat kota bandung khususnya dikarenakan IKS.PI Kera Sakti mencetak bibit bibit atlet yang tangguh dan mumpuni, bukan sekedar silat IKS.PI Kera Sakti juga mempelajari ilmu kerohanian serta mempererat kekeluargaan yang sangat solid. Moto IKS.PI Kera Sakti adalah diatas langit masih ada langit, keempat penjuru kita mencari saudara jika ada musuh pantang tunduk kepala, IKS.PI Kera Sakti Kota Bandung terus berusaha memperkenalkan Perguruan silat ini dengan ikut event event pertandingan silat, membuat bakti sosial, eksklu dsb. IKS.PI Kera Sakti Jaya dan Abadi, Kita Berlaga, Kita Bisa, Kita Juara.</p>
          </div>
          <div class="d-flex flex-row pb-3 text-center justify-content-center">
            <a href="" class="text-decoration-none fs-none me-3" style="color: black;"><i class="bi bi-envelope-at-fill">  Email</i></a>
            <a href="" class="text-decoration-none fs-none me-3" style="color: black;"><i class="bi bi-instagram">  Instagram</i></a>
            <a href="" class="text-decoration-none fs-none" style="color: black;"><i class="bi bi-tiktok">  Tiktok</i></a>
        </div>
          
      </div>
    </footer>

    <script src="../js/hamburger.js"></script>
    <script src="../js/logout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>