<?php

/******************************************************************************
 * Напишите сценарий, который через каждые 5 секунд будет перегружать страницу.
 * Добавьте вывод текущего времени при каждой перезагрузке.
 *****************************************************************************/

$sec = "5";

header("Refresh: $sec;");
date_default_timezone_set('Europe/Kiev');

echo date('Y-m-d H:i:s');