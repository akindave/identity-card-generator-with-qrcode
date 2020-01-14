<?php
session_start();
    unset($_SESSION['login_seller']);
    unset($_SESSION['login_seller_name']);
   // unset($_SESSION['login_seller_dept'] );
    unset($_SESSION['login_seller_picture'] );
    unset($_SESSION['login_seller_amount']);
    //unset($_SESSION['login_student_prog']);

header("location:login.php");
?>