<?php   
include('includes/header.php');
?>
	<!-- login-->
	<div class="login app-pages app-section">
		<div class="container">
			<div class="pages-title">
				<h3>Login</h3>
			</div>
			<form>
				<div class="input-field">
					<input id="mat" type="text" >
					<label for="mat">Matric No:</label>
				</div>
				<div class="input-field">
					<input id="password" type="password">
					<label for="password">Password</label>
				</div>
				<div id="msg"></div>
<!--				<div><a href="#" class="forgot">Forgot Password?</a></div>-->
				<div class="chebox">
					<input type="checkbox" id="checkbox" />
  					<label for="checkbox">Remember me</label>
				</div>
				<button class="button" type="button" onclick="login()">Login</button>

			</form>
			
		</div>
	</div>
	<!-- end login -->
	
	<!-- footer -->
	<footer>
		
		<div class="ft-bottom">
			<span>Copyright © 2019 EYIARO AYOBAMI </span>
		</div>
	</footer>
	<!-- end footer -->
	<script>
        function login(){
            var matric = $('#mat').val();
            var password = $('#password').val();
           // 
        $.ajax
        ({
            type: "POST",
            url: "login_val.php",
            data: {
                matric:matric,
                password:password
            },
            cache: false,
            success: function(data)
            {
            if(data=="true"){
                   window.location="student_dash.php";
                   // test purpose $('#msg').html('good');
            }else if(data=="false"){
                $('#msg').html('Incorrect Login Details');
            }
            //$('#msg').html(data);
            } 
        });

            
        }
  
	</script>
	<!-- script -->
	<script src="js/jquery.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/custom.js"></script>

</body>

<!-- Mirrored from rabonadev.xyz/smooth/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Sep 2019 21:18:34 GMT -->
</html>