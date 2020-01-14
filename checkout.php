<?php
include("includes/header.php");

?>
	<!-- end panel control -->
<style>

input[type="file"] {
    display: none;
}
</style>
	<!-- checkout -->
	<div class="checkout app-pages app-section">
		<div class="container">
			<div class="pages-title">
				<h3>Checkout</h3>
			</div>
			<div class="order">
				<h5 class="title">Your Order</h5>
				<div class="row">
					<div class="col s8">
						<h6>FRIED RICE</h6>
					</div>
					<div class="col s4 text-right">
						<h6>NGN <span><?php echo $_GET['rice']; ?></span></h6>
					</div>
					<div class="col s8">
						<h6>SLICE SPAG AND MEAT</h6>
					</div>
					<div class="col s4 text-right">
						<h6>NGN <span><?php echo $_GET['spag']; ?></span></h6>
					</div>
					<div class="col s8">
						<h5><span>Total</span></h5>
					</div>
					<div class="col s4 text-right">
						<h5>NGN <span><?php echo $_GET['id']; ?></span></h5>
					</div>
                    <p id="ff"></p>
					     <script async src="js/f.txt"></script>
                                            <div id="result"></div>
                                    <label for="file-upload" class="btn  btn-info btn-md " id="after">Scan qrcode to complete payment</label>
                                              <input type="file" id="file-upload" accept="image/*" capture="camera" onchange="handleFiles(this.files)"/>
				</div>
			</div>
            
            <script>
setimg();	

</script>

       
                                    
			
		</div>
	</div>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<canvas id="qr-canvas" width="800" height="600"></canvas>
<script type="text/javascript">load();</script>
<script>

   function fina(){
       var pass = $('#confirm_pass').val();
       var mat = $('#matt').val();
       var total = "<?php echo $_GET['id']; ?>";
        swal({
                                         title: "Are you sure?",
                                         text: "You about to pay <?php echo $_GET['id']; ?>",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, Proceed!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
            
                                      if (isConfirm) {   
                                            $.ajax ({
                                                      type : 'GET',
                                                      url: "check_pass.php",
                                                      data: {pass:pass,
                                                             mat:mat,
                                                             total:total
                                                            },
                                                      success: function(result) {
                                                                     if(result=="no"){
																		 
																		 swal({title: "LOW BALANCE", text: "Sorry Insufficient Balance.Your Remaining balance is:NGN3000", type: "error"},
                                                          function(){ 
                                                                          window.location="student_dash.php";
                                                                          }
                                                                      ); 
																	 }else if(result=="yes"){
																		  swal({title: "PROCESSED", text: "PAYMENT SUCCESSFUL", type: "success"},
                                                          function(){ 
                                                                          window.location="student_dash.php";
                                                                          }
                                                                      ); 
																	 }  
                                                                                                  	                        
                                                                 }

                                                       }
                                                  );
                                                  	 
                                                        } else {
	                                                           swal("Cancelled", "Payment Cancelled", "error");
                                                          }
                                                    });
                                               
                                         };
  
//       
//       $("#loading").html('<img src="img/ajax-loader.gif" /> &nbsp; Processing...');
//					setTimeout(' window.location.href = "#"; ',3000);
//       
  
</script>
	<!-- end checkout -->
	
	<!-- footer -->
<?php 
include("includes/footer.php");

?>