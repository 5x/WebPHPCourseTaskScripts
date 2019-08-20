<?php

/******************************************************************************
 * Считайте данные из файла, созданного в предыдущем задании, и выведите на
 * экран в HTML-таблице.
 *****************************************************************************/

$f_name = '5_login_dump.txt';

if (file_exists($f_name) && is_file($f_name) && is_readable($f_name)) {
    $file = fopen($f_name, 'r');

    echo('<table><thead><tr><th>Login</th><th>Password</th></tr></thead><tbody>');

    while (($line = fgets($file)) !== false) {
        list($email, $passwd) = explode(' ', $line);
        echo("<tr><td>$email</td><td>$passwd</td></tr>");
    }

    fclose($file);

    echo('</tbody></table>');
} else {
    echo('Can`t open file');
}
