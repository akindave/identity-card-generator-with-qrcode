<?php
//include_once('DB.php');
include_once('authentications/studentAuth.php');

@$getter = $_GET['a'];
@$new = str_replace(":",",",$getter);
//$newer = str_replace(",","",$new);
//print_r($newer);
@$arr = (explode(',',$new));
if(!@$arr[1] || !@$arr[3] ){
    echo "<p style='color:grey'>OOPS! SORRY THE QR CODE IS NOT IN OUR STANDARD FORMAT</p>";
}else{
//$aha = array('david'=>'ssss');
//echo $arr[1];
//foreach($aha as $ar => $key){
// echo $ar.":".$key."</br>";
//}
//echo $arr[1];
StudentAuth::get_this_user_with($arr[1],strtolower($arr[3]));
}

?>
<!--
Parse error: syntax error, unexpected 'global' (T_GLOBAL) in C:\xampp\htdocs\Student_multip_idcard\lecturer_portal\authentications\studentAuth.php on line 5
