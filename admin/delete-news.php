<?php
include "../koneksi.php";

// Periksa apakah ID berita disertakan dalam parameter URL
if (isset($_GET["id"])) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    $query = $conn->prepare("DELETE FROM news WHERE id = ?");
    $query->bind_param("i", $id);

    if ($query->execute()) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $query->error;
    }

    $query->close();
} else {
    echo "ID berita tidak valid.";
}

$conn->close();
?>
