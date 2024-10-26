<html>
    <head>
        <title>Aritmatika</title>
    </head>
    <style>
            /* Optional: Additional styling for the button */
            .button {
                background-color: #1E90FF; /* Light blue color */
                color: black; /* Text color */
                border: none; /* Remove border */
                padding: 10px 20px; /* Padding */
                text-align: center; /* Center text */
                text-decoration: none; /* Remove underline */
                display: inline-block; /* Inline-block display */
                font-size: 16px; /* Font size */
                margin: 4px 2px; /* Margin */
                cursor: pointer; /* Pointer cursor on hover */
                border-radius: 5px; /* Rounded corners */
            }

            .button:hover {
                background-color: #00BFFF; /* Darker blue on hover */
            }
        </style>    
    <body>
        <h1>Form Inputan</h1>
        <form action="" method="post">
            <label for="var1">Var 1:</label>
            <input type="number" name="var1" id="var1" required>
            <br><br>
            
            <label for="var2">Var 2:</label>
            <input type="number" name="var2" id="var2" required>
            <br><br>
            
            <label for="operation">Operation:</label>
            <select name="operation" id="operation" required>
                <option value="add">Penjumlahan (+)</option>
                <option value="subtract">penguranagan (-)</option>
                <option value="multiply">perkalian (*)</option>
                <option value="divide">pembagian (/)</option>
            </select>
            <br><br>
            
            <input type="submit" value="Calculate" name="submit"class="button" >            
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $var1 = $_POST['var1'];
            $var2 = $_POST['var2'];
            $operation = $_POST['operation'];
            $result = 0;

            switch ($operation) {
                case 'add':
                    $result = $var1 + $var2;
                    break;
                case 'subtract':
                    $result = $var1 - $var2;
                    break;
                case 'multiply':
                    $result = $var1 * $var2;
                    break;
                case 'divide':
                    if ($var2 != 0) {
                        $result = $var1 / $var2;
                    } else {
                        echo "Division by zero is not allowed.";
                        exit;
                    }
                    break;
                default:
                    echo "Invalid operation.";
                    exit;
            }

            echo "<br><br>Hasil $operation dari $var1 dan $var2 adalah: $result";

        }
        ?>
    </body>
</html>
