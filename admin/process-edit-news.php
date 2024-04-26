<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newsId = $_POST['news_id'];
    $judul = $_POST['title'];
    $gambar = $_POST['image'];
    $content = $_POST['content'];

    // Lakukan query untuk memperbarui data berita
    $query = "UPDATE news SET title='$judul', image='$gambar', content='$content' WHERE id = $newsId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data berhasil diedit'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Metode request tidak valid.";
}
?>