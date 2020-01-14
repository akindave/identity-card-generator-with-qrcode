<?php
include('Classes/DB.php');
session_start();
$username = $_POST['matric'];
$password = $_POST['password'];

$result = DB::getInstance()->query_this("select * from student_information where matric_no = '{$username}' and password='{$password}'");
if($result){
	$row = DB::getInstance()->get_by_id($username);
    $_SESSION['login_student'] = $username;
    $_SESSION['login_student_name'] = $row['fullname'];
    $_SESSION['login_student_dept'] = $row['department'];
    $_SESSION['login_student_picture'] = $row['pictures'];
    $_SESSION['login_student_amount'] = $row['amount'];
    $_SESSION['login_student_prog'] = $row['programme'];
	
    echo "true";
}else{
    echo "false";
}
?>
