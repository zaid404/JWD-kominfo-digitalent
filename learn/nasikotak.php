<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Nasi Kotak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
        .resume {
            margin-top: 20px;
        }
    </style>
<body>
</head>

    <div class="container">
        <h1>Pemesanan Nasi Kotak</h1>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDemgmLNWcFx-DkqXDukWX_J46qMJO-kGUXg&s" alt="Logo Nasi Kotak" width="200">
        <form action="" method="post">
            <div class="form-group">
                <label for="cabang">Cabang:</label>
                <select id="cabang" name="cabang" required>
                    <option value="">Pilih Cabang</option>
                    <option value="medan kota">Medan Kota</option>
                    <option value="tuntungan">Tuntungan</option>
                    <option value="pasar_merah">Pasar Merah</option>
                    <option value="amplas">Amplas</option>
                    <option value="patumbak">Patumbak</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama Pelanggan:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP:</label>
                <input type="text" id="no_hp" name="no_hp" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Kotak:</label>
                <input type="number" id="jumlah" name="jumlah" min="1" required>
            </div>
            <div class="form-group">
                <button type="submit">Pesan</button>
            </div>
        </form>
    </div>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cabang = $_POST['cabang'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $jumlah = intval($_POST['jumlah']);

    $hargaPerBox = 50000;
    $tagihanAwal = $jumlah * $hargaPerBox;

    $server = "localhost";
    $user = "root";
    $password = "";
    $nama_database = "db_wisata";

    // Attempt to establish a database connection
    $db = mysqli_connect($server, $user, $password, $nama_database);

    // Check the connection
    if (!$db) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

    // Hitung diskon
    if ($tagihanAwal >= 1000000) {
        $diskon = 5; // Diskon 5%
    } else {
        $diskon = 0; // Tidak ada diskon
    }

    $tdiskon = ($tagihanAwal * $diskon) / 100;
    $tagihanAkhir = $tagihanAwal - $tdiskon;

    // Query untuk menyimpan data ke tabel log_pesanan
    $query = "INSERT INTO log_pesanan (cabang, nama, no_hp, jumlah, tagihan_awal, diskon, total_diskon, tagihan_akhir)
              VALUES ('$cabang', '$nama', '$no_hp', '$jumlah', '$tagihanAwal', '$diskon', '$tdiskon', '$tagihanAkhir')";

    if (mysqli_query($db, $query)) {
        echo "<div class='container resume'>";
        echo "Pesanan berhasil disimpan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }

    // Tampilkan rincian pesanan
//    echo "<div class='container resume'>";
    echo "<h2>Resume Pesanan</h2>";
    echo "<p><strong>Cabang:</strong> " . htmlspecialchars($cabang) . "</p>";
    echo "<p><strong>Nama Pelanggan:</strong> " . htmlspecialchars($nama) . "</p>";
    echo "<p><strong>No HP:</strong> " . htmlspecialchars($no_hp) . "</p>";
    echo "<p><strong>Jumlah Kotak:</strong> " . htmlspecialchars($jumlah) . "</p>";
    echo "<p><strong>Tagihan Awal:</strong> Rp " . number_format($tagihanAwal, 0, ',', '.') . "</p>";
    echo "<p><strong>Diskon:</strong> " . $diskon . "%</p>";
    echo "<p><strong>Total Diskon: Rp </strong>" . number_format($tdiskon, 0, ',', '.') . "</p>";
    echo "<p><strong>Tagihan Akhir:</strong> Rp " . number_format($tagihanAkhir, 0, ',', '.') . "</p>";
    echo "</div>";

    
    // Tutup koneksi ke database
    mysqli_close($db);
}

