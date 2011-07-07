<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();

 	global $post;
 	$categories = get_the_category($post->ID);
 	if ( $categories ) {
 	foreach ($categories as $category) {
 		$dw_category_slug = $category->slug;
 		// $dw_category_name = $category->name;
 	}  
 	}else {
 		$dw_category_slug = 'utopia';
 	} 
 	         

?> 
<!-- <link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/css/supersized.css" type="text/css" media="screen" /> -->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/supersized.3.0.core.js"></script> 
<script type="text/javascript"> 
jQuery.noConflict(); 
// when the DOM is ready
jQuery(document).ready(function($)  {
		$.fn.supersized.options = {  
			startwidth: 4,  
			startheight: 3,
		     vertical_center: 1,
			slides : [
				{image : '<?php bloginfo("stylesheet_directory"); ?>/images/<?php echo $dw_category_slug; ?>.jpg' }
			]
		};
        $('#supersized').supersized(); 
    });
</script>
<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/equal_heights.js"></script> 
<script type="text/javascript">
		 jQuery.noConflict();
		jQuery(document).ready(function() {
	jQuery('#footer-widget-area').equalHeights(true);
	});
	</script>
</head>
 
<body>
	<div id="supersized"></div> 
	<div id="header">
				<div id="site-title">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div>
				<div id="site-description"><span id="searchform"><?php get_sidebar('searchform'); ?></span><?php wp_nav_menu(); ?> </div> 
                

			
	   
	</div><!-- #header --> 
	<!-- <div id="content-wrapper">  -->
<div id="wrapper" class="hfeed">
                  	<!-- <div id="access" role="navigation">   -->
	 
		<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
		<?php // wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
	<!-- </div> --><!-- #access -->

	<div id="main">
