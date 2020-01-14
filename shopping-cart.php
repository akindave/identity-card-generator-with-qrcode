<?php
ob_start();
include('includes/header.php');

session_start();

if(isset($_GET['seller'])){
    $_SESSION['seller'] = $_GET['seller']; 
}else{
	header('location:seller_list.php');
}

?>
	<!-- product cart -->
	<div class="product-cart app-pages app-section">
		<div class="container">
			<div class="pages-title">
				<h3>Shopping Cart</h3>
			</div>
			<div class="entry">
				<div class="cart-title">
					<div class="row">
						<div class="col s4">
							<img src="img/2.jpg" alt="">
						</div>
						<div class="col s7">
							<h6>FRIED RICE</h6>
						</div>
						<div class="col s1">
							<a href="#"><i class="fa fa-remove"></i></a>
						</div>
					</div>
					<div class="row">
						<div class="col s4">
							<h6>Quantity</h6>
						</div>
						<div class="col s8">
							<input type="number" value="1" id="selone">
						</div>
					</div>
					<div class="row">
						<div class="col s4">
							<h6>Price</h6>
						</div>
						<div class="col s8">
							<h6>NGN<span id="pone">850</span></h6>
						</div>
					</div>
				</div>
				<div class="cart-title s-title">
					<div class="row">
						<div class="col s4">
							<img src="img/5.jpg" alt="">
						</div>
						<div class="col s7">
							<h6>SLICE SPAG AND MEAT</h6>
						</div>
						<div class="col s1">
							<a href="#"><i class="fa fa-remove"></i></a>
						</div>
					</div>
					<div class="row">
						<div class="col s4">
							<h6>Quantity</h6>
						</div>
						<div class="col s8">
							<input type="number" value="1" id="seltwo">
						</div>
					</div>
					<div class="row">
						<div class="col s4">
							<h6>Price</h6>
						</div>
						<div class="col s8">
							<h6>NGN <span id="ptwo">650</span></h6>
						</div>
					</div>
				</div>
			</div>
			<div class="cart-total">
				<div class="row">
					<div class="col s8">
						<h6>FRIED RICE</h6>
					</div>
					<div class="col s4">
						<h6 id="friedall"></h6>
					</div>
					<div class="col s8">
						<h6>SLICE SPAG AND MEAT</h6>
					</div>
					<div class="col s4">
						<h6 id="spagall"></h6>
					</div>
					<div class="col s8">
						<h5>Total</h5>
					</div>
					<div class="col s4">
						<h5 id="total"></h5>
					</div>
                    <p id="msg"></p>
					<button class="button" id="con">Continue</button>
				</div>
			</div>
		</div>
	</div>
	<!-- end product cart -->

	<!-- footer -->
	<?php

    include('includes/footer.php');
    ?>


<script>
$(document).ready(function(){
      
    function cartprice(valone){
        var selval = $("#selone").val();
        var selvalt = $("#seltwo").val();
         var ival = $("#pone").text();
    var ivalt = $("#ptwo").text();
         $("#friedall").text(ival*selval);
    $("#spagall").text(ivalt*selvalt);
         var t1=ival*selval;
         var t2=ivalt*selvalt;
         var totl = t1+t2;
        $("#total").html(t1+t2);
     $(valone).change(function(){
    var selval = $("#selone").val();
    var selvalt = $("#seltwo").val();
    var ival = $("#pone").text();
    var ivalt = $("#ptwo").text();
        // alert(ival);
    var send = parseInt(selval);
    var sendt = parseInt(selvalt);
    $("#friedall").text(ival*selval);
    $("#spagall").text(ivalt*selvalt);
         var t1=ival*selval;
         var t2=ivalt*selvalt;
         var totl = t1+t2;
        $("#total").html(t1+t2);
         sendtotal(totl,t1,t2);
     });
        sendtotal(totl,t1,t2);
   
        
    }
    
    cartprice("#selone");
    cartprice("#seltwo");
    function sendtotal(totl,t1,t2){
        $("#con").click(function(){
            window.location = "checkout.php?id="+totl+"&&rice="+t1+"&&spag="+t2;
            //$("#msg").text(totl);
           
        });        
    }
    });


</script>
	