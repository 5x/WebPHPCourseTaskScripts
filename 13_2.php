<?php

/******************************************************************************
 * Создайте объект на базе класса DOMDocument и загрузите в него XML-документ.
 * Средствами DOM распарсите документ и выведите данные на страницу в таблице.
 *****************************************************************************/

function printDomDoc() {
    $dom = new DomDocument();
    $dom->load('12-13cars.xml');
    $item_tags = array('brand', 'mark', 'year', 'mileage', 'color', 'price');
    foreach ($dom->documentElement->childNodes as $catalog) {
        if ($catalog->nodeType == 1 && $catalog->nodeName == "item") {
            echo '<tr>';
            foreach ($catalog->childNodes as $item) {
                foreach ($item_tags as $tag) {
                    if ($item->nodeType == 1 && $item->nodeName == $tag) {
                        echo '<td>' . $item->textContent . "</td>";
                    }
                }
            }
            echo '</tr>';
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>13_2</title>
</head>
<body>
<h1>Lab 13_2</h1>

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
    <?php printDomDoc() ?>
</table>
</body>
</html>

