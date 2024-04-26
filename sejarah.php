<?php
session_start();
include 'koneksi.php';

// Ambil semua berita dari basis data
$berita = query("SELECT * FROM news");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" type="image/png" href="img/ikspibandung.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>IKS.PI KERA SAKTI CABANG BANDUNG</title>
</head>
<body>
<header class="fixed-top">
        <div class="header-content">
        <img class="image" src="img/ikspibandung.png" alt="">
      <button id="hamburger" tabindex="0">☰</button>
        </div>
        <nav id="hamburger-menu" hidden>
          <ul class="menu-bar" style="width: 100%">
          <li class="menu-list">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="menu-list">
              <div class="nav-link" id="nav-link">Tentang Kami</div>
              <ul class="about-me" style="width: 100%" id="about-me" hidden>
                <li class="nav-item" id="sejarah">
                  <a href="sejarah.php" class="nav-link">
                    <p>Sejarah <small>IKS.PI KERA SAKTI</small></p>
                  </a>
                </li>
                <li class="nav-item" id="struktur">
                  <a href="kepengurusan.php" class="nav-link">
                    <p>Struktur Kepengurusan</p>
                  </a>
                </li>
                <li class="nav-item" id="struktur">
                  <a href="ketua-ranting.php" class="nav-link">
                    <p>Ketua Ranting</p>
                  </a>
                </li>
                <li class="nav-item" id="tempat-latihan">
                  <a href="tempat-latihan.php" class="nav-link">
                    <p>Tempat Latihan</p>
                  </a>
                </li>
                <li class="nav-item" id="keuangan">
                  <a href="login.php" class="nav-link" id="keuangan">
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
              <a href="https://api.whatsapp.com/send?phone=6281224943494" class="nav-link">
                <p>Contact</p>
              </a>
            </li>
            <li class="menu-list">
              <button class="buttonMasukKeluar" id="buttonMasuk">Masuk</button>
            </li>
          </ul>
      </nav>
    </header>

    <main style="margin-top: 5rem;">
      <div class="main-content">
      <h2>Sejarah IKS.PI KERA SAKTI</h2>
      <div class="container-card">
            <p>
            Perguruan IKS.PI KERA SAKTI merupakan  Perguruan yang mengajarkan PENCAK SILAT DAN KUNG – FU dan mengajarkan KUNG FU JURUS KERA ALIRAN SELATAN & UTARA atau dalam istilah Chinanya disebut NAN PIE HO JIEN ( Bhs. Nasional ) atau LAM PAK KAUW KUN ( Bhs. Hokkian ). 
            <br><br>
            
Pertama kali Perguruan ini didirikan di MADIUN, pada tanggal 15 Januari 1980 dengan Izin P & K Madiun Nomor : 183/II04.3/L.4/80/SK. Adapun PENDIRI Perguruan IKS.PI KERA SAKTI ini yaitu R. TOTONG KIEMDARTO, Putra dari Bp. RM. SENTARDI dan Ny. OEY KIEM LIAN NIO. 
            <br><br>
            Dahulu Perguruan ini hanya bernama IKATAN KELUARGA SILAT ( Disingkat IKS ) ” PUTRA INDONESIA ” 
Adapun PUTRA INDONESIA maksudnya adalah meskipun perguruan ini dominan beraliran Kung-Fu yang merupakan kebudayaan asing,akan tetapi organisasi yang menjadi wadahnya adalah didirikan di Indonesia. 
            <br><br>
            Sekitar Tahun 1983, perguruan ini diberi TAMBAHAN NAMA BARU dibelakang IKS.PI yaitu KERA SAKTI, di maksudkan untuk MEMUDAHKAN PENGENALAN dan TERDENGAR LEBIH MENGENA, sesuai dengan bentuk dari ciri khas perguruannya sendiri. 
            <br><br>
            Nama Kera Sakti itu sendiri diambil dari Nama SUN GO KONG / KAUW CE THIAN ( Artinya KERA SAKTI ), yaitu Raja Kera dari Gunung HWA KO SAN didalam Legenda Tiongkok Kuno yang terkenal cerdik, perkasa dan pernah mengacau khayangan ( Cerita tentang SUN GO KONG ini pernah disalin dalam cerita serial Bahasa Jawa di Majalah Jayabaya yang berjudul SANG PRAJAKA/ SERAT PANGRUWATING BAPA KISTA ). 
            <br><br>
            Diatas sudah dikatakan bahwa perguruan ini dari aliran NAN PIE HO JIEN artinya NAN = Selatan, PEI = Utara, HO = Kera, JIEN = Jurus / Kung – Fu. Maksudnya adalah Perguruan ini mengajarkan Kung-Fu dari Jenis Jurus Kera yang mengkombinasikan Tinju Selatan dan Tendangan Utara sebagai kiblat gayanya. 
            <br><br>
            Sesungguhnya belajar Kung – Fu ( KUN ) itu tidak gampang masalahnya :
            <br>
            1. Sifatnya tertutup ( Jarang disebarkan untuk umum )
            <br>
            2. Menjadi Monopoli Bangsa China yang hanya diajarkan untuk keluarga, famili atau teman dekat.
            <br>
            3. Jumlah Murid yang dibatasi.
            <br>
            4. Murid yang baru berlatih langsung diberi latihan – latihan yang berat sehingga jarang ada yang melanjutkan.
            <br>
            5. Banyak yang dibawa pemiliknya keliang kubur, tanpa meninggalkan ahli waris dan catatan untuk generasi yang akan         datang.
            <br><br>
            Untuk itu dengan cita-cita agar Kung-Fu TIDAK PUNAH, maka R. TOTONG KIEMDARTO memberanikan diri untuk mengenalkannya kepada masyarakat dengan bekal yang pernah didapatnya dari SUHU_SUHU KUNTAUW yang pernah membimbingnya tentang Kung-Fu.
            <br><br>
            Hanya saja karena zaman sudah berbeda, maka pelajaran Kung-Fu yang diajarkan kepada masyarakat diadakan PERUBAHAN atau PENAMBAHAN YANG DISESUAIKAN DENGAN PERKEMBANGAN ZAMAN dan SELERA MASSA walaupun TEKNIK-TEKNIK KUNG-FU BAGIAN INTI YANG ASLI TIDAK DITINGGALKAN.
            <br><br>
            Demikian juga sebagai salah satu Perguruan Kung-Fu yang sudah modern, maka Perguruan IKS.PI Kera Sakti mengadakan pula TINGKATAN DALAM PELAJARAN, mengingat BAKAT dan KECERDASAN YANG BERBEDA-BEDA DARI TIAP SISEANYA, yaitu TINGKAT DASAR I, TINGKAT DASAR II, TINGKAT WARGA, TINGKAT PENDEKAR DAN TINGKAT DEWAN GURU atau istilah lain TINGKAT DASAR, MENENGAH dan LANJUTAN yang masing-masing ditandai dengan SABUK HITAM, KUNING, BIRU, MERAH  dan MERAH STRIP KUNING EMAS.
            <br><br>
            Karena ada Tingkatan, maka tentu saja ada UJIAN KENAIKAN TINGKAT BAIK PHYSIK maupun MENTAL, yang bertujuan MENGEVALUASI DAN MENGETAHUI SAMPAI DIMANA SEORANG SISWA ITU MENDALAMI ILMU YANG DITERIMANYA, dan setiap Akhir Ujian selalu ditutup dengan UPACARA PENGESAHAN. Apabila dinyatakan lulus dan telah disyahkan sebagai WARGA IKS.PI KERA SAKTI, maka Siswa tersebut berhak memakai SERAGAM KEBESARAN (SAKRAL) IKS.PI KERA SAKTI, dan boleh mendirikan Cabang atau Ranting – ranting tempat latihan dimana saja dibawah naungan PUSAT PERGURUAN, atau istilahnya siswa tersebut sudah boleh TURUN GUNUNG.
            </p>
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

    <script src="js/hamburger.js"></script>
    <script src="js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>