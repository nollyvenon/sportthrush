{config_load file=$language_file section="general"}{if $subnav_location && $subnav_location_var}{assign var="subnav_location" value=$smarty.config.$subnav_location|replace:"[var]":$subnav_location_var}{elseif $subnav_location}{assign var='subnav_location' value=$smarty.config.$subnav_location}{/if}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{#language#}" dir="{#dir#}">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Onyx Data Systems" />
<meta http-equiv="content-type" content="text/html; charset={#charset#}" />
<title>{if $page_title}{$page_title} - {elseif $subnav_location}{$subnav_location} - {/if}{$settings.forum_name|escape:"html"}</title>
<meta name="description" content="{$settings.forum_description|escape:"html"}" />
{if $keywords}<meta name="keywords" content="{$keywords}" />{/if}

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{$MAIN_SITE_URL}/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="{$MAIN_SITE_URL}/style.css" type="text/css" />
	<link rel="stylesheet" href="{$MAIN_SITE_URL}/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="{$MAIN_SITE_URL}/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="{$MAIN_SITE_URL}/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="{$MAIN_SITE_URL}/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="{$MAIN_SITE_URL}/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	{if $keywords}<meta name="keywords" content="{$keywords}" />{/if}
{if $mode=='posting'}
<meta name="robots" content="noindex" />
{/if}
{if !$top}
<link rel="top" href="./" />
{/if}
{if $link_rel_first}
<link rel="first" href="{$link_rel_first}" />
{/if}
{if $link_rel_prev}
<link rel="prev" href="{$link_rel_prev}" />
{/if}
{* if $link_rel_next}
<link rel="next" href="{$link_rel_next}" />
{/if *}
{if $link_rel_last}
<link rel="last" href="{$link_rel_last}" />
{/if}
<link rel="search" href="index.php?mode=search" />
<link rel="shortcut icon" href="{$FORUM_ADDRESS}/{$THEMES_DIR}/{$theme}/images/favicon.ico" />
{if $mode=='entry'}<link rel="canonical" href="{$settings.forum_address}index.php?mode=thread&amp;id={$tid}" />{/if}
<script src="{$FORUM_ADDRESS}/index.php?mode=js_defaults&amp;t={$settings.last_changes}{if $user}&amp;user_type={if $mod}1{elseif $admin}2{else}0{/if}{/if}" type="text/javascript" charset="utf-8"></script>
<script src="{$FORUM_ADDRESS}/js/main.min.js" type="text/javascript" charset="utf-8"></script>
{if $mode=='posting'}
<script src="{$FORUM_ADDRESS}/js/posting.min.js" type="text/javascript" charset="utf-8"></script>
{/if}
{if $mode=='admin'}
<script src="{$FORUM_ADDRESS}/js/admin.min.js" type="text/javascript" charset="utf-8"></script>
{/if}
{if $settings.bbcode_latex && $settings.bbcode_latex_uri}
<script type="text/javascript" async src="{$settings.bbcode_latex_uri}"></script>
<script type="text/x-mathjax-config">/*<![CDATA[*/MathJax.Hub.Config({
    tex2jax: {
        inlineMath: [ ["$","$"], ["\\(","\\)"] ],
        displayMath: [ ["$$","$$"], ["\\[","\\]"] ],
		ignoreClass: "tex2jax_ignore",
		processClass: "tex2jax_process",
        processEscapes: true
    },

    TeX: {
        equationNumbers: { autoNumber: "AMS" }
    }
});
/*!]]>*/</script>
{/if}

	<!-- Document Title
	============================================= -->
	<title>How It Works | <?=$site_name;?></title>

</head>

<body class="stretched tex2jax_ignore">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index" class="standard-logo" data-dark-logo="{$MAIN_SITE_URL}/images/logo-dark.png"><img src="{$MAIN_SITE_URL}/images/logo.png" alt="Canvas Logo"></a>
						<a href="index" class="retina-logo" data-dark-logo="{$MAIN_SITE_URL}/images/logo-dark@2x.png"><img src="{$MAIN_SITE_URL}/images/logo@2x.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li class="current"><a href="{$MAIN_SITE_URL}/index"><div>Home</div></a>
							<li><a href="{$MAIN_SITE_URL}/about"><div>About FFN</div></a>
							<li><a href="{$MAIN_SITE_URL}/howitworks"><div>How It Works</div></a>
							<li><a href="{$MAIN_SITE_URL}/benefits"><div>Benefits</div></a>
							<li><a href="{$MAIN_SITE_URL}/w_highlights"><div>Weekly Highlights</div></a>
							<li><a href="{$MAIN_SITE_URL}/forum"><div>Forum</div></a>
							<li><a href="{$MAIN_SITE_URL}/news"><div>News</div></a>
							<!--<li><a href="faqs"><div>FAQ</div></a>-->
							<li><a href="{$MAIN_SITE_URL}/contact"><div>Contact</div></a>
							<li><a href="{$MAIN_SITE_URL}/login-register"><div>start</div></a>
								
						</ul>
						<div id="top-cart">
							<a href="login-register" id="top-cart-trigger"><i class="icon-user2"></i></a>
						</div>

						

						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header>
		<!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Talkpoint</h1>
				<span>...reward football fans worldwide</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Talkpoint</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_four_fifth nobottommargin ">

						<div class="heading-block">
							<!--<h3>Talkpoint</h3>
							<span>Let's talk football</span>-->
							<table align="right" width="40%" border="0">
							  <tbody>
								<tr>
								  <td><a href="index.php?refresh=1&category=0">Refresh</a></td>
								  <td><a href="index.php?mode=index&thread_order=1">Order</a></td>
									<td><a href="index.php?fold_threads=1">Fold threads</a></td>
								  <td><a href="index.php?toggle_view=1">Table view</td>
								</tr>
							  </tbody>
							</table>

							
							
							
							<form id="topsearch" action="index.php" method="get" title="{#search_title#}" accept-charset="{#charset#}"><div><input type="hidden" name="mode" value="search" /><label for="search-input">{#search_marking#}</label>&nbsp;<input id="search-input" class="form-control" type="text" name="search" value="{#search_default_value#}" /><!--&nbsp;<input type="image" src="templates/{$settings.template}/images/submit.png" alt="[&raquo;]" />--></div></form>
						</div>

					<li><a href="index.php?mode=user" title="{#user_area_link_title#}">{#user_area_link#}</a></li>

<div id="content">
{if $subtemplate}
{include file="$theme/subtemplates/$subtemplate"}
{else}
{$content|default:""}
{/if}
</div>

					</div>
					
					<div class="col_one_fifth topmargin nobottommargin col_last" style="min-height: 350px;">
						<!--<a href="index.php?mode=posting">New Topic</a>-->
						{if $user}<li><a href="index.php?mode=user&amp;action=edit_profile" title="{#profile_link_title#}"><strong>{$user}</strong></a></li><li><a href="index.php?mode=user&amp;action=show_posts&amp;id={$user_id}">{#show_all_postings_link#}</a></li><li><a href="index.php?mode=bookmarks">{#show_bookmarks_link#}</a></li><li><a href="index.php?mode=user" title="{#user_area_link_title#}">{#user_area_link#}</a></li>{if $admin}<li><a href="index.php?mode=admin" title="{#admin_area_link_title#}">{#admin_area_link#}</a></li>{/if}<li><a href="index.php?mode=login" title="{#log_out_link_title#}">{#log_out_link#}</a></li>{else}<li><a href="{$MAIN_SITE_URL}/login-register" title="{#log_in_link_title#}">{#log_in_link#}</a></li>{if $settings.register_mode!=2}<li><a href="{$MAIN_SITE_URL}/login-register" title="{#register_link_title#}">{#register_link#}</a></li>{/if}{if $settings.user_area_public}<li><a href="index.php?mode=user" title="{#user_area_link_title#}">{#user_area_link#}</a></li>{/if}{/if}
						
						<div id="subnav">
<div id="subnav-1">{include file="$theme/subtemplates/subnavigation_1.inc.tpl"}</div>
<div id="subnav-2">{include file="$theme/subtemplates/subnavigation_2.inc.tpl"}</div>
</div>
					</div>

					<div class="clear"></div><div class="line"></div>

					

				</div>

				<a href="{$MAIN_SITE_URL}/contact" class="button button-full center tright topmargin footer-stick">
					<div class="container clearfix">
						Need help with your Account? <strong>Start here</strong> <i class="icon-caret-right" style="top:4px;"></i>
					</div>
				</a>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_two_third">

						<div class="col_half">

							<div class="widget clearfix">

								<img src="{$MAIN_SITE_URL}/images/footer-widget-logo.png" alt="" class="footer-logo">

								<p>To create <strong>community</strong> of <strong>football fans</strong> all over the world to meet and engage in <strong>beneficial activity</strong></p>

								<div style="background: url('{$MAIN_SITE_URL}/images/world-map.png') no-repeat center center; background-size: 100%;">
									<!--<address>
										<strong>Headquarters:</strong><br>
										795 Folsom Ave, Suite 600<br>
										San Francisco, CA 94107<br>
									</address>-->
									<abbr title="Phone Number"><strong>Phone:</strong></abbr> (234) 903 215 4426<br>
									<!--<abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>-->
									<abbr title="Email Address"><strong>Email:</strong></abbr> info@footballfansnetwork.com
								</div>

							</div>

						</div>


						<div class="col_half col_last">

							<div class="widget clearfix">
								<h4>Recent Posts</h4>

								<div id="post-list-footer">
									<?php
									$news_info = $client_operation->get_news('','3');
									if(isset($news_info) && !empty($news_info)) { foreach ($news_info as $row) {
										$news_id = $row['news_id'];
									?>
									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="{$MAIN_SITE_URL}/news?id=<?=$news_id;?>"><?=$row['news_title'];?></a></h4>
											</div>
											<ul class="entry-meta">
												<li><?= date('d M Y', strtotime($row['news_date']));?></li>
											</ul>
										</div>
									</div>

									<?php } }?>
								</div>
							</div>

						</div>

					</div>

					<div class="col_one_third col_last">

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-lg-6 bottommargin-sm">
									<div class="counter counter-small"><span data-from="50" data-to="1506542" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Daily visitors</h5>
								</div>

								<div class="col-lg-6 bottommargin-sm">
									<div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Members</h5>
								</div>

							</div>

						</div>

						<div class="widget subscribe-widget clearfix">
							<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
							<div class="widget-subscribe-form-result"></div>
							<form id="widget-subscribe-form" action="{$MAIN_SITE_URL}/include/subscribe.php" role="form" method="post" class="nobottommargin">
								<div class="input-group divcenter">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="icon-email2"></i></div>
									</div>
									<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
									<div class="input-group-append">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</div>
								</div>
							</form>
						</div>

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-lg-6 clearfix bottommargin-sm">
									<a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
								</div>
								<div class="col-lg-6 clearfix">
									<a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
										<i class="icon-rss"></i>
										<i class="icon-rss"></i>
									</a>
									<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
								</div>

							</div>

						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2014 All Rights Reserved by Football Fans Network<br>
						<div class="copyright-links"><a href="{$MAIN_SITE_URL}/terms2">Terms of Use</a> / <a href="{$MAIN_SITE_URL}/privacy_policy">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="#" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<!--<a href="#" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>-->

							<a href="#" class="social-icon si-small si-borderless si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<!--<a href="#" class="social-icon si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>-->

							<a href="#" class="social-icon si-small si-borderless si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> <a href="mailto:info@footballfansnetwork.com">info@footballfansnetwork.com</a> <span class="middot">&middot;</span> <i class="icon-headphones"></i> <a href="tel:+2349032154426">+(234) 903 215 4426</a> <span class="middot">&middot;</span> <i class="icon-skype2"></i> FFN
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer>
		<!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="{$MAIN_SITE_URL}/js/jquery.js"></script>
	<script src="{$MAIN_SITE_URL}/js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{$MAIN_SITE_URL}/js/functions.js"></script>

	<!-- Charts JS
	============================================= -->
	<script src="{$MAIN_SITE_URL}/js/chart.js"></script>
	<script src="{$MAIN_SITE_URL}/js/chart-utils.js"></script>


</body>
</html>