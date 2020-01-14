
<?php
session_start();
include("db_connect.php");
require "vendor/autoload.php";
if(!isset($_COOKIE['adminid'])&&$_COOKIE['adminemail']){ header('location:index.php');
      exit;}
	



$fromm=$_POST['startpoint'];
$too=$_POST['endpoint'];
$startsat=$_POST['receiptrange'];


$_SESSION['from']=$fromm;
$_SESSION['to']=$too;
$_SESSION['receiptrange']=$startsat;

$from=$_SESSION['from'];
$to=$_SESSION['to'];
$startsat=$_SESSION['receiptrange'];

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>card</title>
<style>
  body{
		  	background:#FFFFFF;
		  }
#bg {
 
  height: 370px;
 
  margin:10px;
 	float: left; 
 		
}

#id {
  width:250px;
  height:370px;
  position:absolute;
  opacity: 0.88;
font-family: sans-serif;

		  	transition: 0.4s;
		  	background-color: #FFFFFF;
		  		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
		  	transition: 0.4s;
		}

#id::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url('images/osustech.png');
  background-repeat:repeat-x;
  background-size: 250px 450px;
  opacity: 0.2;
  z-index: -1;
  text-align:center;
  
 
}
 .container{
		  	font-size: 12px;
		  	font-family: sans-serif;
		    
		  }
		 .id-1{
		  	transition: 0.4s;
		  	width:250px;
		  	height:370px;
		  	background: #FFFFFF;
		  	text-align:center;
		  	font-size: 16px;
		  	font-family: sans-serif;
		  	float: left;
		  	margin:auto;		  	
		  	margin-left:270px;
		  		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
		  	transition: 0.4s;

		  	
		  }
</style>
	</head>

	<body>
		<script type="text/javascript">	
 		
 	window.print();
 </script>
 
		  <?php  
		  $sqluse ="SELECT * FROM student_information WHERE id=1 ";
$retrieve = mysqli_query($db,$sqluse);
    $numb=mysqli_num_rows($retrieve); 
	while($foundk = mysqli_fetch_array($retrieve))
	                                     {
                                              $profile= $foundk['pictures'];
											  $name = $foundk['fullname'];
		                                  }

    
      $sqlmember ="SELECT * FROM student_information WHERE id>=$from && id<=$to";
			       $retrieve = mysqli_query($db,$sqlmember);
				                    $count=0;
                     while($found = mysqli_fetch_array($retrieve))
	                 {
                      $name=$found['fullname'];$mat_no=$found['matric_no'];$programme=$found['programme'];
                       $id=$found['id'];$dept=$found['department'];$email=$found['email'];
			                $count=$count+1;
						  $profile= $found['pictures'];
						  $qr = $found['qr_img_name'];
						  
						 
						  
		?>
		
      <div id="bg">
            <div id="id">
            	 <table>
        <tr> <td><?php  if($numb!=0 ){
                                      if($profile!=""){echo"<img src='images/osustech.png'  width='50px' height='50px' alt=''>";}
									else{
										 echo"<img src='images/osustech.png' alt='Avatar'  width='50px' height='50px'>";
									    }	   
                               }else{
			?>
        	<img src="images/osustech.png" alt="Avatar"  width="50px" height="50px"> <?php }?>
        	</td>
        <td><h5><b>ONDO STATE UNIVERSITY OF SCIENCE AND TECHNOLOGY</b></h5></td>
       </tr>        
    </table>    
				<center>
        <?php  
      	 

             	 	
             	 if($profile!=""){          
										   echo"<img src='../student_image/$profile' height='150px' width='150px' alt='' style='border: 2px solid black;'>";	   
									    }
								else{
									echo"<img src='admin/images/profile.jpg' height='150px' width='150px' alt='' style='border: 2px solid black;'>";	   
														     	
									} 
             	 	 ?>   </center> 
             	 	  <div class="container" align="center">
      
      	<p style="margin-top:2%">Name</p>
      	<p style="font-weight: bold;margin-top:-4%"><?php if(isset($name)){echo $name;} ?></p>
      	<p style="margin-top:-4%">Matric No:</p>
      	<p style="font-weight: bold;margin-top:-4%"><?php if(isset($mat_no)){ echo $mat_no;} ?></p>
       <p style="margin-top:-4%">Department:</p>
        <p style="font-weight: bold;margin-top:-4%"><?php if(isset($dept)){ echo $dept;} ?></p>
      	<p style="margin-top:-4%">Programme:</p>
      	<p style="font-weight: bold;margin-top:-4%"><?php if(isset($programme)){ echo $programme;} ?></p>      	
      	<p style="margin-top:-4%">HOLDER SIGNATURE</p>
            
      </div>
            </div>
                <div class="id-1">
    	 
                     	 <center><img src="images/osustech.png" alt="Avatar" width="90px" height="90px" >        
       <div class="container" align="center">
      <p style="margin:auto">The bearer whose photograph appears overleaf is a student of</p>
      	<h3 style="color:#00BFFF;margin-left:2%">ONDO STATE UNIVERSITY OF SCIENCE AND TECHNOLOGY</h3>
      <p style="margin:auto">If lost and found please return to the nearest police station</p>
        <hr align="center" style="border: 1px solid black;width:80%;margin-top:1%;"></hr> 

      	<p align="center" style="margin-top:-2%">Authorised Signature</p>
      		<p> <img src="../qrimages/<?php echo $qr; ?>" width="110px" height="110px">
      			</p>
      		 <?php echo"Property of Osustech"; ?> </center>
     </div>
</div>
    </div>
       <?php } ?>
    
	</body>
</html>
