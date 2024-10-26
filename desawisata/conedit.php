<?php
include("koneksi.php");

// Memeriksa apakah parameter ID tersedia
if (!isset($_GET['id_paket'])) {
    echo"error";
    exit();
}

$id_paket = $_GET['id_paket'];

// Mengambil data paket wisata berdasarkan ID
$sql = "SELECT * FROM paket_wisata2 WHERE id_paket=?";
$stmt = mysqli_prepare($db, $sql);

if ($stmt === false) {
    die("Kesalahan dalam mempersiapkan statement: " . mysqli_error($db));
}

mysqli_stmt_bind_param($stmt, "i", $id_paket);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$paket = mysqli_fetch_assoc($result);

if (!$paket) {
    die("Data tidak ditemukan...");
}

// Menangani pengiriman formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_paket = $_POST['nama_paket'];
    $deskripsi_paket = $_POST['deskripsi_paket'];
    $harga_paket = $_POST['harga_paket'];
    $gambar = $_POST['gambar'];
    $video_link = $_POST['video_link'];

    // Update data ke database
    $sql = "UPDATE paket_wisata2 SET nama_paket=?, deskripsi_paket=?, harga_paket=?, gambar=?, video_link=? WHERE id_paket=?";
    $stmt = mysqli_prepare($db, $sql);

    if ($stmt === false) {
        die("Kesalahan dalam mempersiapkan statement: " . mysqli_error($db));
    }

    mysqli_stmt_bind_param($stmt, "ssissi", $nama_paket, $deskripsi_paket, $harga_paket, $gambar, $video_link, $id_paket);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: list-paket.php");
        exit();
    } else {
        echo "Gagal menyimpan perubahan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Paket Wisata</title>
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
<a href="index.html">Kembali ke Home</a><br>
    <div class="container">
        <h1>Edit Paket Wisata</h1>
        
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama_paket" class="form-label">Nama Paket:</label>
                <input type="text" class="form-control" name="nama_paket" value="<?php echo htmlspecialchars($paket['nama_paket'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi_paket" class="form-label">Deskripsi Paket:</label>
                <textarea class="form-control" name="deskripsi_paket" rows="5" required><?php echo htmlspecialchars($paket['deskripsi_paket'], ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="harga_paket" class="form-label">Harga Paket (Rp):</label>
                <input type="number" class="form-control" name="harga_paket" value="<?php echo htmlspecialchars($paket['harga_paket'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">URL Gambar Paket:</label>
                <input type="text" class="form-control" name="gambar" value="<?php echo htmlspecialchars($paket['gambar'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="mb-3">
                <label for="video_link" class="form-label">URL Video Paket:</label>
                <input type="text" class="form-control" name="video_link" value="<?php echo htmlspecialchars($paket['video_link'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
