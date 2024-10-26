<?php
include("koneksi.php");

// Mengambil semua data dari tabel paket_wisata2
$sql = "SELECT * FROM paket_wisata2 ORDER BY id_paket ASC"; // Mengurutkan berdasarkan ID terbaru
$result = mysqli_query($db, $sql);

if (!$result) {
    die("Query Error: " . mysqli_error($db));
}

// Nama file konten dasar
$content_file = 'base.html';
$content_file2 = 'dinamis.php';


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Golden Week Holiday</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: gold;
            padding: 10px 0;
            text-align: center;
        }
        .header-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            font-family: 'Bodoni MT Black', serif;
            margin: 0;
        }
        .header-buttons {
            margin-top: 10px;
        }
        .header-buttons button {
            background-color: #444;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .header-buttons button:hover {
            background-color: #555;
        }
        section {
            display: flex;
            flex: 1;
            margin: 20px;
        }
        nav {
            width: 25%;
            background: #ccc;
            padding: 20px;
            height: auto;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            margin: 10px 0;
        }
        nav ul li a {
            text-decoration: none;
            color: #000;
            display: block;
            padding: 8px 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        nav ul li a:hover {
            background-color: #e0e0e0;
        }
        article {
            width: 75%;
            background-color: #f1f1f1;
            padding: 20px;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Golden Week Holiday</h1>            
            <div class="header-buttons">
                <button onclick="location.href='admin.php'">Admin</button>
                <button onclick="location.href='list-paket.php'">Manage Konten</button>
                <button onclick="location.href='paketbaru.php'">Konten Dinamis</button>
                <button onclick="location.href='list.php'">Daftar Pesanan</button>
                <button onclick="location.href='logout.php'">Logout</button>
            </div>
        </div>
    </header> 

    <section>
        <nav>
			<ul>
				<?php
				// Reset result pointer to the beginning
				mysqli_data_seek($result, 0);
				while ($paket = mysqli_fetch_assoc($result)): ?>
					<li><a href="#<?php echo htmlspecialchars($paket['id_paket'], ENT_QUOTES, 'UTF-8'); ?>">
						<?php echo htmlspecialchars($paket['nama_paket'], ENT_QUOTES, 'UTF-8'); ?>
					</a></li>
				<?php endwhile; ?> 
			</ul>
        </nav>
        
        <article>

        </article>
    </section>

    <footer>
        &copy; 2024 Golden Week Holiday. All Rights Reserved.
    </footer>
</body>
</html>
