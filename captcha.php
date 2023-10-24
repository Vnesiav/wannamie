<?php 
session_start();

$str_rand = md5(rand());

$str = substr($str_rand, 0,6);

$_SESSION['captcha'] = $str;

$newImage = imagecreate(80, 30);
imagecolorallocate($newImage, 233, 189, 147);
$col=imagecolorallocate($newImage, 0, 0, 0);
imagestring($newImage, 29, 10, 8, $str, $col);
header('content:image/jpeg');
imagejpeg($newImage);
?>