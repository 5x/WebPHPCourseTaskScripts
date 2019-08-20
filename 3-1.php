<?php

/******************************************************************************
 * Создайте форму с тремя полями: num1, num2, operator. Создайте скрипт
 * калькулятора, который принимает значения, проводит соответствующие
 * вычисления и выводит результат.
 *****************************************************************************/

if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operator'])) {
    $a = filter_var($_GET['num1'], FILTER_SANITIZE_NUMBER_FLOAT,
                    FILTER_FLAG_ALLOW_FRACTION);
    $b = filter_var($_GET['num2'], FILTER_SANITIZE_NUMBER_FLOAT,
                    FILTER_FLAG_ALLOW_FRACTION);

    if (filter_var($a, FILTER_VALIDATE_FLOAT) !== false &&
        filter_var($b, FILTER_VALIDATE_FLOAT) !== false
    ) {
        switch ($_GET['operator']) {
            case '+':
                $result = $a + $b;
                break;
            case '-':
                $result = $a - $b;
                break;
            case '*':
                $result = $a * $b;
                break;
            case '/':
                if ($b != 0) {
                    $result = $a / $b;
                }
                break;
            case '%':
                if ($b != 0) {
                    $result = $a / $b;
                }
                break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lab3</title>
</head>
<body>
<form action="3-1.php" method="GET">
    <label for="num1">num1: </label>
    <input type="text" name="num1" id="num1">
    <label for="num2">num2: </label>
    <input type="text" name="num2" id="num2">
    <label for="operator">operator: </label>
    <select name="operator" id="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
        <option value="%">%</option>
    </select>
    <button type="submit">OK</button>
    <p><?= isset($result) ?
            'Result(' . $a . $_GET['operator'] . $b . ') = ' . $result :
            'Incorrect input data'
        ?></p>
</form>
</body>
</html>
