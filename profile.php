<?php 
include('includes/header.php');
$id = $_SESSION['login_student'];
$db = DB::getInstance()->query_two("select * from student_information where matric_no = '{$id}'");


?>

	<!-- pricing -->
	<div class="pricing-app app-pages app-section">
		<div class="container">
			<div class="pages-title">
				<h3>PROFILE</h3>
				
			</div>
			<div class="row">
				<div class="col s12">
					<div class="entry">
						<table class="table bordered">
						<thead>
						<th>FULL NAME</th>
						<th>MATRIC NO</th>
						<th>DEPARTMENT</th>
						<th>PROGRAMME</th>
						<th>EMAIL</th>
						
						
						</thead>
						<tbody>
						<?php 
						
						while($r = $db->fetch()){
							//$db2 = DB::getInstance()->query_two("select * from student_information where matric_no = '{$r['payee']}'");
							//$r2 = $db2->fetch();
							?>
						<tr>
						
							
							<td><?php echo $r['fullname']; ?></td>
							<td><?php echo $r['matric_no']; ?></td>
							<td><?php echo $r['department']; ?></td>
							<td><?php echo $r['programme']; ?></td>
							<td><?php echo $r['email']; ?></td>
							
						</tr>
						<?php 
						
						}?>
						</tbody>
						</table>
					</div>
				</div>
				
			</div>
		
		</div>
	</div>
	<!-- end pricing -->
<script>
//$(document).ready(function(){
//     swal({
//                                         title: "User removed successfully",
//                                         text: "Do you want to remove another one?",
//                                         type: "success",
//                                         showCancelButton: true,
//                                        confirmButtonColor: "green",
//                                        confirmButtonText: "OK!",
//                                        closeOnConfirm: true,
//                                        closeOnCancel: true,
//                                          buttonsStyling: false
//                                        },
//                     function(isConfirm){
//                                      if (isConfirm) {                                      	
//                                                         window.location ="administrator.php?id=2";
//                                                     } 
//                                           else {
//                                                        window.location ="administrator.php";
//                                                 }
//                                         });
//});

</script>
	
	<!-- footer -->
	<?php 
    include("includes/footer.php");
    ?>