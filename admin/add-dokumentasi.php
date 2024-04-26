<?php
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);

    // Gunakan $_FILES untuk mengakses informasi file gambar
    $image_name = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];
    $image_path = "../uploads/" . $image_name;

    // Pindahkan file gambar ke direktori yang diinginkan
    if (move_uploaded_file($image_temp, $image_path)) {
        $date = mysqli_real_escape_string($conn, $_POST["date_added"]);

        // Gunakan tanda tanya (?) sebagai placeholder untuk binding parameter
        $query = $conn->prepare("INSERT INTO dokumentasi (title, image_path, date_added) VALUES (?, ?, ?)");

        // Sesuaikan tipe data parameter dengan yang sesuai dengan kolom di tabel
        $query->bind_param("sss", $title, $image_path, $date);

        if ($query->execute()) {
            echo "<script>alert('Data berhasil ditambahkan'); window.location.href='admin.php';</script>";
        } else {
            echo "Error: " . $query->error;
        }

        $query->close();
    } else {
        echo "Error: Gagal mengupload file gambar.";
    }

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
        <h2>Tambah Dokumentasi</h2>

          <div class="container-card">
          <!-- HTML Form -->
          <form method="post" enctype="multipart/form-data">
                    <label for="title">Judul:</label>
                    <input type="text" name="title" required>

                    <label for="image">Gambar:</label>
                    <input type="file" name="image" accept="image/*" required>

                    <label for="date_added">Tanggal:</label>
                    <input type="date" name="date_added" required>

                    <input type="submit" value="Tambahkan Dokumentasi">
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