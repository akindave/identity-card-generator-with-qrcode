<?php
include('../Classes/DB.php');
session_start();
$username = $_POST['id'];
$password = $_POST['password'];

$result = DB::getInstance()->query_this("select * from lecturer_details where staff_id = '{$username}' and password='{$password}'");
if($result){
    $_SESSION['library_staff'] = $username;
    echo "true";
}else{
    echo "false";
}
?>
