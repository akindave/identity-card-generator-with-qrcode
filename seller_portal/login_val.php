<?php
include('Classes/DB.php');
session_start();
$username = $_POST['regid'];
$password = $_POST['password'];

$result = DB::getInstance()->query_this("select * from seller_table where registration_id = '{$username}' and password='{$password}'");
if($result){
	$row = DB::getInstance()->get_by_id($username);
    $_SESSION['login_seller'] = $username;
    $_SESSION['login_seller_id'] = $row['id'];
    $_SESSION['login_seller_name'] = $row['fullname'];
    $_SESSION['login_seller_business_name'] = $row['business_name'];
    $_SESSION['login_seller_picture'] = $row['picture'];
    $_SESSION['login_seller_amount'] = $row['amount'];
    
	
    echo "true";
}else{
    echo "false";
}
?>
