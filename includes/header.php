
<?php 
session_start();
include('Classes/DB.php');

if(isset($_SESSION['login_student'])){
$id = $_SESSION['login_student'];	
$db = DB::getInstance()->fetch_all("student_information","matric_no",$id);
}

?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from rabonadev.xyz/smooth/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Sep 2019 21:14:36 GMT -->
<head>
	<meta charset="UTF-8">
	<title>General Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="HandheldFriendly" content="True">
	
	<link rel="shortcut icon" href="img/favicon.png">
	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/materialize.min.css">
	<script src="js/jquery.min.js"></script>
    <script src="script/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="script/sweetalert.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
      <script type="text/javascript" src="js/llqrcode.js"></script>
    <script type="text/javascript" src="js/webqr.js"></script>
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.transitions.css">
	<link rel="stylesheet" href="css/lightbox.min.css">
	<link rel="stylesheet" href="css/style.css">
	
</head>
<body>

	<!-- navbar -->
	<div class="navbar">
		<div class="container">
			<div class="panel-control-left">
				<a href="#" data-activates="slide-out-left" class="sidenav-control"><i class="fa fa-align-left"></i></a>
			</div>
			<div class="site-title">
                <?php
                if(!isset($_SESSION['login_student_name'] )){
                $user = "Guest";
              
                }else{
                    $user =$_SESSION['login_student_name'] ;  
                    //$price =20000;
                }
                ?>
				<a href="index.php" class="logo"><span class="fa fa-user"> Welcome <?php echo $user; ?></span></a><?php if(isset($_SESSION['login_student_picture'])){?><img src="student_image/<?php echo $_SESSION['login_student_picture'];?>" width="35px" height="35px" style="border-radius:40px"/><?php }?>
			</div>
             <?php
                if(isset($_SESSION['login_student'] )){?>
			<div class="panel-control-right">
				<i class="fa fa-briefcase"></i>
                <?php echo $db['amount']; ?>
			</div>
            <?php }?>
			<p ><a href="student_dash.php" style="color:blue;">GO BACK HOME</a></p>
		</div>
	</div>
	<!-- end navbar -->

	<!-- panel control -->
	<div class="panel-control-left">
		<ul id="slide-out-left" class="side-nav collapsible"  data-collapsible="accordion">
			<li>
				<div class="photos">
					<img src="student_image/<?php echo $_SESSION['login_student_picture']; ?>" alt="">
					<?php 
					if(isset($_SESSION['login_student_name'])){
						?>
					<h3><?php echo $_SESSION['login_student_name']; ?> </h3>
					<?php }else{
						echo "<h3>GUEST</h3>";
					}?>
				</div>
			</li>
			<!--<li class="first-list">
				<div class="collapsible-header"><i class="fa fa-home"></i>Home <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="side-nav-panel">
						<li><a href="index-2.html">Home</a></li>
						<li><a href="home-store.html">Home Store</a></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="collapsible-header"><i class="fa fa-shopping-bag"></i>Store <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="side-nav-panel">
						<li><a href="home-store.html">Home Store</a></li>
						<li><a href="product-details.html">Product Details</a></li>
						<li><a href="shopping-cart.html">Shopping Cart</a></li>
						<li><a href="checkout.html">Checkout</a></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="collapsible-header"><i class="fa fa-rss"></i>Blog <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="side-nav-panel">
						<li><a href="blog.html">Blog</a></li>
						<li><a href="blog-single.html">Blog Single</a></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="collapsible-header"><i class="fa fa-support"></i>Features <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="side-nav-panel">
						<li><a href="accordion.html">Accordion</a></li>
						<li><a href="calendar.html">Calendar</a></li>
						<li><a href="carousel.html">Carousel</a></li>
						<li><a href="carousel2.html">Carousel 2</a></li>
						<li><a href="chat.html">Chat</a></li>
						<li><a href="collapsible.html">Collapsible</a></li>
						<li><a href="grid.html">Grid</a></li>
						<li><a href="features.html">Features</a></li>
						<li><a href="icons.html">Icons</a></li>
						<li><a href="modals.html">Modals</a></li>
						<li><a href="parallax.html">Parallax</a></li>
						<li><a href="service.html">Service</a></li>
						<li><a href="slider.html">Slider</a></li>
						<li><a href="table.html">Table</a></li>
						<li><a href="tabs.html">Tabs</a></li>
						<li><a href="timeline.html">Timeline</a></li>
						<li><a href="audio.html">Audio</a></li>
						<li><a href="video.html">Video</a></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="collapsible-header"><i class="fa fa-image"></i>Gallery <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="side-nav-panel">
						<li><a href="gallery1.html">Gallery 1</a></li>
						<li><a href="gallery2.html">Gallery 2</a></li>
						<li><a href="gallery3.html">Gallery 3</a></li>
						<li><a href="gallery-card1.html">Gallery Card 1</a></li>
						<li><a href="gallery-card2.html">Gallery Card 2</a></li>
						<li><a href="gallery-card3.html">Gallery Card 3</a></li>
						<li><a href="gallery-circle1.html">Gallery Circle 1</a></li>
						<li><a href="gallery-circle2.html">Gallery Circle 2</a></li>
						<li><a href="gallery-circle3.html">Gallery Circle 3</a></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="collapsible-header"><i class="fa fa-th-large"></i>Portfolio <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="side-nav-panel">
						<li><a href="portfolio1.html">Portfolio 1</a></li>
						<li><a href="portfolio2.html">Portfolio 2</a></li>
						<li><a href="portfolio3.html">Portfolio 3</a></li>
						<li><a href="portfolio-card1.html">Portfolio Card 1</a></li>
						<li><a href="portfolio-card2.html">Portfolio Card 2</a></li>
						<li><a href="portfolio-card3.html">Portfolio Card 3</a></li>
						<li><a href="portfolio-circle1.html">Portfolio Circle 1</a></li>
						<li><a href="portfolio-circle2.html">Portfolio Circle 2</a></li>
						<li><a href="portfolio-circle3.html">Portfolio Circle 3</a></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="collapsible-header"><i class="fa fa-file-powerpoint-o"></i>Pages <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="side-nav-panel">
						<li><a href="about.html">About Us</a></li>
						<li><a href="404.html">404 Page</a></li>
						<li><a href="faq.html">Faq</a></li>
						<li><a href="client.html">Client</a></li>
						<li><a href="team.html">Team</a></li>
						<li><a href="pricing.html">Pricing</a></li>
						<li><a href="coming-soon.html">Coming Soon</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="forum.html">Forum</a></li>
						<li><a href="forum-single.html">Forum Single</a></li>
						<li><a href="gallery2.html">Gallery</a></li>
						<li><a href="portfolio2.html">Portfolio</a></li>
						<li><a href="maintenance.html">Maintenance</a></li>
						<li><a href="process.html">Process</a></li>
						<li><a href="service.html">Service</a></li>
						<li><a href="step.html">Step</a></li>
						<li><a href="testimonial.html">Testimonial</a></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="collapsible-header"><i class="fa fa-mobile"></i>App <span><i class="fa fa-chevron-right"></i></span></div>
				<div class="collapsible-body">
					<ul class="side-nav-panel">
						<li><a href="calendar.html">Calendar</a></li>
						<li><a href="chat.html">Chat</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="register.html">Register</a></li>
						<li><a href="reset-password.html">Reset Password</a></li>
						<li><a href="setting.html">Settings</a></li>
					</ul>
				</div>
			</li>
			<li>
				<a href="contact.html"><i class="fa fa-envelope"></i>Contact us</a>
			</li>-->
			<?php 
			if(!isset($_SESSION['login_student_name'] )){?>
			<li>
				<a href="login.php"><i class="fa fa-sign-in"></i>Login</a>
			</li>
			<?php }else{?>
			<li>
				<a href="#" class="logout"><i class="fa fa-sign-in "></i>Logout</a>
			</li>
			<?php } ?>
			
		</ul>
	</div>
	<!-- end panel control -->
	<script>
	$('.logout').click(function(){
		  window.location = "logout.php";
	  });
	</script>