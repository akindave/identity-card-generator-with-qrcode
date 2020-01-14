<?php 

//include('../Classes/DB.php');
include('authentications/studentAuth.php');
if(isset($_GET['id'])){
 $result = StudentAuth::insert_this();
    if($result){
        echo '  <div class="input-group center all">';
        echo "<span class='fa fa-check fa-2x text-success'>RECORD SAVED SUCCESSFULLY!!!</span>";
        echo "<p><a href='index.php'>Go Home</a></p>";
        echo "<p><a href='course_list.php'>Scan more</a></p>";
        echo '  <div>';
    }
      //echo 'jjjj';
}

?>

