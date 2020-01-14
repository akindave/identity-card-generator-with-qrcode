<?php
session_start();   
include("db_connect.php"); 
 
if(isset($_POST['login_button'])) {
	$user_email = trim($_POST['user_email']);
	$user_password = trim($_POST['password']);
	
	$sql = "SELECT * FROM admin WHERE email ='$user_email' && password ='$user_password'";
	$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
	$row = mysqli_fetch_assoc($resultset);	
	
				
	if($row['password']==$user_password){				
		
        setcookie("adminid",$user_password,time()+(60*60*24*7));
        setcookie("adminemail",$user_email,time()+(60*60*24*7));
		echo "ok";		
		
	}
	
	
	else {				
		echo "email or password does not exist."; // wrong details 
	       }		
}


 	
?>