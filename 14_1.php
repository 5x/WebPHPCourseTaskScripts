<?php

/******************************************************************************
 * Создайте изображение True Color и включте сглаживание. Определите набор
 * цветов. Отправьте соответствующий HTTP-заголовок и выведите изображение на
 * страницу.
 *****************************************************************************/

$width = 480;
$height = 300;
$half_height = $height / 2;
$gutter = 20;
$double_gutter = $gutter * 2;
$inner_height = $height - $gutter;
$center_width = $height * 0.75;

$img = imagecreatetruecolor($width, $height);
imageantialias($img, true);

$white = imagecolorallocate($img, 255, 255, 255);
$red = imagecolorallocate($img, 200, 20, 0);
$yellow = imagecolorallocate($img, 255, 200, 20);
$green = imagecolorallocate($img, 15, 150, 50);

$triangle = array($half_height, $half_height, $inner_height, $center_width / 2,
    $inner_height, $inner_height, $half_height, $half_height);

imagefilledrectangle($img, 0, 0, $width, $height, $red);
imagefilledrectangle($img, $gutter, $gutter, $width - $gutter,
                     $inner_height, $white);
imagefilledellipse($img, $half_height, $half_height, $center_width,
                   $center_width, $yellow);
imagefilledpolygon($img, $triangle, count($triangle) / 2, $white);
imagefilledellipse($img, $half_height + $gutter, $center_width / 2 - $gutter,
                   $double_gutter, $double_gutter, $white);

$bounce_colors = array($green, $red, $yellow);
$step = count($bounce_colors);

for ($i = 1; $i <= $step; $i++) {
    imagefilledellipse($img, $width - $gutter * $step * $i, $half_height,
                       $gutter, $gutter, $bounce_colors[$i - 1]);
}

header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
