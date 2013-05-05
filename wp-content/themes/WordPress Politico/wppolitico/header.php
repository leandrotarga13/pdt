<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" /> 

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/scripts/prettyPhoto.css" type="text/css" media="screen" />
<!--[if IE]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie_style.css" type="text/css" />
<![endif]-->

<?php wp_head(); ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php $theme_options = get_option('option_tree'); ?>

<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->

<style type="text/css">
a {color:<?php get_option_tree('link_color',$theme_options,'true'); ?>;}

a#cntdwnLink {color:<?php get_option_tree('accent_color',$theme_options,'true'); ?>;}

<?php $imageData=getImageSize(get_option_tree('logo')); ?>
a.logo {height: <?php echo($imageData[1]);?>px; width: <?php echo($imageData[0]);?>px; background: url(<?php get_option_tree('logo',$theme_options,'true');?>) no-repeat;}

#sliderContainer {
background:<?php get_option_tree('link_color',$theme_options,'true'); ?>;
background: -webkit-gradient(linear, left top, left bottom, from(<?php get_option_tree('banner_top',$theme_options,'true'); ?>), to(<?php get_option_tree('banner_bottom',$theme_options,'true'); ?>));
background: -moz-linear-gradient(top,  <?php get_option_tree('banner_top',$theme_options,'true'); ?>,  <?php get_option_tree('banner_bottom',$theme_options,'true'); ?>) ;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php get_option_tree('banner_top',$theme_options,'true'); ?>', endColorstr='<?php get_option_tree('banner_bottom',$theme_options,'true'); ?>');
}

a#donate {
color: <?php get_option_tree('donate_text_color',$theme_options,'true'); ?>;
border: 1px solid <?php get_option_tree('donate_bottom_color',$theme_options,'true'); ?>;
background:<?php get_option_tree('donate_bottom_color',$theme_options,'true'); ?>;
background: -webkit-gradient(linear, left top, left bottom, from(<?php get_option_tree('donate_top_color',$theme_options,'true'); ?>), to(<?php get_option_tree('donate_bottom_color',$theme_options,'true'); ?>));
background: -moz-linear-gradient(top,  <?php get_option_tree('donate_top_color',$theme_options,'true'); ?>,  <?php get_option_tree('donate_bottom_color',$theme_options,'true'); ?>) ;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php get_option_tree('donate_top_color',$theme_options,'true'); ?>', endColorstr='<?php get_option_tree('donate_bottom_color',$theme_options,'true'); ?>');
}
a#donate:hover {
	background:<?php get_option_tree('donate_top_color',$theme_options,'true'); ?>;
	background: -webkit-gradient(linear, left top, left bottom, from(<?php get_option_tree('donate_bottom_color',$theme_options,'true'); ?>), to(<?php get_option_tree('donate_top_color',$theme_options,'true'); ?>));
	background: -moz-linear-gradient(top,  <?php get_option_tree('donate_bottom_color',$theme_options,'true'); ?>,  <?php get_option_tree('donate_top_color',$theme_options,'true'); ?>) ;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php get_option_tree('donate_bottom_color',$theme_options,'true'); ?>', endColorstr='<?php get_option_tree('donate_top_color',$theme_options,'true'); ?>');
}

<?php if(get_option_tree('countdown_on_off') && is_front_page()) { ?>
#content {
	background: url(<?php bloginfo('template_url'); ?>/images/counter_bg.jpg) no-repeat center top; 
	padding: 35px 0 65px;
}
body.page-template-fullpage-php #content {
	background: url(<?php bloginfo('template_url'); ?>/images/divider.png) no-repeat center 100px; 
}
<?php } else { ?>
#content {
	background: url(<?php bloginfo('template_url'); ?>/images/content_bg.jpg) no-repeat right top;
	padding: 50px 0 65px;
}
<?php } ?>

</style>

</head>

<body <?php body_class();?>>

<div id="headerContainer">	
	<div id="header">
		<a class="logo" href="<?php bloginfo('url')?>"><?php bloginfo('name'); ?></a>    
		<?php if(get_option_tree('donate_on_off')) { ?><a id="donate" <?php if(get_option_tree('donate_new_window')) { ?>target="_blank"<?php } ?> href="<?php get_option_tree('donate_link',$theme_options,'true'); ?>"><?php get_option_tree('donate_text',$theme_options,'true'); ?></a><?php } ?>
		<?php wp_nav_menu(array('theme_location' => 'main', 'container_id' => 'navigation', 'menu_id' => 'dropmenu')); ?>
	</div><!--end header-->
	<div id="sliderContainer">
		<div id="sliderStyle">
			<div id="slider">			
				<?php if(is_front_page()) { ?>
					<?php $slider = get_option_tree('slider_type'); include("". $slider ."slider.php");?>
				<?php } elseif(is_single() || is_page()) { ?>
					<?php $data = get_post_meta( $post->ID, 'key', true ); ?>
					<h1 id="title"><?php the_title(); ?> <?php  if ($data[ 'custom_subtext' ]) { ?><span><?php echo $data[ 'custom_subtext' ]; ?></span><?php } ?></h1>
				<?php } elseif(is_404()) { ?>
					<h1 id="title">Error 404 <span>We could not find what was requested</span></h1>
				<?php } elseif(is_search()) { ?>
					<h1 id="title">Search Results <span><?php $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('"'); echo $key; _e('"'); _e(' &mdash; '); echo $count . ' '; _e('matches'); wp_reset_query(); ?></span></h1>
				<?php } elseif(is_category()) { ?>
					<h1 id="title"><?php single_cat_title(); ?> <span><?php if(category_description()) { $text = category_description(); echo strip_tags($text); } ?></span></h1>
				<?php } elseif( is_tag() ) { ?>
					<h1 id="title"><?php single_tag_title(); ?></h1>
				<?php } elseif (is_day()) { ?>
					<h1 id="title">Archive for <?php the_time('F jS, Y'); ?></h1>
				<?php } elseif (is_month()) { ?>
					<h1 id="title">Archive for <?php the_time('F, Y'); ?></h1>
				<?php } elseif (is_year()) { ?>
					<h1 id="title">Archive for <?php the_time('Y'); ?></h1>
				<?php } elseif (is_author()) { ?>
					<h1 id="title">Author Archive</h1>
				<?php } ?>
			</div><!--end slider-->
		</div><!--end sliderStyle-->
	</div><!--end sliderContainer-->
</div><!--end headerContainer-->	

<div id="contentContainer">
	<div id="content">

		<?php if(get_option_tree('countdown_on_off') && is_front_page()) { ?>
		<div id="countdown">
			<a id="cntdwnLink" href="<?php get_option_tree('countdown_link',$theme_options,'true'); ?>"><?php get_option_tree('countdown_text',$theme_options,'true'); ?></a>
			<a href="<?php get_option_tree('countdown_link',$theme_options,'true'); ?>">
			<script type="text/javascript">
				CountActive = <?php get_option_tree('countdown_active',$theme_options,'true'); ?>;
				TargetDate = "<?php get_option_tree('countdown_date',$theme_options,'true'); ?>";
				DisplayFormat = "<?php get_option_tree('countdown_format',$theme_options,'true'); ?>";
				FinishMessage = "<?php get_option_tree('countdown_finish_text',$theme_options,'true'); ?>";
			</script>
			<script src="<?php bloginfo('template_url'); ?>/scripts/countdown.js" type="text/javascript"></script>
			</a>
		</div>
		<?php } ?>	

		<div id="main">

			<?php if (function_exists('dimox_breadcrumbs') && !is_front_page()) dimox_breadcrumbs(); ?>