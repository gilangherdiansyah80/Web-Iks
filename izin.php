<?php
$folderPath = '../uploads';

// Ubah izin folder menjadi 0777 (Read, Write, Execute for all)
if (chmod($folderPath, 0777)) {
    echo 'Izin berhasil diubah.';
} else {
    echo 'Gagal mengubah izin.';
}
?>
