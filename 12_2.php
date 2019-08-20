<?php

/******************************************************************************
 * Опишите XSL-документ. Примените описанную таблицу стилей к XML-документу
 * cars.xml на стороне клиента. Проделайте то же самое на стороне сервера.
 *****************************************************************************/

$xml = new DOMDocument();
$xml->load('12-13cars.xml');

$xsl = new DOMDocument();
$xsl->load('12-13cars.xsl');

$processor = new XSLTProcessor();
$processor->importStylesheet($xsl);

$html = $processor->transformToXml($xml);
echo($html);
