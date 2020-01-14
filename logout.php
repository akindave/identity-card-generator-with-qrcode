<?php
session_start();	
    unset($_SESSION['login_student']);
    unset($_SESSION['login_student_name']);
    unset($_SESSION['login_student_dept'] );
    unset($_SESSION['login_student_picture'] );
    unset($_SESSION['login_student_amount']);
    unset($_SESSION['login_student_prog']);

header("location:login.php");
?>