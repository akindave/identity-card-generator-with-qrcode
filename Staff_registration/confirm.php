<?php 
session_start();
include("db_connect.php"); 
if(isset($_POST['matric'])){
    $matric = $_POST['matric'];
	$sql = "SELECT * FROM student_information WHERE matric_no = '$matric'";
	$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
	$row = mysqli_num_rows($resultset);	
    if($row==1){
        $_SESSION['sav_mat']=$matric;
        $rows = mysqli_fetch_assoc($resultset);
        echo $rows['fullname'];
    }else{
        echo "f";
    }
}

if(isset($_POST['amount'])){
    $amount=$_POST['amount'];
    $mat = $_SESSION['sav_mat'];
    $sql = "SELECT * FROM student_information WHERE matric_no = '$mat'";
	$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
	$row = mysqli_num_rows($resultset);	
     if($row==1){
         $rows = mysqli_fetch_assoc($resultset);
        $get_old_amount = $rows['amount'];
         $new_amount = $get_old_amount + $amount;
        $sql = "UPDATE student_information SET amount = $new_amount WHERE matric_no = $mat";
         $resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
         if($resultset){
             echo "done";
             unset($_SESSION['sav_mat']);
         }else{
            echo "no";    
         }
     }
}
             
         

	
?>