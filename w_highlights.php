<?php
include_once ("z_db.php");
$page_title = 'Weekly Highlights';
$sub_title = 'Account';
$query = "SELECT * FROM whighlights order by whl_id DESC ";
$numrows = $db_handle->numRows($query);
$rowsperpage = 10;
$totalpages = ceil($numrows / $rowsperpage);
// get the current page or set a default
if (isset($_GET['pg']) && is_numeric($_GET['pg'])) {
   $currentpage = (int) $_GET['pg'];
} else {
   $currentpage = 1;
}
if ($currentpage > $totalpages) { $currentpage = $totalpages; }
if ($currentpage < 1) { $currentpage = 1; }

$prespagelow = $currentpage * $rowsperpage - $rowsperpage + 1;
$prespagehigh = $currentpage * $rowsperpage;
if($prespagehigh > $numrows) { $prespagehigh = $numrows; }

$offset = ($currentpage - 1) * $rowsperpage;
$query .= 'LIMIT ' . $offset . ',' . $rowsperpage;
$result = $db_handle->runQuery($query);
$whl = $db_handle->fetchAssoc($result);
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
	<title><?=$page_title;?> | <?=$site_name;?></title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<?php include_once('header.php');?><!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Highlights</h1>
				<span>Our <?=$page_title;?></span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?=$page_title;?></li>
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

						<!-- Posts
						============================================= -->
						<div id="posts" class="post-grid grid-container grid-2 clearfix" data-layout="fitRows">

							<?php
							if(isset($whl) && !empty($whl)) { foreach ($whl as $row) {
							?>
							<div class="entry clearfix">
								<?php if ($row['video_url']!=""){ ?>
								<div class="entry-image clearfix">
									<?php if($row['audio_video_type']=='soundcloud'){?>
									<iframe width="100%" height="230" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?=$row['video_url'];?>&amp;auto_play=false&amp;hide_related=true&amp;visual=true"></iframe>
									<?php }elseif($row['audio_video_type']=='youtube'){?>
									<iframe width="560" height="315" src="<?=$row['video_url'];?>" frameborder="0" allowfullscreen></iframe>
									<?php } ?>
								</div>
								<?php } ?>
								<?php //if ($row['image_url']!=""){ ?>
								<div class="entry-image">
									<div class="fslider" data-arrows="false" data-lightbox="gallery">
										<div class="flexslider">
											<div class="slider-wrap">
												<?php
												$post_images = $client_operation->get_gallery($row['whl_id']);
												if(isset($post_images) && !empty($post_images)) { foreach ($post_images as $row22) {
													$image_url = $row22['image_url'];
												?>
												<div class="slide"><a href="images/whl/<?=$row22['image_url'];?>" data-lightbox="gallery-item"><img class="image_fade" src="images/whl/<?=$row22['image_url'];?>" alt="<?=$title;?>"></a></div>
												<?php } }?>
											</div>
										</div>
									</div>
								</div>
								<?php //} ?>
								<div class="entry-title">
									<h2><a href="whl_det?sid=<?=$row['whl_id'];?>"><?=$row['whl_title'];?></a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> <?= date('d M, Y', strtotime($row['timestamp']));?></li>
									<li><a href="whl_det?sid=<?=$row['whl_id'];?>#comments"><i class="icon-comments"></i> <?=$row['comm_count'];?></a></li>
									<li><a href="#"><i class="icon-music2"></i></a></li>
								</ul>
								<div class="entry-content">
									<p><?=$row['excerpts'];?></p>
									<a href="whl_det?sid=<?=$row['whl_id'];?>" class="more-link">Read More</a>
								</div>
							</div>
							<?php } } ?>
							


							

						</div><!-- #posts end -->

						<!-- Pagination
						============================================= -->
						<div class="row mb-3">
							<div class="col-12">
								<a href="?pg=<?=$currentpage-1;?>" class="btn btn-outline-secondary float-left">&larr; Older</a>
								<a href="?pg=<?=$currentpage+1;?>" class="btn btn-outline-dark float-right">Newer &rarr;</a>
							</div>
						</div>
						<!-- .pager end -->

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<?php include_once('news_sidebar.php');?>
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

</body>
</html>