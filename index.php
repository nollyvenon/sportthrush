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
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/settings.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/layers.css">
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/navigation.css">

	<!-- Document Title
	============================================= -->
	<title>Home - <?=$site_name;?></title>

	<style>

		.revo-slider-emphasis-text {
			font-size: 64px;
			font-weight: 700;
			letter-spacing: -1px;
			font-family: 'Raleway', sans-serif;
			padding: 15px 20px;
			border-top: 2px solid #FFF;
			border-bottom: 2px solid #FFF;
		}

		.revo-slider-desc-text {
			font-size: 20px;
			font-family: 'Lato', sans-serif;
			width: 650px;
			text-align: center;
			line-height: 1.5;
		}

		.revo-slider-caps-text {
			font-size: 16px;
			font-weight: 400;
			letter-spacing: 3px;
			font-family: 'Raleway', sans-serif;
		}

		.tp-video-play-button { display: none !important; }

		.tp-caption { white-space: nowrap; }

	</style>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<?php include('header.php');?>
		<!-- #header end -->

		<!-- Slider
		============================================= -->
		<?php include('slider.php');?>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="divcenter center clearfix" style="max-width: 900px;">
						<img class="bottommargin" src="images/logo-side.png" alt="">
						<h1>Welcome! This is <span>Football Fans Network</span>.</h1>
						<h2>Football fans network is a platform where football fans meet to make friends, support their clubs and make money by referring their friends from the same club. </h2>
						<a href="about" class="button button-3d button-dark button-large ">Read More</a>
						<a href="login-register" class="button button-3d button-large">Start Now</a>
					</div>

					<div class="line"></div>

					<div class="col_one_third">
						<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn">
							<div class="fbox-icon">
								<a href="login-register"><i class="icon-phone2"></i></a>
							</div>
							<h3>Sign Up</h3>
							<p><?php echo truncate_str($client_operation->get_content_by_page_location('home','signupinfo'),20);?>.</p>
						</div>
					</div>

					<div class="col_one_third">
						<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="200">
							<div class="fbox-icon">
								<a href="#"><i class="icon-eye"></i></a>
							</div>
							<h3>Join & Support A Club</h3>
							<p><?php echo truncate_str($client_operation->get_content_by_page_location('home','joinaclub'),20);?>.</p>
						</div>
					</div>

					<div class="col_one_third col_last">
						<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="400">
							<div class="fbox-icon">
								<a href="#"><i class="icon-star2"></i></a>
							</div>
							<h3>Refer someone</h3>
							<p><?php echo truncate_str($client_operation->get_content_by_page_location('home','refersomone'),20);?></p>
						</div>
					</div>

					<div class="clear"></div>

					<div class="col_one_third">
						<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="600">
							<div class="fbox-icon">
								<a href="#"><i class="icon-video"></i></a>
							</div>
							<h3>Participate in Game shows</h3>
							<p><?php echo truncate_str($client_operation->get_content_by_page_location('home','participate_game'),20);?></p>
						</div>
					</div>

					<div class="col_one_third">
						<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="800">
							<div class="fbox-icon">
								<a href="#"><i class="icon-params"></i></a>
							</div>
							<h3>Get free tips</h3>
							<p><?php echo truncate_str($client_operation->get_content_by_page_location('home','fretips_info'),20);?></p>
						</div>
					</div>

					<div class="col_one_third col_last">
						<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="1000">
							<div class="fbox-icon">
								<a href="#"><i class="icon-fire"></i></a>
							</div>
							<h3>Get free odds everyday</h3>
							<p><?php echo truncate_str($client_operation->get_content_by_page_location('home','free_odds'),20);?></p>
						</div>
					</div>

					<div class="clear"></div>

					<div class="col_one_third nobottommargin">
						<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="1200">
							<div class="fbox-icon">
								<a href="#"><i class="icon-bulb"></i></a>
							</div>
							<h3>Increase your chances to win unlimited prizes and spillovers</h3>
							<p><?php echo truncate_str($client_operation->get_content_by_page_location('home','increase_chances'),20);?></p>
						</div>
					</div>

					<div class="col_one_third nobottommargin">
						<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="1400">
							<div class="fbox-icon">
								<a href="#"><i class="icon-heart2"></i></a>
							</div>
							<h3>Win up to $200 to $1000</h3>
							<p><?php echo truncate_str($client_operation->get_content_by_page_location('home','winup'),20);?></p>
						</div>
					</div>

					<div class="col_one_third nobottommargin col_last">
						<div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="1600">
							<div class="fbox-icon">
								<a href="#"><i class="icon-note"></i></a>
							</div>
							<h3>Meet fellow fans</h3>
							<p><?php echo truncate_str($client_operation->get_content_by_page_location('home','fellow_fans'),20);?></p>
						</div>
					</div>

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

				<div class="section parallax dark nobottommargin nobottomborder" style="background-image: url('images/parallax/7.jpg');" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

					<div class="container clearfix">

						<div class="heading-block center">
							<h2>FFN: Earn from your passion!</h2>
							<span>Join the network where you earn simply by supporting your favourite team and inviting others to join you.</span>
						</div>

						<div style="position: relative; margin-bottom: -60px;" data-height-xl="415" data-height-lg="342" data-height-md="262" data-height-sm="160" data-height-xs="102">
							<img src="images/services/res_car_us.png" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" alt="Chrome">
							<img src="images/services/gceo4bpgi-300x219.png" style="position: absolute; top: -50px; left: 400px;" data-animate="fadeInUp" data-delay="300" alt="iPad">
							<img src="images/services/steps_cash_win.png" style="position: absolute; top: 50px; left: 400px;" data-animate="fadeInUp" data-delay="300" alt="iPad">
							<img src="images/services/daily-draw-img.png" style="position: absolute; top: -50px; left: 670px;" data-animate="fadeInUp" data-delay="300" alt="iPad">
						</div>

					</div>

				</div>

				<div class="section notopborder topmargin-sm bottommargin-sm noborder nobg">

					<div class="container clearfix">

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-building"></i>
							<div class="counter counter-lined"><span data-from="10" data-to="100" data-refresh-interval="50" data-speed="2000"></span>+</div>
							<h5>Clubs</h5>
						</div>

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="200">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-group"></i>
							<div class="counter counter-lined"><span data-from="100" data-to="10360" data-refresh-interval="100" data-speed="2500"></span>+</div>
							<h5>Members</h5>
						</div>

						<div class="col_one_fourth nobottommargin center" data-animate="bounceIn" data-delay="400">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-users2"></i>
							<div class="counter counter-lined"><span data-from="10" data-to="386" data-refresh-interval="25" data-speed="3500"></span>*</div>
							<h5>Fan Groups</h5>
						</div>

						<div class="col_one_fourth nobottommargin center col_last" data-animate="bounceIn" data-delay="600">
							<i class="i-plain i-xlarge divcenter nobottommargin icon-magic"></i>
							<div class="counter counter-lined"><span data-from="60" data-to="12000" data-refresh-interval="30" data-speed="2700"></span>+</div>
							<h5>Bonuses & Prizes Awarded</h5>
						</div>

					</div>

				</div>

				<div class="section notopmargin noborder nobottommargin" >

					<div class="container clearfix">

						<div class="heading-block center nobottommargin">
							<h2>Our Featured Clubs</h2>
							<span>Follow updates on these and 100+ live on this site while you turn your passion to Millions</span>
						</div>

					</div>

				</div>

				<!-- Portfolio Items
				============================================= -->
				<div id="portfolio" class="portfolio grid-container portfolio-nomargin portfolio-notitle portfolio-full clearfix">
					
					<article class="portfolio-item pf-icons pf-illustrations">
						<div class="portfolio-image">
							<div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
								<div class="flexslider">
									<div class="slider-wrap">
										<div class="slide"><a href="images/club_pictures/chelsea.jpg"><img src="images/club_pictures/chelsea.jpg" alt="Morning Dew"></a></div>
										<div class="slide"><a href="images/club_pictures/chelsea-premier-league-squads_3979681.jpg"><img src="images/club_pictures/chelsea-premier-league-squads_3979681.jpg" alt="Morning Dew"></a></div>
										<div class="slide"><a href="images/club_pictures/chelsea1.jpg"><img src="images/club_pictures/chelsea1.jpg" alt="Morning Dew"></a></div>
									</div>
								</div>
							</div>
							<div class="portfolio-overlay" data-lightbox="gallery">
								<a href="images/club_pictures/chelsea.jpg" class="hidden" data-lightbox="gallery-item"></a>
								<a href="images/club_pictures/chelsea-premier-league-squads_3979681.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
								<a href="images/club_pictures/chelsea1.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
								<a href="images/club_pictures/chelsea.jpg" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="images/club_pictures/chelsea.jpg">Chelsea Players celebrating</a></h3>
							<span><a href="#">Media</a>, <a href="#">Icons</a></span>
						</div>
					</article>

					<article class="portfolio-item pf-illustrations">
						<div class="portfolio-image">
							<a href="#">
								<img src="images/club_pictures/mcfc_premier_league_champions_by_mancitygraphics-d7ijxwl.jpg" alt="Locked Steel Gate">
							</a>
							<div class="portfolio-overlay">
								<a href="images/club_pictures/mcfc_premier_league_champions_by_mancitygraphics-d7ijxwl.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								<a href="#" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="images/club_pictures/Manchester City Premier League Champions Wallpaper.jpg">Manchester City Premier League Champions</a></h3>
							<span><a href="#">Wallpapers</a></span>
						</div>
					</article>

					<article class="portfolio-item pf-icons pf-illustrations">
						<div class="portfolio-image">
							<div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
								<div class="flexslider">
									<div class="slider-wrap">
										<div class="slide"><a href="gallery.php"><img src="images/club_pictures/Manchester-United-EFL.jpg" alt="Morning Dew"></a></div>
										<div class="slide"><a href="gallery.php"><img src="images/club_pictures/Manchester-United-FC-appear-to-have-lost-the-top-four.jpg" alt="Morning Dew"></a></div>
									</div>
								</div>
							</div>
							<div class="portfolio-overlay" data-lightbox="gallery">
								<a href="images/club_pictures/Manchester-United-EFL.jpg" class="hidden" data-lightbox="gallery-item"></a>
								<a href="images/club_pictures/Manchester-United-FC-appear-to-have-lost-the-top-four.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
								<a href="gallery.php" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="gallery.php">Manchester United</a></h3>
							<span><a href="#"><a href="#">Club</a>, <a href="#">Pictures</a></span>
						</div>
					</article>

					<article class="portfolio-item pf-icons pf-illustrations">
						<div class="portfolio-image">
							<div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
								<div class="flexslider">
									<div class="slider-wrap">
										<div class="slide"><a href="gallery.php"><img src="images/club_pictures/real madrid5.jpg" alt="Morning Dew"></a></div>
										<div class="slide"><a href="gallery.php"><img src="images/club_pictures/real madrid7.jpg" alt="Morning Dew"></a></div>
										<div class="slide"><a href="gallery.php"><img src="images/club_pictures/real madrid2.jpg" alt="Morning Dew"></a></div>
									</div>
								</div>
							</div>
							<div class="portfolio-overlay" data-lightbox="gallery">
								<a href="images/club_pictures/real madrid5.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
								<a href="images/club_pictures/real madrid7.jpg" class="hidden" data-lightbox="gallery-item"></a>
								<a href="images/club_pictures/real madrid2.jpg" class="hidden" data-lightbox="gallery-item"></a>
								<a href="images/club_pictures/real madrid5.jpg" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="#">Real Madrid</a></h3>
							<span><a href="#"><a href="#">Club</a>, <a href="#">Pictures</a></span>
						</div>
					</article>

					<article class="portfolio-item pf-uielements pf-media">
						<div class="portfolio-image">
							<a href="portfolio-single.html">
								<img src="images/club_pictures/mg_arsenal_squad_wenger_comp011.jpg" alt="Console Activity">
							</a>
							<div class="portfolio-overlay">
								<a href="images/club_pictures/mg_arsenal_squad_wenger_comp011.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
								<a href="images/club_pictures/mg_arsenal_squad_wenger_comp011.jpg" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="portfolio-single.html">Arsenal</a></h3>
							<span><a href="#">Club</a>, <a href="#">Media</a></span>
						</div>
					</article>

					<article class="portfolio-item pf-graphics pf-illustrations">
						<div class="portfolio-image">
							<div class="fslider" data-arrows="false">
								<div class="flexslider">
									<div class="slider-wrap">
										<div class="slide"><a href="gallery.php"><img src="images/club_pictures/fc-barcelona-theme.jpg" alt="Shake It"></a></div>
										<div class="slide"><a href="gallery.php"><img src="images/club_pictures/barcelona.jpg" alt="Shake It"></a></div>
										<div class="slide"><a href="gallery.php"><img src="images/club_pictures/barcelonamaxresdefault.jpg" alt="Shake It"></a></div>
										<div class="slide"><a href="gallery.php"><img src="images/club_pictures/barcelonamaxresdefault1.jpg" alt="Shake It"></a></div>
									</div>
								</div>
							</div>
							<div class="portfolio-overlay" data-lightbox="gallery">
								<a href="images/club_pictures/fc-barcelona-theme.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
								<a href="images/club_pictures/barcelona.jpg" class="hidden" data-lightbox="gallery-item"></a>
								<a href="images/club_pictures/barcelonamaxresdefault.jpg" class="hidden" data-lightbox="gallery-item"></a>
								<a href="http://www.youtube.com/watch?v=kuceVNBTJio" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								<a href="gallery.php" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="gallery.php">Barcelona</a></h3>
							<span><a href="#">Illustrations</a>, <a href="#">Graphics</a></span>
						</div>
					</article>

					<article class="portfolio-item pf-graphics pf-illustrations">
						<div class="portfolio-image">
							<div class="fslider" data-arrows="false">
								<div class="flexslider">
									<div class="slider-wrap">
										<div class="slide"><a href="images/club_pictures/PA-37479-e1490204060334.jpg"><img src="images/club_pictures/PA-37479-e1490204060334.jpg" alt="Shake It"></a></div>
										<div class="slide"><a href="images/club_pictures/8154__0508__lfc_(1280x1024).jpg"><img src="images/club_pictures/8154__0508__lfc_(1280x1024).jpg" alt="Shake It"></a></div>
										<div class="slide"><a href="images/club_pictures/liverpool_fc_2017_2018___wallpaper_by_egzonnimani-dbj76cv.png"><img src="images/club_pictures/liverpool_fc_2017_2018___wallpaper_by_egzonnimani-dbj76cv.png" alt="Shake It"></a></div>
										<div class="slide"><a href="images/club_pictures/d405376e0b76be90989281a3f2dd115f.jpg"><img src="images/club_pictures/d405376e0b76be90989281a3f2dd115f.jpg" alt="Shake It"></a></div>
									</div>
								</div>
							</div>
							<div class="portfolio-overlay" data-lightbox="gallery">
								<a href="images/club_pictures/PA-37479-e1490204060334.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
								<a href="images/club_pictures/8154__0508__lfc_(1280x1024).jpg" class="hidden" data-lightbox="gallery-item"></a>
								<a href="images/club_pictures/liverpool_fc_2017_2018___wallpaper_by_egzonnimani-dbj76cv.png" class="hidden" data-lightbox="gallery-item"></a>
								<a href="https://www.youtube.com/watch?v=l-Wydh-22k4" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								<a href="liverpool_fc_2017_2018___wallpaper_by_egzonnimani-dbj76cv.png" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="https://www.youtube.com/watch?v=l-Wydh-22k4">Liverpool</a></h3>
							<span><a href="#">Videos</a>, <a href="#">Pictures</a></span>
						</div>
					</article>
						
					<article class="portfolio-item pf-graphics pf-illustrations">
						<div class="portfolio-image">
							<div class="fslider" data-arrows="false">
								<div class="flexslider">
									<div class="slider-wrap">
										<div class="slide"><a href="images/club_pictures/juventus-celebrating-coppa-italia_1iltpq6ezenvz1r8f1dv4nrnpo.jpg"><img src="images/club_pictures/juventus-celebrating-coppa-italia_1iltpq6ezenvz1r8f1dv4nrnpo.jpg" alt="Shake It"></a></div>
										<div class="slide"><a href="images/club_pictures/Juventus+FC+v+Bologna+FC+Serie+kqqCQeTr5uCl.jpg"><img src="images/club_pictures/Juventus+FC+v+Bologna+FC+Serie+kqqCQeTr5uCl.jpg" alt="Shake It"></a></div>
										<div class="slide"><a href="images/club_pictures/juventus1.jpg"><img src="images/club_pictures/juventus1.jpg" alt="Shake It"></a></div>
										<div class="slide"><a href="images/club_pictures/juventus2.jpg"><img src="images/club_pictures/juventus2.jpg" alt="Shake It"></a></div>
									</div>
								</div>
							</div>
							<div class="portfolio-overlay" data-lightbox="gallery">
								<a href="images/club_pictures/juventus-celebrating-coppa-italia_1iltpq6ezenvz1r8f1dv4nrnpo.jpg" class="hidden" data-lightbox="gallery-item"></a>
								<a href="images/club_pictures/Juventus+FC+v+Bologna+FC+Serie+kqqCQeTr5uCl.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
								<a href="images/club_pictures/juventus1.jpg" class="hidden" data-lightbox="gallery-item"></a>
								<a href="https://www.youtube.com/watch?v=k_Fc-JN61Oo" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
								<a href="images/club_pictures/juventus2.jpg" class="right-icon"><i class="icon-line-ellipsis"></i></a>
							</div>
						</div>
						<div class="portfolio-desc">
							<h3><a href="https://www.youtube.com/watch?v=dCl4WVvwwg">Juventus</a></h3>
							<span><a href="#">Videos</a>, <a href="#">Pictures</a></span>
						</div>
					</article>

				</div>

				<!-- Portfolio Script
				============================================= -->

				<div class="clear"></div>

				<a href="#" class="button button-full button-dark center tright bottommargin-lg">
					<div class="container clearfix">
						We have more than 100+ others football clubs. Get premium news and updates here <strong>See More</strong> <i class="icon-caret-right" style="top:4px;"></i>
					</div>
				</a>

				<div class="container clearfix">

					<div class="col_three_fifth topmargin-sm bottommargin">
						<img data-animate="fadeInLeftBig" src="images/kisspng-2018-fifa-world-cup-football-pitch-download-mobile-and-soccer-5a70c5ef8261d1.1903787315173401435341.png" alt="Imac">
					</div>

					<div class="col_two_fifth topmargin-sm bottommargin-lg col_last">

						<div class="heading-block topmargin">
							<h2>fabulous moments right now.</h2>
							<span>Best soccer moments turned to a means of residual income.</span>
						</div>

						<p> The person referring will have the opportunity to select any of his club to build his club members and earn more commission from matrix bonus and spill over.</p>

						<a href="#" class="button button-border button-rounded button-large noleftmargin topmargin-sm">Experience More</a>

					</div>


				</div>


				<div class="row bottommargin-lg common-height">

					<div class="col-lg-4 dark col-padding ohidden" style="background-color: #1abc9c;">
						<div>
							<h3 class="uppercase" style="font-weight: 600;">Why choose Us</h3>
							<p style="line-height: 1.8;"><?php echo $client_operation->get_content_by_page_location('home','whyus');?></p>
							<a href="about" class="button button-border button-light button-rounded uppercase nomargin">Read More</a>
							<i class="icon-bulb bgicon"></i>
						</div>
					</div>

					<div class="col-lg-4 dark col-padding ohidden" style="background-color: #34495e;">
						<div>
							<h3 class="uppercase" style="font-weight: 600;">Our Mission</h3>
							<p style="line-height: 1.8;"><?php echo $client_operation->get_content_by_page_location('home','mission');?></p>
							<a href="about" class="button button-border button-light button-rounded uppercase nomargin">Read More</a>
							<i class="icon-cog bgicon"></i>
						</div>
					</div>

					<div class="col-lg-4 dark col-padding ohidden" style="background-color: #e74c3c;">
						<div>
							<h3 class="uppercase" style="font-weight: 600;">What you get</h3>
							<p style="line-height: 1.8;"><?php echo $client_operation->get_content_by_page_location('home','whatyouget');?></p>
							<a href="about" class="button button-border button-light button-rounded uppercase nomargin">Read More</a>
							<i class="icon-thumbs-up bgicon"></i>
						</div>
					</div>

					<div class="clear"></div>

				</div>

				<div class="container clearfix">

					<div class="col_two_third nobottommargin">

						<div class="fancy-title title-border">
							<h4>Recent Posts</h4>
						</div>
						<?php
									$query = "SELECT * FROM news order by news_id DESC LIMIT 0,2";
									$result = $db_handle->runQuery($query);
									$news_recent = $db_handle->fetchAssoc($result);
							if(isset($news_recent) && !empty($news_recent)) { foreach ($news_recent as $row) {
							?>									

						<div class="col_half col_last nobottommargin">
							<div class="ipost clearfix">
								<div class="entry-image">
									<a href="#"><img src="images/news/<?=$row['image_url'];?>" alt="<?=$row['news_title'];?>"></a>
								</div>
								<div class="entry-title">
									<h3><a href="news_det?sid=<?=$row['news_id'];?>"><?=$row['news_title'];?></a></h3>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> <?= date('d M, Y', strtotime($row['news_date']));?></li>
									<li><a href="news_det?sid=<?=$row['news_id'];?>#comments"><i class="icon-comments"></i> <?=$row['comm_count'];?></a></li>
								</ul>
								<div class="entry-content">
									<p><?=$row['excerpts'];?></p>
								</div>
							</div>
						</div>
						<?php }} ?>

						<div class="clear"></div>

					</div>

					<div class="col_one_third nobottommargin col_last">

						<div class="fancy-title title-border">
							<h4>Client Testimonials</h4>
						</div>

						<div class="fslider testimonial nopadding noborder noshadow" data-animation="slide" data-arrows="false">
							<div class="flexslider">
								<div class="slider-wrap">
									<div class="slide">
										<div class="testi-image">
											<a href="#"><img src="images/1.png" alt="Customer Testimonails"></a>
										</div>
										<div class="testi-content">
											<p>FFN has made me make money from my love for football. I simply make money by referring my football loving friends.</p>
											<div class="testi-meta">
												Demola
												<!--<span>XYZ Inc.</span>-->
											</div>
										</div>
									</div>
									<div class="slide">
										<div class="testi-image">
											<a href="#"><img src="images/1.png" alt="Customer Testimonails"></a>
										</div>
										<div class="testi-content">
											<p>With FFN, I turned soccer from just a passion to a source of income, Many thanks to FFN. I recommend FFN to everyone.</p>
											<div class="testi-meta">
												Collins
												<!--<span>XYZ Inc.</span>-->
											</div>
										</div>
									</div>
									<div class="slide">
										<div class="testi-image">
											<a href="#"><img src="images/1.png" alt="Customer Testimonails"></a>
										</div>
										<div class="testi-content">
											<p>I have seen FFN cause changes in the lives of people. I boldly refer FFN to every youth.</p>
											<div class="testi-meta">
												Joseph
												<!--<span>XYZ Inc.</span>-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--<div class="clear"></div>

						<div class="well topmargin ohidden">

							<h4>Opening Hours</h4>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit reprehenderit voluptates.</p>

							<ul class="iconlist nobottommargin">
								<li><i class="icon-time color"></i> <strong>Mondays-Fridays:</strong> 10AM to 7PM</li>
								<li><i class="icon-time color"></i> <strong>Saturdays:</strong> 11AM to 3PM</li>
								<li><i class="icon-time text-danger"></i> <strong>Sundays:</strong> Closed</li>
							</ul>

							<i class="icon-time bgicon"></i>

						</div>-->

					</div>

					<div class="clear"></div>

				</div>

				<div class="section nobottommargin">
					<div class="container clearfix">

						<div class="heading-block center">
							<h3>Subscribe to our <span>Newsletter</span></h3>
						</div>

						<div class="subscribe-widget">
							<div class="widget-subscribe-form-result"></div>
							<form id="widget-subscribe-form2" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
								<div class="input-group input-group-lg divcenter" style="max-width:600px;">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="icon-email2"></i></div>
									</div>
									<input type="email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
									<div class="input-group-append">
										<button class="btn btn-secondary" type="submit">Subscribe Now</button>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>

				<div id="oc-clients" class="section nobgcolor notopmargin owl-carousel owl-carousel-full image-carousel footer-stick carousel-widget" data-margin="80" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="6">

					<div class="oc-item"><a href="#"><img src="images/club_logos/1200px-Chelsea_FC.svg_.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/1200px-Manchester_City_FC_badge.svg.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/arsenal.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Barcelona logo1.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Everton-FC-logo.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/manchester)logo.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/liverpool-fc-football-club-logo-vector.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/800px-newcastle_united_logosvgpng.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/leeds_logo.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Swansea City_logo.jpg" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/165px-Real_Madrid_CF.svg.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Juventus1-176x220.gif" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/middlesbrough.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Stoke_City_FC.svg.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/West-Ham-United-Football-Club-Logo.jpg" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Southampton FCLogo.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/cheltenham-town.jpeg" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Accrington Stanley.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Hull-City-Association-Football-Club-Logo.jpg" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Tottenham- Hotspur logo.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/carlisle_logo.jfif" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/untitled-1_31.jpg" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/bristol_rovers_fc.gif" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/1200px-Levante_Unión_Deportiva,_S.A.D._logo.svg.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Valenciacf.svg.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/1200px-Real_Sociedad_logo.svg.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/1200px-Real_Murcia_CF_logo.svg.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/1200px-RC_Deportivo_La_Coruña_logo.svg.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/getafe-s.jpg" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/malaga--soccer-logo-soccer-teams.jpg" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/Real-Zaragoza.png" alt="Clients"></a></div>
					<div class="oc-item"><a href="#"><img src="images/club_logos/wolfsburg.png" alt="Clients"></a></div>

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

	<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
	<script src="include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	<script src="include/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>

	<script>

		var tpj = jQuery;

		var revapi202;
		tpj(document).ready(function() {
			if (tpj("#rev_slider_579_1").revolution == undefined) {
				revslider_showDoubleJqueryError("#rev_slider_579_1");
			} else {
				revapi202 = tpj("#rev_slider_579_1").show().revolution({
					sliderType: "standard",
					jsFileLocation: "include/rs-plugin/js/",
					sliderLayout: "fullscreen",
					dottedOverlay: "none",
					delay: 9000,
					responsiveLevels: [1140, 1024, 778, 480],
					visibilityLevels: [1140, 1024, 778, 480],
					gridwidth: [1140, 1024, 778, 480],
					gridheight: [728, 768, 960, 720],
					lazyType: "none",
					shadow: 0,
					spinner: "off",
					stopLoop: "on",
					stopAfterLoops: 0,
					stopAtSlide: 1,
					shuffle: "off",
					autoHeight: "off",
					fullScreenAutoWidth: "off",
					fullScreenAlignForce: "off",
					fullScreenOffsetContainer: "",
					fullScreenOffset: "",
					disableProgressBar: "on",
					hideThumbsOnMobile: "off",
					hideSliderAtLimit: 0,
					hideCaptionAtLimit: 0,
					hideAllCaptionAtLilmit: 0,
					debugMode: false,
					fallbacks: {
						simplifyAll:"off",
						disableFocusListener:false,
					},
					parallax: {
						type:"mouse",
						origo:"slidercenter",
						speed:300,
						levels:[2,4,6,8,10,12,14,16,18,20,22,24,49,50,51,55],
					},
					navigation: {
						keyboardNavigation:"off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation:"off",
						onHoverStop:"off",
						touch:{
							touchenabled:"on",
							swipe_threshold: 75,
							swipe_min_touches: 1,
							swipe_direction: "horizontal",
							drag_block_vertical: false
						},
						arrows: {
							style: "hermes",
							enable: true,
							hide_onmobile: false,
							hide_onleave: false,
							tmp: '<div class="tp-arr-allwrapper">	<div class="tp-arr-imgholder"></div>	<div class="tp-arr-titleholder">{{title}}</div>	</div>',
							left: {
								h_align: "left",
								v_align: "center",
								h_offset: 10,
								v_offset: 0
							},
							right: {
								h_align: "right",
								v_align: "center",
								h_offset: 10,
								v_offset: 0
							}
						}
					}
				});
				revapi202.bind("revolution.slide.onloaded",function (e) {
					setTimeout( function(){ SEMICOLON.slider.sliderParallaxDimensions(); }, 200 );
				});

				revapi202.bind("revolution.slide.onchange",function (e,data) {
					SEMICOLON.slider.revolutionSliderMenu();
				});
			}
		}); /*ready*/

	</script>

</body>
</html>