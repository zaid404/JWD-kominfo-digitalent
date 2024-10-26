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
</head>
<body>
    <div class="container">
        <h1>Hitung Diskon</h1>        
        <form action="" method="post">
            <div class="form-group">
                <label for="jumlah">Input Total Belanja:</label>
                <input type="number" id="jumlah" name="jumlah" min="1" required>
            </div>
            <div class="form-group">
                <button type="submit">Hitung</button>
            </div>
        </form>
    </div>

    <?php
    function hitungDiskon($jumlah) {
        $hargaPerBox = 1;
        $tagihanAwal = $jumlah * $hargaPerBox;

        // Menentukan nilai diskon
        if ($tagihanAwal >= 100000) {
            $diskon = 0.1; 
        } else if ($tagihanAwal >= 50000) {
            $diskon = 0.05; 
        } else {
            $diskon = 0; 
        }

        // Menghitung diskon dan tagihan akhir
        $tdiskon = $tagihanAwal * $diskon;
        $tagihanAkhir = $tagihanAwal - $tdiskon;

        return array(
            'tagihanAwal' => $tagihanAwal,
            'diskon' => $diskon,
            'tdiskon' => $tdiskon,
            'tagihanAkhir' => $tagihanAkhir
        );
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jumlah = intval($_POST['jumlah']);
        $result = hitungDiskon($jumlah);

        echo "<div class='container'>";
        echo "<p><strong>Setelah Diskon</strong></p>";
        echo "<p><strong>Tagihan Awal:</strong> Rp " . number_format($result['tagihanAwal'], 0, ',', '.') . "</p>";
        echo "<p><strong>Diskon:</strong> " . ($result['diskon'] * 100) . "%</p>";
        echo "<p><strong>Total Diskon:</strong> Rp " . number_format($result['tdiskon'], 0, ',', '.') . "</p>";
        echo "<p><strong>Tagihan Akhir:</strong> Rp " . number_format($result['tagihanAkhir'], 0, ',', '.') . "</p>";
        echo "</div>";
    }
    ?>
</body>
</html>
