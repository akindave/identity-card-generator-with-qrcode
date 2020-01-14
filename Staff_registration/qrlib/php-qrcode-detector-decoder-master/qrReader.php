<?php
require 'lib/QrReader.php';
$files = scandir('img'); 
//print_r($file);
foreach ($files as $file){
if($file == '.' || $file =='..'){
	continue;
}else{
	
	$qrcode = new QrReader('img/'.$file);
	$text = $qrcode->text();
	echo $text.'<br/>';
}
}
 ?>
