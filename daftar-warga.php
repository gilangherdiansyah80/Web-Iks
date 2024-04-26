<?php
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
        <h2 class="hidden-content">Daftar Warga Tingkat 1</h2>
          <div class="container-card mb-3" hidden>
            <h3>Ankgatan 48 ( Februari 1994 )</h3>
            <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">TTL</th>
                    <th scope="col">Tempat Latihan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Miswanto</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Sutrisno</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Suparmin</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Kudus Waluyo Jati</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Sudiono</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                </tbody>
              </table>
            

            <h3>Ankgatan 49 ( Juni 1994 )</h3>
            <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">TTL</th>
                    <th scope="col">Tempat Latihan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mulyanto</td>
                    <td>Wonogiri, 2 Februari 1976</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Zaenudin</td>
                    <td>Bandung, 18 Agustus 1978</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Asmuni</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Harun Miseri</td>
                    <td>Ponorogo</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Suprapto</td>
                    <td>Ngawi</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Haryanto</td>
                    <td>Magelang, 14 Agustus 1971</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Suroto</td>
                    <td>Magetan, 9 Juni 1973</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>Suradi</td>
                    <td>Kebumen, 10 Januari 1966</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">9</th>
                    <td>Sri Aminah</td>
                    <td>Magelang</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">10</th>
                    <td>Jumiatun</td>
                    <td>Kebumen</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">11</th>
                    <td>Woro</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">12</th>
                    <td>Maidah</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">13</th>
                    <td>Danu</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">14</th>
                    <td>Suratno</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">15</th>
                    <td>Tata Sukmalan</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                </tbody>
              </table>
            <h3>Ankgatan 49 ( Juni 1994 )</h3>
            <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">TTL</th>
                    <th scope="col">Tempat Latihan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mulyanto</td>
                    <td>Wonogiri, 2 Februari 1976</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Zaenudin</td>
                    <td>Bandung, 18 Agustus 1978</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Asmuni</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Harun Miseri</td>
                    <td>Ponorogo</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Suprapto</td>
                    <td>Ngawi</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Haryanto</td>
                    <td>Magelang, 14 Agustus 1971</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Suroto</td>
                    <td>Magetan, 9 Juni 1973</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>Suradi</td>
                    <td>Kebumen, 10 Januari 1966</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">9</th>
                    <td>Sri Aminah</td>
                    <td>Magelang</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">10</th>
                    <td>Jumiatun</td>
                    <td>Kebumen</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">11</th>
                    <td>Woro</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">12</th>
                    <td>Maidah</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">13</th>
                    <td>Danu</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">14</th>
                    <td>Suratno</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">15</th>
                    <td>Tata Sukmalan</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                </tbody>
              </table>
            <h3>Ankgatan 49 ( Juni 1994 )</h3>
            <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">TTL</th>
                    <th scope="col">Tempat Latihan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mulyanto</td>
                    <td>Wonogiri, 2 Februari 1976</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Zaenudin</td>
                    <td>Bandung, 18 Agustus 1978</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Asmuni</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Harun Miseri</td>
                    <td>Ponorogo</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Suprapto</td>
                    <td>Ngawi</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Haryanto</td>
                    <td>Magelang, 14 Agustus 1971</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Suroto</td>
                    <td>Magetan, 9 Juni 1973</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>Suradi</td>
                    <td>Kebumen, 10 Januari 1966</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">9</th>
                    <td>Sri Aminah</td>
                    <td>Magelang</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">10</th>
                    <td>Jumiatun</td>
                    <td>Kebumen</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">11</th>
                    <td>Woro</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">12</th>
                    <td>Maidah</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">13</th>
                    <td>Danu</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">14</th>
                    <td>Suratno</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">15</th>
                    <td>Tata Sukmalan</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                </tbody>
              </table>
            <h3>Ankgatan 50 ( Oktober 1994 )</h3>
            <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">TTL</th>
                    <th scope="col">Tempat Latihan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mulyanto</td>
                    <td>Wonogiri, 2 Februari 1976</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Zaenudin</td>
                    <td>Bandung, 18 Agustus 1978</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Asmuni</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Harun Miseri</td>
                    <td>Ponorogo</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Suprapto</td>
                    <td>Ngawi</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Haryanto</td>
                    <td>Magelang, 14 Agustus 1971</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Suroto</td>
                    <td>Magetan, 9 Juni 1973</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>Suradi</td>
                    <td>Kebumen, 10 Januari 1966</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">9</th>
                    <td>Sri Aminah</td>
                    <td>Magelang</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">10</th>
                    <td>Jumiatun</td>
                    <td>Kebumen</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">11</th>
                    <td>Woro</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">12</th>
                    <td>Maidah</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">13</th>
                    <td>Danu</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">14</th>
                    <td>Suratno</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row">15</th>
                    <td>Tata Sukmalan</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                </tbody>
              </table>
              </div>
        <h2 class="hidden-content-2">Daftar Warga Tingkat 2</h2>
          <div class="container-card" id='container-warga-tingkat-2' hidden>
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
    <script src="js/hidden-content.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>