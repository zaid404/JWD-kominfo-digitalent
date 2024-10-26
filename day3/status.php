<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
        }
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
    
    

</body>
<?php
if (isset($_GET['status']) && $_GET['status'] == 'sukses') {
    echo "<p>Pendaftaran berhasil!</p>";
    echo '<a href="Form-daftar.php">Kembali ke Pendaftaran</a><br>';
    echo '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuksZzgDV94fUD5rMW1bjAIwODg1KX-MrJPw&s" alt="sukses"><br>';
} else {
    echo "<p>Silakan lengkapi pendaftaran Anda.</p>";
    echo '<a href="Form-daftar.php">Kembali ke Pendaftaran</a><br>';
    echo '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCqZzRZvk3rqNnKgF3oc9pu3RjJGKNDfKAbA&s" alt="gagal"><br>';
}
?>


</html>
