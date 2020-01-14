<?php
 
 $db = new mysqli("localhost","root","");
   if($db->connect_errno > 0){
         die('Unable to connect to database [' . $db->connect_error . ']');  } 
      
             mysqli_select_db($db,"multipurpose_idcard");
					 		

?>