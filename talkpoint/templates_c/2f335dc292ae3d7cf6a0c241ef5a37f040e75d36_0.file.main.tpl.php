<?php
/* Smarty version 3.1.32, created on 2019-05-21 10:42:27
  from 'C:\wamp\www\footballfannetwork\talkpoint\themes\default\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ce3d61329aba6_55103144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f335dc292ae3d7cf6a0c241ef5a37f040e75d36' => 
    array (
      0 => 'C:\\wamp\\www\\footballfannetwork\\talkpoint\\themes\\default\\main.tpl',
      1 => 1554815537,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce3d61329aba6_55103144 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp\\www\\footballfannetwork\\talkpoint\\modules\\smarty\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, $_smarty_tpl->tpl_vars['language_file']->value, "general", 0);
if ($_smarty_tpl->tpl_vars['subnav_location']->value && $_smarty_tpl->tpl_vars['subnav_location_var']->value) {
$_smarty_tpl->_assignInScope('subnav_location', smarty_modifier_replace($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['subnav_location']->value),"[var]",$_smarty_tpl->tpl_vars['subnav_location_var']->value));
} elseif ($_smarty_tpl->tpl_vars['subnav_location']->value) {
$_smarty_tpl->_assignInScope('subnav_location', $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['subnav_location']->value));
}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'language');?>
" dir="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'dir');?>
">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Onyx Data Systems" />
<meta http-equiv="content-type" content="text/html; charset=<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'charset');?>
" />
<title><?php if ($_smarty_tpl->tpl_vars['page_title']->value) {
echo $_smarty_tpl->tpl_vars['page_title']->value;?>
 - <?php } elseif ($_smarty_tpl->tpl_vars['subnav_location']->value) {
echo $_smarty_tpl->tpl_vars['subnav_location']->value;?>
 - <?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['forum_name'], ENT_QUOTES, 'UTF-8', true);?>
</title>
<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['forum_description'], ENT_QUOTES, 'UTF-8', true);?>
" />
<?php if ($_smarty_tpl->tpl_vars['keywords']->value) {?><meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" /><?php }?>

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php if ($_smarty_tpl->tpl_vars['keywords']->value) {?><meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" /><?php }
if ($_smarty_tpl->tpl_vars['mode']->value == 'posting') {?>
<meta name="robots" content="noindex" />
<?php }
if (!$_smarty_tpl->tpl_vars['top']->value) {?>
<link rel="top" href="./" />
<?php }
if ($_smarty_tpl->tpl_vars['link_rel_first']->value) {?>
<link rel="first" href="<?php echo $_smarty_tpl->tpl_vars['link_rel_first']->value;?>
" />
<?php }
if ($_smarty_tpl->tpl_vars['link_rel_prev']->value) {?>
<link rel="prev" href="<?php echo $_smarty_tpl->tpl_vars['link_rel_prev']->value;?>
" />
<?php }
if ($_smarty_tpl->tpl_vars['link_rel_last']->value) {?>
<link rel="last" href="<?php echo $_smarty_tpl->tpl_vars['link_rel_last']->value;?>
" />
<?php }?>
<link rel="search" href="index.php?mode=search" />
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['FORUM_ADDRESS']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/favicon.ico" />
<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'entry') {?><link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['settings']->value['forum_address'];?>
index.php?mode=thread&amp;id=<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
" /><?php }
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['FORUM_ADDRESS']->value;?>
/index.php?mode=js_defaults&amp;t=<?php echo $_smarty_tpl->tpl_vars['settings']->value['last_changes'];
if ($_smarty_tpl->tpl_vars['user']->value) {?>&amp;user_type=<?php if ($_smarty_tpl->tpl_vars['mod']->value) {?>1<?php } elseif ($_smarty_tpl->tpl_vars['admin']->value) {?>2<?php } else { ?>0<?php }
}?>" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['FORUM_ADDRESS']->value;?>
/js/main.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'posting') {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['FORUM_ADDRESS']->value;?>
/js/posting.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
<?php }
if ($_smarty_tpl->tpl_vars['mode']->value == 'admin') {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['FORUM_ADDRESS']->value;?>
/js/admin.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
<?php }
if ($_smarty_tpl->tpl_vars['settings']->value['bbcode_latex'] && $_smarty_tpl->tpl_vars['settings']->value['bbcode_latex_uri']) {
echo '<script'; ?>
 type="text/javascript" async src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['bbcode_latex_uri'];?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/x-mathjax-config">/*<![CDATA[*/MathJax.Hub.Config({
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
/*!]]>*/<?php echo '</script'; ?>
>
<?php }?>

	<!-- Document Title
	============================================= -->
	<title>How It Works | <?php echo '<?=';?>$site_name;<?php echo '?>';?></title>

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
						<a href="index" class="standard-logo" data-dark-logo="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/images/logo-dark.png"><img src="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/images/logo.png" alt="Canvas Logo"></a>
						<a href="index" class="retina-logo" data-dark-logo="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/images/logo-dark@2x.png"><img src="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/images/logo@2x.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li class="current"><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/index"><div>Home</div></a>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/about"><div>About FFN</div></a>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/howitworks"><div>How It Works</div></a>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/benefits"><div>Benefits</div></a>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/w_highlights"><div>Weekly Highlights</div></a>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/forum"><div>Forum</div></a>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/news"><div>News</div></a>
							<!--<li><a href="faqs"><div>FAQ</div></a>-->
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/contact"><div>Contact</div></a>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/login-register"><div>start</div></a>
								
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

							
							
							
							<form id="topsearch" action="index.php" method="get" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'search_title');?>
" accept-charset="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'charset');?>
"><div><input type="hidden" name="mode" value="search" /><label for="search-input"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'search_marking');?>
</label>&nbsp;<input id="search-input" class="form-control" type="text" name="search" value="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'search_default_value');?>
" /><!--&nbsp;<input type="image" src="templates/<?php echo $_smarty_tpl->tpl_vars['settings']->value['template'];?>
/images/submit.png" alt="[&raquo;]" />--></div></form>
						</div>

					<li><a href="index.php?mode=user" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'user_area_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'user_area_link');?>
</a></li>

<div id="content">
<?php if ($_smarty_tpl->tpl_vars['subtemplate']->value) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['theme']->value)."/subtemplates/".((string)$_smarty_tpl->tpl_vars['subtemplate']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
} else {
echo (($tmp = @$_smarty_tpl->tpl_vars['content']->value)===null||$tmp==='' ? '' : $tmp);?>

<?php }?>
</div>

					</div>
					
					<div class="col_one_fifth topmargin nobottommargin col_last" style="min-height: 350px;">
						<!--<a href="index.php?mode=posting">New Topic</a>-->
						<?php if ($_smarty_tpl->tpl_vars['user']->value) {?><li><a href="index.php?mode=user&amp;action=edit_profile" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'profile_link_title');?>
"><strong><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</strong></a></li><li><a href="index.php?mode=user&amp;action=show_posts&amp;id=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'show_all_postings_link');?>
</a></li><li><a href="index.php?mode=bookmarks"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'show_bookmarks_link');?>
</a></li><li><a href="index.php?mode=user" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'user_area_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'user_area_link');?>
</a></li><?php if ($_smarty_tpl->tpl_vars['admin']->value) {?><li><a href="index.php?mode=admin" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'admin_area_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'admin_area_link');?>
</a></li><?php }?><li><a href="index.php?mode=login" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'log_out_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'log_out_link');?>
</a></li><?php } else { ?><li><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/login-register" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'log_in_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'log_in_link');?>
</a></li><?php if ($_smarty_tpl->tpl_vars['settings']->value['register_mode'] != 2) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/login-register" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'register_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'register_link');?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['settings']->value['user_area_public']) {?><li><a href="index.php?mode=user" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'user_area_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'user_area_link');?>
</a></li><?php }
}?>
						
						<div id="subnav">
<div id="subnav-1"><?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['theme']->value)."/subtemplates/subnavigation_1.inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div>
<div id="subnav-2"><?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['theme']->value)."/subtemplates/subnavigation_2.inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div>
</div>
					</div>

					<div class="clear"></div><div class="line"></div>

					

				</div>

				<a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/contact" class="button button-full center tright topmargin footer-stick">
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

								<img src="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/images/footer-widget-logo.png" alt="" class="footer-logo">

								<p>To create <strong>community</strong> of <strong>football fans</strong> all over the world to meet and engage in <strong>beneficial activity</strong></p>

								<div style="background: url('<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/images/world-map.png') no-repeat center center; background-size: 100%;">
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
									<?php echo '<?php
									';?>$news_info = $client_operation->get_news('','3');
									if(isset($news_info) && !empty($news_info)) { foreach ($news_info as $row) {
										$news_id = $row['news_id'];
									<?php echo '?>';?>
									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/news?id=<?php echo '<?=';?>$news_id;<?php echo '?>';?>"><?php echo '<?=';?>$row['news_title'];<?php echo '?>';?></a></h4>
											</div>
											<ul class="entry-meta">
												<li><?php echo '<?=';?> date('d M Y', strtotime($row['news_date']));<?php echo '?>';?></li>
											</ul>
										</div>
									</div>

									<?php echo '<?php ';?>} }<?php echo '?>';?>
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
							<form id="widget-subscribe-form" action="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/include/subscribe.php" role="form" method="post" class="nobottommargin">
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
						<div class="copyright-links"><a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/terms2">Terms of Use</a> / <a href="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/privacy_policy">Privacy Policy</a></div>
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
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/js/jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/js/plugins.js"><?php echo '</script'; ?>
>

	<!-- Footer Scripts
	============================================= -->
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/js/functions.js"><?php echo '</script'; ?>
>

	<!-- Charts JS
	============================================= -->
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/js/chart.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['MAIN_SITE_URL']->value;?>
/js/chart-utils.js"><?php echo '</script'; ?>
>


</body>
</html><?php }
}
