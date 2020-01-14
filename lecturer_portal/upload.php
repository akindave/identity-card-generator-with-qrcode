<?php 
include('authentications/studentAuth.php');
$id = $_GET['Valuedel'];
StudentAuth::delete_something($id);


?>