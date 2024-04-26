<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $transaksi_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM transaksi WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $transaksi_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $transaksi = mysqli_fetch_assoc($result)) {
        $pemasukanArray = json_decode($transaksi['pemasukan'], true);
        $pengeluaranArray = json_decode($transaksi['pengeluaran'], true);

        if (!is_array($pemasukanArray)) {
            $pemasukanArray = [];
        }

        if (!is_array($pengeluaranArray)) {
            $pengeluaranArray = [];
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
            <div class="main-content">
                <h2>Edit Keuangan</h2>
                <div class="container-card">
                    <form action="update-keuangan.php" method="post">
                        <input type="hidden" name="transaksi_id" value="<?= $transaksi['id'] ?>">

                        <label for="saldo_awal">Saldo Awal:</label>
                        <input type="number" step="0.01" name="saldo_awal" value="<?= $transaksi['saldo_awal'] ?>" required><br><br>

                        <label for="tanggal">Tanggal:</label>
                        <input type="date" name="tanggal" value="<?= $transaksi['tanggal'] ?>" required><br><br>

                        <h3>Pemasukan:</h3>
                        <div id="pemasukan_container">
                            <?php
                            foreach ($pemasukanArray as $index => $detail) {
                                ?>
                                <div>
                                    <label for="keterangan_pemasukan[]">Keterangan:</label>
                                    <input type="text" name="keterangan_pemasukan[]" value="<?= htmlspecialchars($detail['keterangan']) ?>" required>
                                    <label for="jumlah_pemasukan[]">Jumlah:</label>
                                    <input type="number" step="0.01" name="jumlah_pemasukan[]" value="<?= floatval($detail['jumlah']) ?>" required>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <button type="button" id="add_pemasukan">Tambah Pemasukan</button><br><br>

                        <h3>Pengeluaran:</h3>
                        <div id="pengeluaran_container">
                            <?php
                            foreach ($pengeluaranArray as $index => $detail) {
                                ?>
                                <div>
                                    <label for="keterangan_pengeluaran[]">Keterangan:</label>
                                    <input type="text" name="keterangan_pengeluaran[]" value="<?= htmlspecialchars($detail['keterangan']) ?>" required>
                                    <label for="jumlah_pengeluaran[]">Jumlah:</label>
                                    <input type="number" step="0.01" name="jumlah_pengeluaran[]" value="<?= floatval($detail['jumlah']) ?>" required>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <button type="button" id="add_pengeluaran">Tambah Pengeluaran</button><br><br>

                        <input type="submit" value="Hitung Saldo Akhir">
                    </form>
                </div>
            </div>

         
            
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const addPemasukanButton = document.getElementById("add_pemasukan");
                const addPengeluaranButton = document.getElementById("add_pengeluaran");
                const pemasukanContainer = document.getElementById("pemasukan_container");
                const pengeluaranContainer = document.getElementById("pengeluaran_container");

                addPemasukanButton.addEventListener("click", () => {
                    addFormElement(pemasukanContainer, "index_pemasukan[]", "keterangan_pemasukan[]", "jumlah_pemasukan[]", "remove_pemasukan");
                });

                addPengeluaranButton.addEventListener("click", () => {
                    addFormElement(pengeluaranContainer, "index_pengeluaran[]", "keterangan_pengeluaran[]", "jumlah_pengeluaran[]", "remove_pengeluaran");
                });

                pemasukanContainer.addEventListener("click", (event) => {
                    if (event.target.classList.contains("remove_pemasukan")) {
                        removeElement(event.target.parentNode);
                    }
                });

                pengeluaranContainer.addEventListener("click", (event) => {
                    if (event.target.classList.contains("remove_pengeluaran")) {
                        removeElement(event.target.parentNode);
                    }
                });

                function addFormElement(container, indexName, keteranganName, jumlahName, removeClass) {
                    const index = container.children.length;
                    const formElement = document.createElement("div");
                    formElement.innerHTML = `
                        <input type="hidden" name="${indexName}" value="${index}">
                        <label for="${keteranganName}">Keterangan:</label>
                        <input type="text" name="${keteranganName}" required>
                        <label for="${jumlahName}">Jumlah:</label>
                        <input type="number" step="0.01" name="${jumlahName}" required>
                        <button type="button" class="${removeClass}">Hapus</button>
                    `;
                    container.appendChild(formElement);
                }

                function removeElement(element) {
                    element.parentNode.removeChild(element);
                    resetIndexes();
                }

                function resetIndexes() {
                    const pemasukanElements = document.querySelectorAll("#pemasukan_container > div");
                    resetIndexInputs(pemasukanElements, "index_pemasukan");

                    const pengeluaranElements = document.querySelectorAll("#pengeluaran_container > div");
                    resetIndexInputs(pengeluaranElements, "index_pengeluaran");
                }

                function resetIndexInputs(elements, indexName) {
                    elements.forEach((element, index) => {
                        const inputs = element.querySelectorAll(`input[name^='${indexName}']`);
                        inputs.forEach(input => {
                            input.value = index;
                        });
                    });
                }
            });
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID transaksi tidak valid.";
}

mysqli_close($conn);
?>
