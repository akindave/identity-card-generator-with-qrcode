<?php 
include_once("db_connect.php");


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/bootstrap-editable.css">

<script src="js/bootstrap-editable.min.js"></script>

<title>
	<?php if(isset($website)){echo$website;}?>
	
</title>
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/login.js"></script>

<script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
	
<link href="css/style1.css" rel="stylesheet" type="text/css" media="screen">
    <!-- <link rel="stylesheet" href="style.css"> -->  
  
</head>
<body class="" style="background-color:#008080">
<div role="navigation" class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">	<?php if(isset($name)){echo$name;}?></a></li>           
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div>
           <div class="container">
	<h2></h2>		
	
	<form class="form-login" method="post" id="login-form">
		<h2 class="form-login-heading">Login Here</h2><hr />
		<div id="error">
		</div>
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
			<span id="check-e"></span>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" id="password" />
		</div>
		<hr />
		<div class="form-group">
			<button type="submit" class="btn btn-default" name="login_button" id="login_button">
			<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
		</div> 
	</form>	
	              				                                   				                                         				                          				        		
</div>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
</body>
</html>