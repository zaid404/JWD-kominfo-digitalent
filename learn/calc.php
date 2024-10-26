<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .calculator {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .calculator h1 {
            margin-bottom: 20px;
        }
        .calculator input[type="text"] {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1.2em;
            text-align: right;
        }
        .calculator button {
            margin: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            background-color: #f8f9fa;
        }
        .calculator button.operator {
            background-color: #28a745;
            color: white;
        }
        .calculator button.operator:hover {
            background-color: #218838;
        }
        .calculator button.error {
            background-color: #dc3545;
            color: white;
        }
        .calculator button.error:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h1>Kalkulator PHP</h1>
        <form id="calcForm" action="" method="post">
            <input type="text" id="display" name="display" value="" readonly>
            <input type="hidden" name="expression" id="expression">
            <div>
                <button type="button" onclick="appendToDisplay('7')">7</button>
                <button type="button" onclick="appendToDisplay('8')">8</button>
                <button type="button" onclick="appendToDisplay('9')">9</button>
                <button type="button" class="operator" onclick="appendToDisplay('/')">÷</button>
            </div>
            <div>
                <button type="button" onclick="appendToDisplay('4')">4</button>
                <button type="button" onclick="appendToDisplay('5')">5</button>
                <button type="button" onclick="appendToDisplay('6')">6</button>
                <button type="button" class="operator" onclick="appendToDisplay('*')">×</button>
            </div>
            <div>
                <button type="button" onclick="appendToDisplay('1')">1</button>
                <button type="button" onclick="appendToDisplay('2')">2</button>
                <button type="button" onclick="appendToDisplay('3')">3</button>
                <button type="button" class="operator" onclick="appendToDisplay('-')">-</button>
            </div>
            <div>
                <button type="button" onclick="appendToDisplay('0')">0</button>
                <button type="button" onclick="appendToDisplay('.')">.</button>
                <button type="button" onclick="clearDisplay()">C</button>
                <button type="button" class="operator" onclick="appendToDisplay('+')">+</button>
            </div>
            <div>
                <button type="button" class="operator" onclick="calculateResult()">=</button>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $expression = $_POST['expression'];
            try {
                $result = eval('return ' . $expression . ';');
                echo "<div class='result'>Hasil: $result</div>";
            } catch (Exception $e) {
                echo "<div class='result error'>Error: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>

    <script>
        document.addEventListener('keydown', function(event) {
            const key = event.key;
            const validKeys = '0123456789+-*/.=()';
            
            if (validKeys.includes(key)) {
                if (key === '=' || key === 'Enter') {
                    calculateResult();
                } else if (key === 'Backspace') {
                    deleteLastCharacter();
                } else {
                    appendToDisplay(key);
                }
            }
        });

        function appendToDisplay(value) {
            const display = document.getElementById('display');
            const expression = document.getElementById('expression');
            if (display.value === "0" && value !== '.' && value !== '/') {
                display.value = value;
            } else {
                display.value += value;
            }
            expression.value = display.value;
        }

        function clearDisplay() {
            document.getElementById('display').value = '';
            document.getElementById('expression').value = '';
        }

        function calculateResult() {
            document.getElementById('calcForm').submit();
        }

        function deleteLastCharacter() {
            const display = document.getElementById('display');
            display.value = display.value.slice(0, -1);
            document.getElementById('expression').value = display.value;
        }
    </script>
</body>
</html>
