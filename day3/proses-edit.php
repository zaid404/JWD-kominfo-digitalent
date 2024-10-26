<?php

include("koneksi.php");


if (isset($_POST['id'])) {

    $id = intval($_POST['id']);
    $nama = mysqli_real_escape_string($db, $_POST['nama']);
    $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
    $jenis_kelamin = mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
    $agama = mysqli_real_escape_string($db, $_POST['agama']);
    $sekolah_asal = mysqli_real_escape_string($db, $_POST['sekolah_asal']);
    

    $sql = "UPDATE calon_siswa SET 
            nama='$nama', 
            alamat='$alamat', 
            jenis_kelamin='$jenis_kelamin', 
            agama='$agama', 
            sekolah_asal='$sekolah_asal' 
            WHERE id=$id";
    

    $query = mysqli_query($db, $sql);
    

    if ($query) {

        header('Location: index.php?status=sukses');
    } else {

        header('Location: index.php?status=gagal');
    }
} else {

    die("Akses dilarang...");
}
?>
