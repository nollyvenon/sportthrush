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
	<title>How It Works | <?=$site_name;?></title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<?php include_once('header.php');?>
		<!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>How It Works</h1>
				<span>...reward football fans worldwide</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">How It Works</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_two_fifth topmargin nobottommargin" style="min-height: 350px;">
						<canvas id="chart-doughnut"></canvas>
					</div>

					<div class="col_three_fifth nobottommargin col_last">

						<div class="heading-block">
							<h3>How It Works.</h3>
							<span>How to start your path to financial freedom</span>
						</div>

						<p><?php echo $client_operation->get_content_by_page_location('howitworks','main');?>
</p>


					</div>

					<div class="clear"></div><div class="line"></div>

					<!--<div class="col_three_fifth">

						<div class="heading-block">
							<h3>Advanced store statistics.</h3>
							<span>Benchmarking your website's performance helps you make great choices for your business.</span>
						</div>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero quod consequuntur quibusdam, enim expedita sed quia nesciunt incidunt accusamus necessitatibus modi adipisci officia libero accusantium esse hic, obcaecati, ullam, laboriosam!</p>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti vero, animi suscipit id facere officia. Aspernatur, quo, quos nisi dolorum aperiam fugiat deserunt velit rerum laudantium cum magnam excepturi quod, fuga architecto provident, cupiditate delectus voluptate eaque! Sit neque ut eum, voluptatibus odit cum dolorum ipsa voluptates inventore cumque a.</p>

						<a href="#">Learn more &rarr;</a>

					</div>

					<div class="col_two_fifth topmargin col_last" style="min-height: 350px">
						<canvas id="chart-radar"></canvas>
					</div>-->

				</div>

				<a href="contact" class="button button-full center tright topmargin footer-stick">
					<div class="container clearfix">
						Need help with your Account? <strong>Start here</strong> <i class="icon-caret-right" style="top:4px;"></i>
					</div>
				</a>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<?php include_once('footer.php');?>
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

	<!-- Charts JS
	============================================= -->
	<script src="js/chart.js"></script>
	<script src="js/chart-utils.js"></script>

	<script>

		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					"Red",
					"Orange",
					"Yellow",
					"Green",
					"Blue"
				]
			},
			options: {
				responsive: true,
				legend: {
					display: false,
					position: 'top',
				},
				title: {
					display: false,
					text: 'Doughnut Chart'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};


		// Radar Chart

		var color = Chart.helpers.color;
		var configRadar = {
			type: 'radar',
			data: {
				labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
				datasets: [{
					label: "My First dataset",
					backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
					borderColor: window.chartColors.red,
					pointBackgroundColor: window.chartColors.red,
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor()
					]
				}, {
					label: "My Second dataset",
					backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
					borderColor: window.chartColors.blue,
					pointBackgroundColor: window.chartColors.blue,
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor()
					]
				},]
			},
			options: {
				legend: {
					display: false
				},
				title: {
					display: false
				},
				scale: {
				  ticks: {
					beginAtZero: true
				  }
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById("chart-doughnut").getContext("2d");
			window.myDoughnut = new Chart(ctx, config);
			window.myRadar = new Chart(document.getElementById("chart-radar"), configRadar);
		};

	</script>

</body>
</html>