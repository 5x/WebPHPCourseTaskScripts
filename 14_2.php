<?php

/******************************************************************************
 * Создайте изображение на базе любого другого изображения. Отрисуйте на нем
 * произвольные объекты и подпишите его строкой текста при помощи
 * TrueType-шрифта bellb.ttf.
 *****************************************************************************/

$img = @imagecreatefrompng("image.png");

if (!$img) {
    die('Can`t open image');
}

$red = imagecolorallocate($img, 200, 20, 0);
$yellow = imagecolorallocate($img, 255, 200, 20);
$green = imagecolorallocate($img, 15, 150, 50);


imagefilledellipse($img, 100, 150, 25, 25, $green);
imagefilledellipse($img, 150, 150, 25, 25, $red);
imagefilledellipse($img, 200, 150, 25, 25, $yellow);

imagettftext($img, 8, 0, 20, 20, $red, "bellb.ttf", "Hello word");

header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
