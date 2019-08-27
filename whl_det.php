<?php
require_once("z_db.php");

$whl_id = $_GET['sid'];
$query = "SELECT * FROM w_highlights WHERE whl_id='$whl_id' order by whl_id DESC ";
$result = $db_handle->runQuery($query);
$whl = $db_handle->fetchAssoc($result);
extract($whl[0]);
?><!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Onyx Data Systems(www.onyxdatasystems.com)" />

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
	<title>Latest Updates & News Detail | <?=$site_name;?></title>

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
				<h1>Highlight Details</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">News</a></li>
					<li class="breadcrumb-item active" aria-current="page">News Details</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<div class="single-post nobottommargin">

							<!-- Single Post
							============================================= -->
							<div class="entry clearfix">

								<!-- Entry Title
								============================================= -->
								<div class="entry-title">
									<h2><?php echo $whl_title;?></h2>
								</div><!-- .entry-title end -->

								<!-- Entry Meta
								============================================= -->
								<!--<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 10th July 2014</li>
									<li><a href="#"><i class="icon-user"></i> admin</a></li>
									<li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">News</a></li>
									<li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>
									<li><a href="#"><i class="icon-camera-retro"></i></a></li>
								</ul><!-- .entry-meta end -->

								<!-- Entry Content
								============================================= -->
								<div class="entry-content notopmargin">

									<!-- Entry Image
									============================================= -->
									<div class="entry-image alignleft">
										<?php
										$post_images = $client_operation->get_gallery($whl_id);
										if(isset($post_images) && !empty($post_images)) { foreach ($post_images as $row22) {
													$image_url = $row22['image_url'];?>
										<a href="images/whl/<?=$image_url;?>"><img src="images/whl/<?=$image_url;?>" alt="<?=$title;?>"></a>
												<?php } }?>
									</div><!-- .entry-image end -->

									<br><?php echo $whl_content;?>
									<!-- Post Single - Content End -->

									<!-- Tag Cloud
									============================================= -->
									<div class="tagcloud clearfix bottommargin">
										<a href="#">general</a>
										<a href="#">information</a>
										<a href="#">media</a>
										<a href="#">press</a>
										<a href="#">gallery</a>
									</div><!-- .tagcloud end -->

									<div class="clear"></div>

									<!-- Post Single - Share
									============================================= -->
									<div class="si-share noborder clearfix">
										<span>Share this Post:</span>
										<div>
											<a href="#" class="social-icon si-borderless si-facebook">
												<i class="icon-facebook"></i>
												<i class="icon-facebook"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-twitter">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-pinterest">
												<i class="icon-pinterest"></i>
												<i class="icon-pinterest"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-gplus">
												<i class="icon-gplus"></i>
												<i class="icon-gplus"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-rss">
												<i class="icon-rss"></i>
												<i class="icon-rss"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-email3">
												<i class="icon-email3"></i>
												<i class="icon-email3"></i>
											</a>
										</div>
									</div><!-- Post Single - Share End -->

								</div>
							</div><!-- .entry end -->

							<!-- Post Navigation
							============================================= -->
							<div class="post-navigation clearfix">

								<?php
								
								?>
								<div class="col_half nobottommargin">
									<a href="?whl_det?sid=<?=$whl_id-1;?>">&lArr; Prev</a>
								</div>

								<div class="col_half col_last tright nobottommargin">
									<a href="?whl_det?sid=<?=$whl_id+1;?>">Next &rArr;</a>
								</div>

							</div><!-- .post-navigation end -->

							<div class="line"></div>

							<!-- Post Author Info
							============================================= -->
							<div class="card">
								<div class="card-header"><strong>Posted by <a href="#"><?= $admin_object->get_admin_name_by_code($admin);?></a></strong></div>
								<div class="card-body">
									<div class="author-image">
										<img src="images/author/1.jpg" alt="" class="rounded-circle">
									</div>
									<?php echo $row['author_desc'];?>
								</div>
							</div><!-- Post Single - Author End -->

							<div class="line"></div>

							<h4>Related Posts:</h4>

							<div class="related-posts clearfix">

								<div class="col_half nobottommargin">
									<?php
									$query = "SELECT * FROM w_highlights order by RAND() DESC LIMIT 1,3";
									$result = $db_handle->runQuery($query);
									$whl_random = $db_handle->fetchAssoc($result);
							if(isset($whl_random) && !empty($whl_random)) { foreach ($whl_random as $row) {
							?>

									<div class="mpost clearfix">
										<div class="entry-image">
											<a href="#"><img src="images/whl/<?=$row['image_url'];?>" alt="<?=$row['whl_title'];?>"></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#"><?=$row['whl_title'];?></a></h4>
											</div>
											<ul class="entry-meta clearfix">
												<li><i class="icon-calendar3"></i> <?= date('d M, Y', strtotime($row['whl_date']));?></li>
												<li><a href="#"><i class="icon-comments"></i> <?=$row['comm_count'];?></a></li>
											</ul>
											<div class="entry-content"><?=$row['excerpts'];?></div>
										</div>
									</div>
									<?php }} ?>

								</div>

								<div class="col_half nobottommargin col_last">
									<?php
									$query = "SELECT * FROM w_highlights order by RAND() DESC LIMIT 4,5";
									$result = $db_handle->runQuery($query);
									$whl_random = $db_handle->fetchAssoc($result);
							if(isset($whl_random) && !empty($whl_random)) { foreach ($whl_random as $row) {
							?>
									<div class="mpost clearfix">
										<div class="entry-image">
											<a href="#"><img src="images/whl/<?=$row['image_url'];?>" alt="<?=$row['whl_title'];?>"></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#"><?=$row['whl_title'];?></a></h4>
											</div>
											<ul class="entry-meta clearfix">
												<li><i class="icon-calendar3"></i> <?= date('d M, Y', strtotime($row['whl_date']));?></li>
												<li><a href="#"><i class="icon-comments"></i> <?=$row['comm_count'];?></a></li>
											</ul>
											<div class="entry-content"><?=$row['excerpts'];?></div>
										</div>
									</div>
									<?php }} ?>

								</div>

							</div>

							<!-- Comments
							============================================= -->
							<div id="comments" class="clearfix">

								<h3 id="comments-title">Comments</h3>

								<!-- Disqus Comments
								============================================= -->
								<div id="disqus_thread"></div>

							</div><!-- #comments end -->

						</div>

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<?php include_once('whl_sidebar.php');?>
					<!-- .sidebar end -->

				</div>

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

	<script>
		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		var disqus_shortname = 'ffn'; // required: replace example with your forum shortname

		/* * * DON'T EDIT BELOW THIS LINE * * */
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();

	</script>
	<!-- Disqus Comments end -->

</body>
</html>