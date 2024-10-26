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


</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah = intval($_POST['jumlah']);

    $hargaPerBox = 1;
    $tagihanAwal = $jumlah * $hargaPerBox;

    
    if ($tagihanAwal >= 50000) {
        $diskon = 0.05; 
    } else if ($tagihanAwal >= 100000) {
        $diskon = 0.1;
    } else {
        $diskon = 0; 
    }
    

    $tdiskon = ($tagihanAwal * $diskon);
    $tagihanAkhir = $tagihanAwal - $tdiskon;

   





    
    echo "<div class='container'>";
    echo "<p><strong>Setelah Diskon</strong>";
    echo "<p><strong>Tagihan Awal:</strong> Rp " . number_format($tagihanAwal, 0, ',', '.') . "</p>";
    echo "<p><strong>Diskon:</strong> " . ($diskon * 100) . "%</p>"; // Diskon dalam persentase
    echo "<p><strong>Total Diskon: Rp </strong>" . number_format($tdiskon, 0, ',', '.') . "</p>";
    echo "<p><strong>Tagihan Akhir:</strong> Rp " . number_format($tagihanAkhir, 0, ',', '.') . "</p>";
    echo "</div>";

    
    

}

