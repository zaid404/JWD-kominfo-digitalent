<html>
    <head>
        <title>Paket Wisata</title>
    </head>
    
    <body>
        <h1>Form Pemesanan</h1>
        <form action="" method="post">
            <label for="nama">Nama Pemesan:</label>
            <input type="text" name="nama" id="nama">
            
            <br><br>
            
            <label for="nohp">Nomor HP:</label>
            <input type="number" name="nohp" id="nohp">
            
            <br><br>
            
            <input type="submit" value="Submit" name="submit">
        </form>
    </body>
</html>
<?php
if (isset($_POST['submit'])) {
    $nama_pemesan = $_POST['nama'];
    $nohp = $_POST['nohp'];
    echo "Resume Pemesanan:<br>";
    echo "Nama Pemesan: $nama_pemesan<br>";
    echo "No HP: $nohp<br>";
}
?>
