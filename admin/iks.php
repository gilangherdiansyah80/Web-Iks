<?php
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);

    // Proses file gambar yang diunggah
    $image = ""; // Nama file gambar default jika tidak ada yang diunggah

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];

        // Memeriksa tipe file (hanya gambar yang diizinkan)
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $file_info = pathinfo($image_name);
        $file_extension = strtolower($file_info['extension']);

        if (in_array($file_extension, $allowed_types)) {
            // Sesuaikan path dengan struktur proyek Anda
            $upload_dir = "../uploads/";
            $timestamp = time();
            $image = $upload_dir . $timestamp . "_" . $file_info['basename'];

            // Pindahkan file gambar yang diunggah ke direktori yang diinginkan
            move_uploaded_file($image_tmp, $image);
        } else {
            echo "Error: File harus berupa gambar (JPG, JPEG, PNG, GIF)";
            exit();
        }
    }

    // Gunakan tanda tanya (?) sebagai placeholder untuk binding parameter
    $query = $conn->prepare("INSERT INTO news (title, image, content) VALUES (?, ?, ?)");

    // Sesuaikan tipe data parameter dengan yang sesuai dengan kolom di tabel
    $query->bind_param("sss", $title, $image, $content);

    if ($query->execute()) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $query->error;
    }

    $query->close();
    $conn->close();
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
        <h2>Tambah Berita</h2>

        <div class="container-card">
        <form method="post" enctype="multipart/form-data">
            <label for="title">Judul Berita:</label><br>
            <input type="text" id="title" name="title" required><br><br>

            <label for="image">Tambahkan Gambar :</label>
            <input type="file" id="image" name="image" required><br><br>

            <label for="content">Isi Berita:</label><br>
            <textarea id="content" name="content" rows="4" required></textarea><br><br>

            <input type="submit" value="Tambah Berita">
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
</body>
</html>