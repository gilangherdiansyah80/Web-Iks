<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iks"; // Ganti dengan nama database yang sesuai

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>

<!-- ikss4167_ikspibdg
ikss4167_ikspibdg -->

<!-- ikspikerasakti1980 -->