<?php

include("koneksi.php");


if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];


$sql = "SELECT * FROM calon_siswa WHERE id=?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$siswa = mysqli_fetch_assoc($result);


if (!$siswa) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
	a {
		display: inline-block;
		margin-top: 20px;
		padding: 10px 20px;
		text-decoration: none;
		background-color: #4CAF50;
		color: white;
		border-radius: 5px;
	}
	a:hover {
		background-color: #45a049;
	</style>
</head>
<body>
<a href="index.php">Kembali ke Home</a><br>
    <div class="container">
        <h1>Edit Data Mahasiswa</h1>
		
        <form action="proses-edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($siswa['id'], ENT_QUOTES, 'UTF-8'); ?>" />
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($siswa['nama'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea class="form-control" name="alamat" required><?php echo htmlspecialchars($siswa['alamat'], ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin:</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="jk-laki-laki" <?php if($siswa['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>>
                    <label class="form-check-label" for="jk-laki-laki">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="jk-perempuan" <?php if($siswa['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>>
                    <label class="form-check-label" for="jk-perempuan">Perempuan</label>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="agama" class="form-label">Agama:</label>
                <select class="form-select" name="agama" required>
                    <option value="Islam" <?php if($siswa['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                    <option value="Kristen" <?php if($siswa['agama'] == 'Kristen') echo 'selected'; ?>>Kristen</option>
                    <option value="Katolik" <?php if($siswa['agama'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
                    <option value="Hindu" <?php if($siswa['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                    <option value="Buddha" <?php if($siswa['agama'] == 'Buddha') echo 'selected'; ?>>Buddha</option>
                    <option value="Konghucu" <?php if($siswa['agama'] == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="sekolah_asal" class="form-label">Sekolah Asal:</label>
                <input type="text" class="form-control" name="sekolah_asal" value="<?php echo htmlspecialchars($siswa['sekolah_asal'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
