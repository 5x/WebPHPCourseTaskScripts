<?php

/******************************************************************************
 * Средствами SimpleXML распарсите XML-документ cars.xml и выведите на
 * страницу в таблице.
 *****************************************************************************/

$xml = simplexml_load_file('12-13cars.xml');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>13_1</title>
</head>
<body>
<h1>Lab 13_1</h1>

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
    <?php foreach ($xml->item as $item) {
        echo '<tr>
			<td>' . $item->brand . '</td>
			<td>' . $item->mark . '</td>
			<td>' . $item->year . '</td>
			<td>' . $item->mileage . '</td>
			<td>' . $item->color . '</td>
			<td>' . $item->price . '</td>
		</tr>';
    } ?>
</table>
</body>
</html>
