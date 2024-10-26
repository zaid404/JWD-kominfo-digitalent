<html>
    <heade>
        <title>Aritmatika</title>
</hehad>
<body>
    <h1>Form inputan</h1>
    <form action="" method="post">
        <label for="var1">Var 1:</label>
        <input type="number" name="var1" id="var1" requred>
        <br><br>
        <lable for="var2">var 2:</lable>
        <input type="number" name="var2" id="var2" requred>
        <br><br>
        <lable for="operasi"> operasi:</lable><br>
        <input type="radio" id="tambah" name="operator" value="tambah">
        <label for="tambah">tambah</label><br>
        <input type="radio" id="kurang" name="operator" value="kurang">
        <label for="kurang">kurang</label><br>
        <input type="radio" id="kali" name="operator" value="kali">
        <label for="kali">kali</label>
        <br>
        <input type="radio" id="basgi" name="operator" value="bagi">
        <label for="bagi">bagi</label><br>
        <input type="submit" value="hitung" name="submit">

</body>
<?php
if (isset($_POST['submit'])) {
    $var1 = $_POST['var1'];
    $var2 = $_POST['var2'];
    $operator = $_POST['operator'];
    $result = 0;
    $operation = '';

    // Menggunakan if-else untuk menentukan operasi
    if ($operator == 'tambah') {
        $result = $var1 + $var2;
        $operation = 'penjumlahan';
    } elseif ($operator == 'kurang') {
        $result = $var1 - $var2;
        $operation = 'pengurangan';
    } elseif ($operator == 'kali') {
        $result = $var1 * $var2;
        $operation = 'perkalian';
    } elseif ($operator == 'bagi') {
        if ($var2 != 0) {
            $result = $var1 / $var2;
            $operation = 'pembagian';
        } else {
            echo "Tidak bisa membagi dengan nol.";
            exit;
        }
    } else {
        echo "Operasi tidak valid.";
        exit;
    }

    echo "<br><br>Hasil $operation dari $var1 dan $var2 adalah: $result";
}
?>
