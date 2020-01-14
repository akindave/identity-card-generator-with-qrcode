<?php
require __DIR__ . "/vendor/autoload.php";
$qrcode = new QrReader('img/5d868fe0736b0.png');
$text = $qrcode->text(); //return decoded text from QR Code
 ?>
