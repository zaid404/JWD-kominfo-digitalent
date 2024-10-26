<?php

include("koneksi.php");


if(isset($_POST['daftar'])){
	

	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$sekolah = $_POST['sekolah_asal'];

    

	$sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) 
            VALUES ('$nama', '$alamat', '$jk', '$agama', '$sekolah')";
	$query = mysqli_query($db, $sql);
    if (empty($nama) || empty($alamat) || empty($jk) || empty($agama) || empty($sekolah)) {      
        header('Location: status.php?status=gagal');
    } else {
        header('Location: status.php?status=sukses');
    }	
} else {
	die("Akses dilarang...");
}

?>
