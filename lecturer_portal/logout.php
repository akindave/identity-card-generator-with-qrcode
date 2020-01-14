<?php
session_start();
unset($_SESSION['login_staff']);
header('location:index.php');


?>