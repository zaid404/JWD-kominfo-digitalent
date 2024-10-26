<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arithmetic Form</title>
</head>
<body>
    <form action="" method="post">
        <label for="var1">Variable 1:</label>
        <input type="number" name="var1" id="var1">
        
        <label for="var2">Variable 2:</label>
        <input type="number" name="var2" id="var2">
        
        <label for="operator">Operation:</label>
        <select name="operator" id="operator" required>
            <option value="jumlah">Add</option>
            <option value="kurang">Subtract</option>
        </select>
        
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $variable1 = $_POST['var1'];
    $variable2 = $_POST['var2'];
    $operator = $_POST['operator'];
    
    switch ($operator) {
        case 'jumlah':
            $result = $variable1 + $variable2;
            $operation = '+';
            break;
        case 'kurang':
            $result = $variable1 - $variable2;
            $operation = '-';
            break;
        default:
            $result = 'Invalid operation';
            $operation = '';
    }

    echo "Hasilnya adalah: $variable1 $operation $variable2 = $result";
}
?>
