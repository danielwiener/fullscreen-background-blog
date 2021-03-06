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
    // global $dw_category_name; //need this so that I can use the variable in single.php so now in theory there is one query for categories.
  	//   $the_post_cats = dw_get_category();
  	// $dw_category_name = $the_post_cats['name'];
  	// $dw_category_slug = $the_post_cats['slug'];   
      $dw_category = dw_get_category();
		if ( is_front_page() ) {
			$dw_category['slug'] = 'news';
		}

?> 
<!-- <link rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/css/supersized.css" type="text/css" media="screen" /> -->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>


</head>
 
<body> 
	<?php // print_r($dw_category['slug']); ?>
	<div id="supersized"></div> 
	<div id="header">
				<div id="site-title">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div>
				<div id="site-description"><span id="searchform"><?php get_sidebar('searchform'); ?></span><?php wp_nav_menu( array( 'menu' => 'Navigation Menu') ); ?> </div> 
                

			
	   
	</div><!-- #header --> 
	<!-- <div id="content-wrapper">  -->
<div id="wrapper" class="hfeed">
                  	<!-- <div id="access" role="navigation">   -->
	 
		<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
		<?php // wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
	<!-- </div> --><!-- #access -->

	<div id="main">
