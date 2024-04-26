<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $transaksi_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Mulai transaksi
    mysqli_begin_transaction($conn);

    try {
        // Hapus terlebih dahulu baris-baris terkait di tabel detail_transaksi
        $delete_detail_query = "DELETE FROM detail_transaksi WHERE transaksi_id = ?";
        $stmt_delete_detail = mysqli_prepare($conn, $delete_detail_query);

        if (!$stmt_delete_detail) {
            throw new Exception("Error saat menyiapkan statement DELETE detail_transaksi: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt_delete_detail, "i", $transaksi_id);
        mysqli_stmt_execute($stmt_delete_detail);
        mysqli_stmt_close($stmt_delete_detail);

        // Hapus baris di tabel transaksi
        $delete_query = "DELETE FROM transaksi WHERE id = ?";
        $stmt_delete = mysqli_prepare($conn, $delete_query);

        if (!$stmt_delete) {
            throw new Exception("Error saat menyiapkan statement DELETE transaksi: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt_delete, "i", $transaksi_id);
        mysqli_stmt_execute($stmt_delete);
        mysqli_stmt_close($stmt_delete);

        // Commit transaksi jika berhasil
        mysqli_commit($conn);

        echo "<script>alert('Data berhasil dihapus'); window.location.href='admin.php';</script>";
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        mysqli_rollback($conn);

        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Permintaan tidak valid.";
}

mysqli_close($conn);
?>
