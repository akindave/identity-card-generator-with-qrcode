<?php 
include('includes/header.php');
$id = $_SESSION['login_seller_id'];
$db = DB::getInstance()->query_two("select * from transaction_log where receiver = '{$id}' and status='success'");


?>

	<!-- pricing -->
	<div class="pricing-app app-pages app-section">
		<div class="container">
			<div class="pages-title">
				<h3>TRANSACTION LOG</h3>
				
			</div>
			<div class="row">
				<div class="col s12">
					<div class="entry">
						<table class="table bordered">
						<thead>
						<th>S/N</th>
						<th>RECEIVER</th>
						<th>AMOUNT</th>
						<th>DATE/TIME</th>
						<th>STATUS</th>
						</thead>
						<tbody>
						<?php 
						$a=1;
						while($r = $db->fetch()){
							$db2 = DB::getInstance()->query_two("select * from student_information where matric_no = '{$r['payee']}'");
							$r2 = $db2->fetch();
							?>
						<tr>
						
							<td><?php echo $a; ?></td>
							<td><?php echo $r2['fullname']; ?></td>
							<td><?php echo $r['amount']; ?></td>
							<td><?php echo $r['date_time']; ?></td>
							<td><?php echo $r['status']; ?></td>
						</tr>
						<?php 
						$a++;
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