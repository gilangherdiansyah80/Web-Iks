<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $saldo_awal = isset($_POST['saldo_awal']) ? (float) str_replace(',', '.', $_POST['saldo_awal']) : 0;
    $keterangan_pemasukan = isset($_POST['keterangan_pemasukan']) ? $_POST['keterangan_pemasukan'] : [];
    $jumlah_pemasukan = isset($_POST['jumlah_pemasukan']) ? array_map(function($val) {
        return (float) str_replace(',', '.', $val);
    }, $_POST['jumlah_pemasukan']) : [];
    $keterangan_pengeluaran = isset($_POST['keterangan_pengeluaran']) ? $_POST['keterangan_pengeluaran'] : [];
    $jumlah_pengeluaran = isset($_POST['jumlah_pengeluaran']) ? array_map(function($val) {
        return (float) str_replace(',', '.', $val);
    }, $_POST['jumlah_pengeluaran']) : [];
    $gambar = isset($_FILES['gambar']) ? $_FILES['gambar'] : [];

    // Proses file gambar yang diunggah
    $upload_errors = [];
    $image_paths = []; // Array untuk menyimpan path gambar
    $image_descriptions = []; // Array untuk menyimpan deskripsi gambar

    if (!empty($gambar)) {
        foreach ($gambar['tmp_name'] as $index => $tmp_name) {
            if ($gambar['error'][$index] == UPLOAD_ERR_OK) {
                $image_name = $gambar['name'][$index];
                $file_info = pathinfo($image_name);
                $file_extension = strtolower($file_info['extension']);

                // Memeriksa tipe file (hanya gambar yang diizinkan)
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');

                if (in_array($file_extension, $allowed_types)) {
                    // Sesuaikan path dengan struktur proyek Anda
                    $upload_dir = "../uploads/";
                    $timestamp = time();
                    $image_path = $upload_dir . $timestamp . "_" . $file_info['basename'];

                    // Pindahkan file gambar yang diunggah ke direktori yang diinginkan
                    if (!move_uploaded_file($tmp_name, $image_path)) {
                        $upload_errors[] = "Gagal mengunggah file " . $image_name;
                    } else {
                        // Simpan path gambar ke dalam array
                        $image_paths[] = $image_path;

                        // Ambil deskripsi gambar dari input terkait
                        $image_descriptions[] = $_POST['image_description'][$index] ?? ''; // Ambil deskripsi gambar
                    }
                } else {
                    $upload_errors[] = "File " . $image_name . " harus berupa gambar (JPG, JPEG, PNG, GIF)";
                }
            } else {
                $upload_errors[] = "Gagal mengunggah file " . $gambar['name'][$index];
            }
        }
    }

    if (!empty($upload_errors)) {
        echo json_encode(['success' => false, 'message' => implode("; ", $upload_errors)]);
        exit();
    }

    // Hitung total pemasukan dan pengeluaran
    $total_pemasukan = array_sum($jumlah_pemasukan);
    $total_pengeluaran = array_sum($jumlah_pengeluaran);

    // Hitung saldo akhir
    $saldo_akhir = $saldo_awal + $total_pemasukan - $total_pengeluaran;

    // Simpan data transaksi ke database
    $transaksi_query = $conn->prepare("INSERT INTO transaksi (tanggal, saldo_awal, pemasukan, pengeluaran, saldo_akhir) VALUES (NOW(), ?, ?, ?, ?)");
    $transaksi_query->bind_param("dddd", $saldo_awal, $total_pemasukan, $total_pengeluaran, $saldo_akhir);

    if ($transaksi_query->execute()) {
        // Mendapatkan ID transaksi yang baru ditambahkan
        $transaksi_id = $conn->insert_id;

        // Simpan detail pemasukan ke database
        $pemasukan_query = $conn->prepare("INSERT INTO detail_transaksi (transaksi_id, keterangan, jumlah, jenis) VALUES (?, ?, ?, 'pemasukan')");
        $pemasukan_query->bind_param("dsd", $transaksi_id, $keterangan, $jumlah);

        foreach ($keterangan_pemasukan as $index => $keterangan) {
            $jumlah = $jumlah_pemasukan[$index];
            $pemasukan_query->execute();
        }

        // Simpan detail pengeluaran ke database
        $pengeluaran_query = $conn->prepare("INSERT INTO detail_transaksi (transaksi_id, keterangan, jumlah, jenis, image_path, image_description) VALUES (?, ?, ?, 'pengeluaran', ?, ?)");
        $pengeluaran_query->bind_param("dsdss", $transaksi_id, $keterangan, $jumlah, $image_path, $image_description);

        foreach ($keterangan_pengeluaran as $index => $keterangan) {
            $jumlah = $jumlah_pengeluaran[$index];
            $image_path = $image_paths[$index]; // Ambil path gambar sesuai indeks
            $image_description = $image_descriptions[$index] ?? ''; // Ambil deskripsi gambar sesuai indeks
            $pengeluaran_query->execute();
        }

        // Tutup prepared statements
        $transaksi_query->close();
        $pemasukan_query->close();
        $pengeluaran_query->close();

        // Tutup koneksi
        $conn->close();

        echo json_encode(['success' => true, 'message' => 'Data berhasil ditambahkan']);

        // Redirect ke halaman admin.php
        echo '<script type="text/javascript">';
        echo 'window.location.href="admin.php";';
        echo 'alert("Data berhasil ditambahkan!");';
        echo '</script>';
    }
}
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
            <h2>Input Keuangan</h2>
            <div class="container-card">
                <form method="post" enctype="multipart/form-data">
                    <div class="saldo-awal-container">
                        <label for="saldo_awal">Saldo Awal:</label>
                        <input type="text" step="0.01" name="saldo_awal" required><br>
                    </div>

                    <h3>Pemasukan:</h3>
                    <div id="pemasukan_container">
                        <div class="pemasukan_child">
                            <label for="keterangan_pemasukan[]">Keterangan:</label>
                            <input type="text" name="keterangan_pemasukan[]" required>
                            <label for="jumlah_pemasukan[]">Jumlah:</label>
                            <input type="text" name="jumlah_pemasukan[]" required><br>
                        </div>
                    </div>

                    <button type="button" id="add_pemasukan">Tambah Pemasukan</button><br><br>

                    <h3>Pengeluaran:</h3>
                    <div id="pengeluaran_container">
                        <div class="pengeluaran_child">
                            <label for="keterangan_pengeluaran[]">Keterangan:</label>
                            <input type="text" name="keterangan_pengeluaran[]" required>
                            <label for="jumlah_pengeluaran[]">Jumlah:</label>
                            <input type="text" name="jumlah_pengeluaran[]" required><br>
                        </div>
                    </div>

                    <button type="button" id="add_pengeluaran">Tambah Pengeluaran</button><br><br>

                    <h3>Gambar:</h3>
                    <div id="gambar_container">
                        <div class="gambar_child">
                            <label for="image_description">Keterangan:</label>
                            <input type="text" name="image_description[]" required>
                            <label for="gambar">Gambar:</label>
                            <input type="file" name="gambar[]" accept="image/*" required>
                        </div>
                    </div>
                    <button type="button" id="add_gambar">Tambah Gambar</button><br><br>

                    <input type="submit" value="Hitung Saldo Akhir">
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
    <script src="../js/logout.js"></script>

    <script>
        const addPemasukanButton = document.getElementById("add_pemasukan");
        const addPengeluaranButton = document.getElementById("add_pengeluaran");
        const pemasukanContainer = document.getElementById("pemasukan_container");
        const pengeluaranContainer = document.getElementById("pengeluaran_container");
        const addGambarButton = document.getElementById("add_gambar");
        const gambarContainer = document.getElementById("gambar_container");

        addPemasukanButton.addEventListener("click", () => {
            const pemasukanDiv = document.createElement("div");
            pemasukanDiv.innerHTML = `
                <label for="keterangan_pemasukan[]">Keterangan:</label>
                <input type="text" name="keterangan_pemasukan[]" required>
                <label for="jumlah_pemasukan[]">Jumlah:</label>
                <input type="text" name="jumlah_pemasukan[]" required><br>
            `;
            pemasukanContainer.appendChild(pemasukanDiv);
        });

        addPengeluaranButton.addEventListener("click", () => {
            const pengeluaranDiv = document.createElement("div");
            pengeluaranDiv.innerHTML = `
                <label for="keterangan_pengeluaran[]">Keterangan:</label>
                <input type="text" name="keterangan_pengeluaran[]" required>
                <label for="jumlah_pengeluaran[]">Jumlah:</label>
                <input type="text" name="jumlah_pengeluaran[]" required><br>
            `;
            pengeluaranContainer.appendChild(pengeluaranDiv);
        });

        addGambarButton.addEventListener("click", () => {
            const newGambarDiv = document.createElement("div");
            newGambarDiv.innerHTML = `
                <label for="image_description">Keterangan:</label>
                <input type="text" name="image_description[]" required>
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar[]" accept="image/*" required>
            `;
            gambarContainer.appendChild(newGambarDiv);
        });
    </script>
</body>
</html>
