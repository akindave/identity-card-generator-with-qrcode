<?php 
session_start();
$id = $_GET['Valuedel'];
unset($_SESSION['allist'][$id]);
echo "ok";


?>