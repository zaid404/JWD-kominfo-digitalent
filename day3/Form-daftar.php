<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
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
        }
	</style>
</head>
<body>
<a href="index.php">Kembali ke Home</a><br>
    <div class="container mt-4">
        <header>
            <h3>Formulir Pendaftaran Siswa Baru</h3>
        </header>
        
        <form action="proses-pendaftaran-2.php" method="POST">
            <fieldset class="border p-4 rounded">
                <legend class="w-auto">Data Pribadi</legend>
                
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama lengkap" required>
                </div>
                
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat" required></textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin:</label><br>
                    <div class="form-check">
                        <input type="radio" id="laki-laki" name="jenis_kelamin" value="laki-laki" class="form-check-input" required>
                        <label for="laki-laki" class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" class="form-check-input" required>
                        <label for="perempuan" class="form-check-label">Perempuan</label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama:</label>
                    <select id="agama" name="agama" class="form-select" required>
                        <option value="" disabled selected>Pilih agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Atheis">Atheis</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="sekolah_asal" class="form-label">Sekolah Asal:</label>
                    <input type="text" id="sekolah_asal" name="sekolah_asal" class="form-control" placeholder="Nama sekolah" required>
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
