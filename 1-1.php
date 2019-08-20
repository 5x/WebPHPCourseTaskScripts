<?php

/******************************************************************************
 * Создайте файл 1-1.php, содержащий 5 разных переменных, присвойте переменным
 * значения разного типа. Используя gettype() выведите тип каждой переменной.
 *****************************************************************************/

$boolean_var = true;
$integer_var = 5;
$double_var = 3.14;
$string_var = 'Hello Word';
$array_var = array('One' => 1, 'Two' => 2);

echo(gettype($boolean_var) . "\n" . gettype($integer_var) . "\n" .
    gettype($double_var) . "\n" . gettype($string_var) . "\n" .
    gettype($array_var));
