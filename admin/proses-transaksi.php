<?php
include "../koneksi.php";

$query = "SELECT * FROM transaksi ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $saldo_awal = $row['saldo_awal'];
    $saldo_akhir = $row['saldo_akhir'];

    // Query untuk mendapatkan detail transaksi (pemasukan)
    $pemasukan_query = "SELECT * FROM detail_transaksi WHERE transaksi_id = " . $row['id'] . " AND jenis = 'pemasukan'";
    $result_pemasukan = $conn->query($pemasukan_query);
    $keterangan_pemasukan = [];
    $jumlah_pemasukan = [];

    while ($row_pemasukan = $result_pemasukan->fetch_assoc()) {
        $keterangan_pemasukan[] = $row_pemasukan['keterangan'];
        $jumlah_pemasukan[] = $row_pemasukan['jumlah'];
    }

    // Query untuk mendapatkan detail transaksi (pengeluaran)
    $pengeluaran_query = "SELECT * FROM detail_transaksi WHERE transaksi_id = " . $row['id'] . " AND jenis = 'pengeluaran'";
    $result_pengeluaran = $conn->query($pengeluaran_query);
    $keterangan_pengeluaran = [];
    $jumlah_pengeluaran = [];

    while ($row_pengeluaran = $result_pengeluaran->fetch_assoc()) {
        $keterangan_pengeluaran[] = $row_pengeluaran['keterangan'];
        $jumlah_pengeluaran[] = $row_pengeluaran['jumlah'];
    }
} else {
    // Handle ketika tidak ada data transaksi
    $saldo_awal = 0;
    $saldo_akhir = 0;
    $keterangan_pemasukan = [];
    $jumlah_pemasukan = [];
    $keterangan_pengeluaran = [];
    $jumlah_pengeluaran = [];
}

// Tutup koneksi
$conn->close();
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

    <main>
      <div class="main-content">
      <h2>Hasil Transaksi</h2>

          <div class="container-card">
          <p>Saldo Awal: <?= $saldo_awal ?></p>
    <h3>Pemasukan:</h3>
    <?php foreach ($keterangan_pemasukan as $index => $keterangan) { ?>
        <p>Keterangan: <?= $keterangan ?></p>
        <p>Jumlah: <?= $jumlah_pemasukan[$index] ?></p>
    <?php } ?>
    <h3>Pengeluaran:</h3>
    <?php foreach ($keterangan_pengeluaran as $index => $keterangan) { ?>
        <p>Keterangan: <?= $keterangan ?></p>
        <p>Jumlah: <?= $jumlah_pengeluaran[$index] ?></p>
    <?php } ?>
    <p>Saldo Akhir: <?= $saldo_akhir ?></p>
    
    <a href="transaksi.php">Kembali</a>
          </div>
      </div>
    </main>

    <script src="../js/hamburger.js"></script>
</body>
</html>
