<?php
session_start();
include '../koneksi.php';

// Ambil semua berita dari basis data
$berita = query("SELECT * FROM news");

// Ambil semua dokumentasi dari basis data
$query = "SELECT * FROM dokumentasi";
$dokumentasi_result = $conn->query($query);

// Periksa apakah query berhasil
if (!$dokumentasi_result) {
    die("Query error: " . $conn->error);
}

function getKeuanganData() {
    global $conn;
    
    $query = "SELECT transaksi.*, detail_transaksi.keterangan, detail_transaksi.jumlah, detail_transaksi.jenis, detail_transaksi.image_path, detail_transaksi.image_description
              FROM transaksi
              LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.transaksi_id
              ORDER BY transaksi.id DESC";
    
    $result = $conn->query($query);
    
    $keuanganData = array();
    
    while ($row = $result->fetch_assoc()) {
        $transaksi_id = $row['id'];

        // Group details by transaction ID
        $keuanganData[$transaksi_id]['tanggal'] = $row['tanggal'];
        $keuanganData[$transaksi_id]['saldo_awal'] = $row['saldo_awal'];
        $keuanganData[$transaksi_id]['saldo_akhir'] = $row['saldo_akhir'];
        $keuanganData[$transaksi_id][$row['jenis']][] = [
            'keterangan' => $row['keterangan'],
            'jumlah' => $row['jumlah'],
            'image_path' => $row['image_path'],
            'image_description' => $row['image_description'], // tambahkan path gambar ke array data
        ];
    }

    return $keuanganData;
}

$keuanganData = getKeuanganData();

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
            <h2 id="berita">Berita Terbaru</h2>

            <div id="contianer-berita" hidden>
                <?php foreach ($berita as $item) : ?>
                    <div class="container-card">
                    <div class="first-content">
            <div class="judul text-center">
                <h3><?= $item['title'] ?></h3>
            </div>

            <div class="image" style="width: 100%;">
    <?php if (!empty($item['image']) && file_exists($item['image'])) : ?>
        <!-- Menampilkan gambar dengan tag <img> -->
        <img class="img-fluid" src="../uploads/<?= $item['image'] ?>" alt="<?= $item['title'] ?>" style="border-radius: 10px; width: 100%;">
    <?php else : ?>
        <p>Gambar tidak tersedia</p>
    <?php endif; ?>
</div>


            <div class="content">
                <!-- Menampilkan isi berita -->
                <p><?= $item['content'] ?></p>
            </div>
            
            <!-- Sisipkan bagian lain dari berita di sini sesuai kebutuhan -->
            <!-- ... (bagian lainnya) ... -->
        </div>

                        <div class="second-content">
                <div class="edit-berita">
                    <a href="edit.php?id=<?= $item['id'] ?>">
                        <button>
                            <p>edit</p>
                        </button>
                    </a>
                </div>

                <div class="hapus-berita">
                    <a href="delete-news.php?id=<?= $item['id'] ?>">
                        <button>
                            <p>hapus</p>
                        </button>
                    </a>
                </div>
            </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <h2 class="keuangan">Keuangan</h2>
<div id="container-keuangan" hidden>
    <?php foreach ($keuanganData as $transaksi_id => $data) : ?>
        <div class="container-card" >
            <div class="first-content">
                <p>Tanggal: <?= $data['tanggal'] ?></p>
                <p>Saldo Awal: <?= $data['saldo_awal'] ?></p>

                <!-- Detail Pemasukan -->
                <h3>Pemasukan:</h3>
                <?php if (isset($data['pemasukan'])) : ?>
                    <ul>
                        <?php foreach ($data['pemasukan'] as $detail) : ?>
                            <li>
                                Keterangan: <?= $detail['keterangan'] ?? 'N/A' ?>,
                                Jumlah: <?= $detail['jumlah'] ?? 'N/A' ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>Tidak ada data pemasukan.</p>
                <?php endif; ?>

                <!-- Detail Pengeluaran -->
                <h3>Pengeluaran:</h3>
                <?php if (isset($data['pengeluaran'])) : ?>
                    <ul>
                        <?php foreach ($data['pengeluaran'] as $detail) : ?>
                            <li>
                                Keterangan: <?= $detail['keterangan'] ?? 'N/A' ?>,
                                Jumlah: <?= $detail['jumlah'] ?? 'N/A' ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>Tidak ada data pengeluaran.</p>
                <?php endif; ?>

                <p>Saldo Akhir: <?= $data['saldo_akhir'] ?></p>
                
                <h2 class="text-center">Dokumentasi</h2>
                <hr>
                <div class="image" style="width: 100%;">
                     <!-- Tampilkan gambar jika ada -->
                <?php foreach ($data['pengeluaran'] as $detail) : ?>
                            <li>
                                <?= $detail['image_description'] ?? 'N/A' ?>
                                <?php if (!empty($detail['image_path'])) : ?>
                                    <br>
                                    <img src="../uploads/<?= $detail['image_path'] ?>" alt="Gambar Transaksi" class="img-fluid" style="border-radius: 10px; width: 100%;">
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                </div>
               
            </div>
                    
                    <div class="second-content">

                <div class="hapus-berita">
                <a href="delete-keuangan.php?id=<?= $transaksi_id ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                    <button>
                        <p>hapus</p>
                    </button>
                </a>
            </div>


                        </div>
                </div>
            <?php endforeach; ?>

            </div>

            <h2 id="dokumentasi">Dokumentasi</h2>

            <div id="contianer-dokumentasi">
            <?php
        // Periksa apakah ada data dokumentasi
        if ($dokumentasi_result->num_rows > 0) {
            while ($item = $dokumentasi_result->fetch_assoc()) {
        ?>
            <div class="container-card">
                <div class="judul" style="width: 100%;">
                    <img src="../uploads/<?= $item['image_path'] ?>" alt="Dokumentasi" class="img-fluid" style="border-radius: 10px; width: 100%">
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
</body>
</html>
