<?php

/******************************************************************************
 * Создайте сценарий базовой аутентификации. Сценарий должен проверять учетные
 * данные и принимать решение о допуске / не допуске пользователя на страницу.
 *****************************************************************************/

$login = 'admin';
$pass = 'admin';

if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) &&
    $_SERVER['PHP_AUTH_USER'] == $login && $_SERVER['PHP_AUTH_PW'] == $pass &&
    !isset($_GET['logout'])
) {
    echo('Confirm! <a href="?logout=1">Log Out</a>');
} else {
    header("HTTP/1.0 401 Unauthorized");
    header('WWW-Authenticate: Basic');
    echo('<a href="?">Login to continue</a>');
}
