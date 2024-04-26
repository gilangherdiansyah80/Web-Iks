<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['transaksi_id'])) {
        $transaksi_id = mysqli_real_escape_string($conn, $_POST['transaksi_id']);
        $saldo_awal = floatval($_POST['saldo_awal']);
        $tanggal = $_POST['tanggal'];

        // Update the transaksi table
        $update_transaksi_query = "UPDATE transaksi SET saldo_awal=?, tanggal=? WHERE id=?";
        $stmt_transaksi = mysqli_prepare($conn, $update_transaksi_query);
        mysqli_stmt_bind_param($stmt_transaksi, "dssi", $saldo_awal, $tanggal, $transaksi_id);
        $success_transaksi = mysqli_stmt_execute($stmt_transaksi);

        // Check if the transaksi update is successful
        if ($success_transaksi) {
            // Delete existing detail_transaksi records for the current transaksi_id
            $delete_detail_query = "DELETE FROM detail_transaksi WHERE transaksi_id=?";
            $stmt_delete_detail = mysqli_prepare($conn, $delete_detail_query);
            mysqli_stmt_bind_param($stmt_delete_detail, "i", $transaksi_id);
            $success_delete_detail = mysqli_stmt_execute($stmt_delete_detail);

            // Insert the updated detail_transaksi records
            if ($success_delete_detail) {
                if (isset($_POST['keterangan_pemasukan']) && isset($_POST['jumlah_pemasukan'])) {
                    foreach ($_POST['keterangan_pemasukan'] as $index => $keterangan) {
                        $jumlah = floatval($_POST['jumlah_pemasukan'][$index]);
                        // Insert into detail_transaksi table
                        $insert_detail_query = "INSERT INTO detail_transaksi (transaksi_id, keterangan, jumlah) VALUES (?, ?, ?)";
                        $stmt_insert_detail = mysqli_prepare($conn, $insert_detail_query);
                        mysqli_stmt_bind_param($stmt_insert_detail, "isd", $transaksi_id, $keterangan, $jumlah);
                        mysqli_stmt_execute($stmt_insert_detail);
                    }
                }

                // Calculate and update saldo_akhir in transaksi table
                $select_detail_query = "SELECT SUM(jumlah) AS total FROM detail_transaksi WHERE transaksi_id=?";
                $stmt_select_detail = mysqli_prepare($conn, $select_detail_query);
                mysqli_stmt_bind_param($stmt_select_detail, "i", $transaksi_id);
                mysqli_stmt_execute($stmt_select_detail);
                $result_select_detail = mysqli_stmt_get_result($stmt_select_detail);
                $total_pemasukan = mysqli_fetch_assoc($result_select_detail)['total'];

                // Calculate saldo_akhir
                $saldo_akhir = $saldo_awal + $total_pemasukan;

                // Update saldo_akhir in transaksi table
                $update_saldo_akhir_query = "UPDATE transaksi SET saldo_akhir=? WHERE id=?";
                $stmt_saldo_akhir = mysqli_prepare($conn, $update_saldo_akhir_query);
                mysqli_stmt_bind_param($stmt_saldo_akhir, "di", $saldo_akhir, $transaksi_id);
                mysqli_stmt_execute($stmt_saldo_akhir);

                echo "Update successful!";
            } else {
                echo "Error deleting detail records: " . mysqli_error($conn);
            }
        } else {
            echo "Error updating transaksi: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid transaction ID.";
    }
} else {
    echo "Invalid request method.";
}

mysqli_close($conn);
?>
