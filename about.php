<?php
include_once ("z_db.php");
?><!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Onyx Data Systems" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>About Us | <?=$site_name;?></title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<?php include('header.php');?>
		<!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-parallax page-title-dark" style="padding: 100px 0; background-image: url('images/about/parallax.jpg'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">

			<div class="container clearfix">
				<h1>About Us</h1>
				<span>Everything you need to know about our Company</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">About Us</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_one_third">

						<div class="heading-block fancy-title nobottomborder title-bottom-border">
							<h4>Why choose <span>Us</span>.</h4>
						</div>

						<p><?php echo $client_operation->get_content_by_page_location('home','whyus');?></p>

					</div>

					<div class="col_one_third">

						<div class="heading-block fancy-title nobottomborder title-bottom-border">
							<h4>Our <span>Mission</span>.</h4>
						</div>

						<p><?php echo $client_operation->get_content_by_page_location('home','mission');?></p>

					</div>

					<div class="col_one_third col_last">

						<div class="heading-block fancy-title nobottomborder title-bottom-border">
							<h4>What we <span>Do</span>.</h4>
						</div>

						<p><?php echo $client_operation->get_content_by_page_location('about','whatwedo');?></p>

					</div>

				</div>

				<div class="section nomargin">
					<div class="container clearfix">

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
							<i class="i-plain i-xlarge divcenter icon-line2-directions"></i>
							<div class="counter counter-lined"><span data-from="50" data-to="<?=$settings['daily_visitors_fake']/1000;?>" data-refresh-interval="80" data-speed="2000"></span>K+</div>
							<h5>Daily visitors</h5>
						</div>

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-line2-graph"></i>
							<div class="counter counter-lined"><span data-from="3000" data-to="<?=$settings['members_count_fake'];?>" data-refresh-interval="100" data-speed="2500"></span>+</div>
							<h5>Members</h5>
						</div>

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-line2-layers"></i>
							<div class="counter counter-lined"><span data-from="10" data-to="408" data-refresh-interval="25" data-speed="3500"></span>*</div>
							<h5>No. of Clubs</h5>
						</div>

						<div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-line2-clock"></i>
							<div class="counter counter-lined"><span data-from="60" data-to="1200" data-refresh-interval="30" data-speed="2700"></span>+</div>
							<h5>No. of Club Groups</h5>
						</div>

					</div>
				</div>

				

				

				<!--<div class="container clearfix">

					<div class="clear"></div>

					<div class="heading-block center">
						<h4>Our Clients</h4>
					</div>

					<ul class="clients-grid grid-6 nobottommargin clearfix">
						<li><a href="http://logofury.com/logo/enzo.html"><img src="images/clients/1.png" alt="Clients"></a></li>
						<li><a href="http://logofury.com"><img src="images/clients/2.png" alt="Clients"></a></li>
						<li><a href="http://logofaves.com/2014/03/grabbt/"><img src="images/clients/3.png" alt="Clients"></a></li>
						<li><a href="http://logofaves.com/2014/01/ladera-granola/"><img src="images/clients/4.png" alt="Clients"></a></li>
						<li><a href="http://logofaves.com/2014/02/hershel-farms/"><img src="images/clients/5.png" alt="Clients"></a></li>
						<li><a href="http://logofury.com/logo/food-fight-radio.html"><img src="images/clients/6.png" alt="Clients"></a></li>
						<li><a href="http://logofury.com"><img src="images/clients/7.png" alt="Clients"></a></li>
						<li><a href="http://logofury.com/logo/up-travel.html"><img src="images/clients/8.png" alt="Clients"></a></li>
						<li><a href="http://logofury.com/logo/caffi-bardi.html"><img src="images/clients/9.png" alt="Clients"></a></li>
						<li><a href="http://logofury.com/logo/bignix-design.html"><img src="images/clients/10.png" alt="Clients"></a></li>
						<li><a href="http://logofury.com/"><img src="images/clients/11.png" alt="Clients"></a></li>
						<li><a href="http://logofury.com/"><img src="images/clients/12.png" alt="Clients"></a></li>
					</ul>

				</div>-->

				<div class="section footer-stick">

					<h4 class="uppercase center">What <span>Members</span> Say?</h4>

					<div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
						<div class="flexslider">
							<div class="slider-wrap">
								<div class="slide">
									<div class="testi-image">
										<a href="#"><img src="images/testimonials/3.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>FFN has been a great source of residual income from my passion...</p>
										<div class="testi-meta">
											Steve Iredia
											<span>Lagos</span>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="testi-image">
										<a href="#"><img src="images/testimonials/2.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>FFN has taken me to great heights. I initially didn't believe the guy that referred me till I held testimonies from different sources. </p>
										<div class="testi-meta">
											Collins Adekunle
											<span>Ibadan</span>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="testi-image">
										<a href="#"><img src="images/testimonials/1.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>One of the greatest things that happened to my life. Earning money from my passion!</p>
										<div class="testi-meta">
											Ifeanyi Dike
											<span>Abuja</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<?php include('footer.php');?>
		<!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

</body>
</html>