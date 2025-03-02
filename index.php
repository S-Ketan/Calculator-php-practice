<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <input type="number" name="num1" placeholder="Enter first number" >
        <select name="operator" id="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num2" placeholder="Enter second number" >
        <button>Calculate</button>
    </form>

    <?php

    //Grab the form data
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num01 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = filter_input(INPUT_POST, "operator", FILTER_SANITIZE_SPECIAL_CHARS);

        //Check for errors
        $errors = false;
        if (empty($num01) || empty($num02)) {
            echo "<p class='error'>Please enter both numbers</p>";
            $errors = true;
        }
        if (!is_numeric($num01) || !is_numeric($num02)) {
            echo "<p class='error'>Please enter valid numbers</p>";
            $errors = true;
        }

        //Calculate if no errors
        if (!$errors) {
            $value = 0;
            switch ($operator) {
                case "add":
                    $result = $num01 + $num02;
                    break;
                case "subtract":
                    $result = $num01 - $num02;
                    break;
                case "multiply":
                    $result = $num01 * $num02;
                    break;
                case "divide":
                    $result = $num01 / $num02;
                    break;
                default:
                    echo "<p class='error'>Invalid operator</p>";
                    break;
            }
            echo "<p class='result'>The result is: $result</p>";
        }

    }
    ?>
</body>

</html>