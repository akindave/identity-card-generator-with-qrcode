<?php
include('../Classes/DB.php');
session_start();
$username = $_POST['id'];
$password = $_POST['password'];

$result = DB::getInstance()->query_this("select * from lecturer_details where staff_id = '{$username}' and password='{$password}'");
if($result){
	$row = DB::getInstance()->get_by_id($username);
    $_SESSION['login_staff'] = $username;
    $_SESSION['login_staff_name'] = $row['name'];
    echo "true";
}else{
    echo "false";
}
?>
