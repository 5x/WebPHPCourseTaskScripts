<?php

/******************************************************************************
 * Создайте строку «Я не люблю PHP». Используя функции работы со строками,
 * замените «не» на «очень». Подсчитайте и выведите количество символов в
 * строке. Выведите текущие дату и время.
 *****************************************************************************/

date_default_timezone_set('Europe/Kiev');

$str = 'Я не люблю PHP';

$str = str_replace('не', '\'очень\'', $str);

echo($str . "\nCount: " . strlen($str) . "\nDate: " . date('Y-m-d H:i:s'));
