<?php 
include('includes/header.php');


?>

	<!-- pricing -->
	<div class="pricing-app app-pages app-section">
		<div class="container">
			<div class="pages-title">
				<h3>STUDENT DASHBOARD</h3>
				
				<a href="seller_list.php"><h5 style="color:grey">PAY FOR A PRODUCT</h5></a>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="entry">
						<span>E-WALLET BALANCE</span>
						<h6></h6>
						
						<button class="btn btn-success">NGN <?php echo $db['amount'];?> </button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
                        <span>TRANSACTION LOG</span>
                        <h6></h6>
						<a href="translog.php"><button class="btn btn-success" >VIEW</button></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<div class="entry">
						<span>NO OF COURSES</span>
						<h6></h6>
						
						<button class="btn btn-success">7</button>
					</div>
				</div>
				<div class="col s6">
					<div class="entry">
						<span>PROFILE</span>
						<h6></h6>
						<a href="profile.php"><button class=" btn btn-success">VIEW</button></a>
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