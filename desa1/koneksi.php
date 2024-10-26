<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_wisata";

// Attempt to establish a database connection
$db = mysqli_connect($server, $user, $password, $nama_database);

// Check the connection
if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
} else {
    echo "Berhasil terkoneksi....";
}
?>
