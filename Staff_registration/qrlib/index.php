<?php
require_once("phpqrcode/qrlib.php");
$path = 'images/';
$img_name = '1604040103';
$file = $path.$img_name.".png";

//text to output
//$text = "Osustech";
//other examples include
$text ="Matric:1604040103,name:Owoyomi akinrutimshdgsjj,department:mathematical science,programme:computer science";
//QRcode::png("some text here");
QRcode::png($text, $file,'L', 12, 2);
echo "";
?>
