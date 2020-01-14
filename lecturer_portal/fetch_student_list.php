<?php
//include_once('DB.php');
include('authentications/studentAuth.php');
if(isset($_GET['sender'])){
    if(!isset($_SESSION['allist'])){
        $_SESSION['allist'][]=StudentAuth::display_table_of_student();
    }else{
        if(in_array(StudentAuth::display_table_of_student(),$_SESSION['allist'])){
           // echo "Scan Already";
        }else{
           $_SESSION['allist'][]=StudentAuth::display_table_of_student();  
        }
    }
    
    

    
  // echo "ttttttt";      
 
                            if(isset($_SESSION['allist'])){
                            
                            
        
        //print_r("ss:".$value."<br/>");
                            }?>
                              <table class="table table-bordered">
                               <tr>
                                    <thead> 
                                        <th>S/N</th>
                                       <th>Matric No:</th> 
                                       <th>Name:</th> 
                                       <th>Action</th> 
									   
                                    </thead>
                                </tr>
                                
                            <?php 
                                  $a=1;
                            foreach($_SESSION['allist'] as $key=>$value){
                           // foreach($value as $keys=>$values){
                                
                                ?>
                                    <tbody>
                                        <tr>
                                            <td id="sn"><?php echo $a; ?></td>
                                            <td id="matric"><?php echo $value[0]; ?></td>
                                            <td id="names"><?php echo $value[1]; ?></td>
                                            <td id="del"><a data-id="<?php echo $key; ?>" class="btn btn-danger open-Delete"><span>Remove</span></td>
                                        </tr>
<!--
                                        <tr>
                                            <td>2</td>
                                            <td>160404019</td>
                                            <td>Akintan david luwagbounmi</td>
                                        </tr>
                                         <tr>
                                             <td>3</td>
                                            <td>160404019</td>
                                            <td>Akintan david luwagbounmi</td>
                                        </tr>
                                         <tr>
                                             <td>4</td>
                                            <td>160404019</td>
                                            <td>Akintan david luwagbounmi</td>
                                        </tr>
                                         <tr>
                                             <td>5</td>
                                            <td>160404019</td>
                                            <td>Akintan david luwagbounmi</td>
                                        </tr>
-->
                                    </tbody>
                                  <?php 
                                $a= $a+1;
                            }
        echo"</table>";
     echo '<button type="button" class="btn btn-info" onClick="doneList()">Done</button>';
    
                                
        }
?>
<!--

//if(isset($_SESSION['attendace_list_of_student'])){
//$_SESSION['attendace_list_of_student'][] = StudentAuth::display_table_of_student();
//}elseif(!isset($_SESSION['attendace_list_of_student'])){
//  $_SESSION['attendace_list_of_student'] = StudentAuth::display_table_of_student();
//}
//}
//
//if(isset($_SESSION['attendace_list_of_student'])){
//    print_r($_SESSION['attendace_list_of_student']);
//}
-->


<!--
Parse error: syntax error, unexpected 'global' (T_GLOBAL) in C:\xampp\htdocs\Student_multip_idcard\lecturer_portal\authentications\studentAuth.php on line 5
