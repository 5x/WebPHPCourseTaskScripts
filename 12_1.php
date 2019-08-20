<?php

/******************************************************************************
 * Средствами SAX создайте XML-парсер. Создайте и назначьте обработчики
 * начальных и конечных тегов и текстовых узлов. Распарсите документ cars.xml
 * и выведите его содерфимое в таблице.
 *****************************************************************************/

$xml = xml_parser_create("UTF-8");

define('XML_NODE', 'CATALOG');
define('XML_ITEM', 'ITEM');

function start_tag_parse($xml, $tag, $attib) {
    if ($tag != XML_NODE) {
        echo ($tag == XML_ITEM) ? '<tr>' : '<td>';
    }
}

function end_tag_parse($xml, $tag) {
    if ($tag != XML_NODE) {
        echo ($tag == XML_ITEM) ? '</tr>' : '</td>';
    }
}

function character_parse($xml, $data) {
    echo $data;
}

$xml = xml_parser_create("UTF-8");
xml_set_element_handler($xml, "start_tag_parse", "end_tag_parse");
xml_set_character_data_handler($xml, "character_parse");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>12_1</title>
</head>
<body>
<h1>Lab 12_1</h1>

<table width="100%" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th align="left">Марка</th>
        <th align="left">Модель</th>
        <th align="left">Рік виготовлення</th>
        <th align="left">Пробіг (тис.км.)</th>
        <th align="left">Колір</th>
        <th align="left">Цена</th>
    </tr>
    </thead>
    <tbody>
    <?php xml_parse($xml, file_get_contents("12-13cars.xml")); ?>
    </tbody>
</table>
</body>
</html>