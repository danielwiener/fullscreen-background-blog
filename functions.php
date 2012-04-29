<?php
/**
 * The function file.
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 600;

/* Numeric Pagination *******************************************

This if from the Gravy template by Darren Hoyt. http://www.darrenhoyt.com 
*/

function numeric_pagination ($pageCount = 5, $query = null) {

	if ($query == null) {
		global $wp_query;
		$query = $wp_query;
	}
	
	if ($query->max_num_pages <= 1) {
		return;
	}

	$pageStart = 1;
	$paged = $query->query_vars['paged'];
	
	// set current page if on the first page
	if ($paged == null) {
		$paged = 1;
	}
	
	// work out if page start is halfway through the current visible pages and if so move it accordingly
	if ($paged > floor($pageCount / 2)) {
		$pageStart = $paged	- floor($pageCount / 2);
	}

	if ($pageStart < 1) {
		$pageStart = 1;
	}

	// make sure page start is 
	if ($pageStart + $pageCount > $query->max_num_pages) {
		$pageCount = $query->max_num_pages - $pageStart;
	}
	
?>
	<div id="archive_pagination">
<?php
	if ($paged != 1) {
?>
	<a href="<?php echo get_pagenum_link(1); ?>" class="numbered page-number-first"><span>&lsaquo; <?php _e('Newest', 'twentyten'); ?></span></a>
<?php
	}
	// first page is not visible...
	if ($pageStart > 1) {
		//echo 'previous';
	}
	for ($p = $pageStart; $p <= $pageStart + $pageCount; $p ++) {
		if ($p == $paged) {
?>
		<span class="numbered page-number-<?php echo $p; ?> current-numeric-page"><?php echo $p; ?></span>
<?php } else { ?>
		<a href="<?php echo get_pagenum_link($p); ?>" class="numbered page-number-<?php echo $p; ?>"><span><?php echo $p; ?></span></a>
<?php
		}
	}
	// last page is not visible
	if ($pageStart + $pageCount < $query->max_num_pages) {
		//echo "last";
	}
	if ($paged != $query->max_num_pages) {
?>
		<a href="<?php echo get_pagenum_link($query->max_num_pages); ?>" class="numbered page-number-last"><span><?php _e('Oldest', 'gravy'); ?> &rsaquo;</span></a>
<?php } ?>
	</div>
<?php } /* end of pagination */ 
 add_action('wp_head', 'dw_get_category'); 
function dw_get_category() {
	global $post;
	$categories = get_the_category($post->ID);
		if ( $categories ) {
			foreach ($categories as $category) {
			$dw_category_slug = $category->slug;
			$dw_category_name = $category->name;
		} //foreach
		} else {
		$dw_category_slug = 'utopia';
		}         
	$dw_category = array('name' => $dw_category_name, 'slug' => $dw_category_slug);
	return $dw_category;     
  }                                                   

function remove_dashboard_widgets() {
	// Globalize the metaboxes array, this holds all the widgets for wp-admin
 	global $wp_meta_boxes;

	// Remove the incomming links widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);	
    	//Recent Comments
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	// Remove 
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	//Recent Drafts List
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}

// Hook into the 'wp_dashboard_setup' action to register our function
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

// remove junk from head  
//http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
//remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
//http://www.google-adsense-templates.co.uk/removing-wordpress-generator-version-and-other-code-from-the-head.html
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
//http://pixelpunk.co.uk/2010/01/disable-wordpress-built-in-canonical-url/
remove_action('wp_head', 'rel_canonical');

 function dw_instructions_dashboard_widget_function() {
 ?>

	 <h4><a href="http://documentation.diyartportfolios.com/" target="_blank">Basic Wordpress Instructions and How to Create Online Content</a></h4>
	 <p>Here is a list of recent instructions. I will be adding to it, as needed. Click the link above to see all the instructions. If you want something explained to you I will add it.</p>
	<?php //comments - do this for grants category only. And maybe separate it into another function.  
	//http://wpsnipp.com/index.php/functions-php/replace-dashboard-news-feed-with-another-rss-feed/
	echo '<div class="rss-widget">';
	     wp_widget_rss_output(array(
	          'url' => 'http://documentation.diyartportfolios.com/feed',
	          'title' => 'Helpful Documentation',
	          'items' => 10,
	          'show_summary' => 0,
	          'show_author' => 0,
	          'show_date' => 0
	     ));
	     echo '</div>';?> 
<?php

}     

// Create the function use in the action hook

function dw_add_dashboard_widgets() { 

wp_add_dashboard_widget('dw_instructions_dashboard_widget', 'General Instructions', 'dw_instructions_dashboard_widget_function');

} 

// Hook into the 'wp_dashboard_setup' action to register our other functions

add_action('wp_dashboard_setup', 'dw_add_dashboard_widgets' ); 


//http://techmasher.co.cc/customizing-the-wordpress-admin-area/ 
//http://www.strangework.com/2010/03/24/how-to-hide-an-admin-menu-in-wordpress/
// http://codex.wordpress.org/Function_Reference/remove_meta_box
	
	
function dw_remove_many_meta_boxes() { 
	global $current_user;
	get_currentuserinfo();	
   	
		if($current_user->user_login != 'danielwiener') {
		
		  //  remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' );// - Comments status metabox.
		  //  remove_meta_box( 'commentsdiv' , 'post' , 'normal' );// - Comments metabox.
		    remove_meta_box( 'slugdiv' , 'post' , 'normal' );// - Slug metabox.
		    remove_meta_box( 'revisionsdiv' , 'post' , 'normal' );// - Revisions metabox.
		    remove_meta_box( 'authordiv' , 'post' , 'normal' );// - Author metabox.
		    remove_meta_box( 'postcustom' , 'post' , 'normal' );// - Custom fields metabox.
		    //remove_meta_box( 'postexcerpt' , 'post' , 'normal' );// - Excerpt metabox.
		    remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' );// - Trackbacks metabox.
		    //remove_meta_box( 'postimagediv' , 'post' , 'side' );// - Featured image metabox.
		    remove_meta_box( 'formatdiv' , 'post' , 'side' );// - Formats metabox.
		    //remove_meta_box( 'tagsdiv-post_tag' , 'post' , 'side' );// - Tags metabox.
		  //  remove_meta_box( 'categorydiv' , 'post' , 'side' );// - Categories metabox. 

		}  //if current user                                        

}  // remove meta boxes function
add_action( 'do_meta_boxes' , 'dw_remove_many_meta_boxes' );

add_action( 'admin_menu', 'my_remove_menu_pages' );


// remove links and tools menus
function my_remove_menu_pages() {
			 
	global $current_user;
	get_currentuserinfo();			
	
		if($current_user->user_login != 'danielwiener') { 
			remove_menu_page('link-manager.php');
			remove_menu_page('tools.php');
		} //end if current user.	
} //end function

// add google analytics to footer
function add_google_analytics() {
echo '<script type="text/javascript">';
echo "\n";
echo '  var _gaq = _gaq || [];';
echo '  _gaq.push(["_setAccount", "UA-24505776-1"]);';
echo '  _gaq.push(["_trackPageview"]);';
echo "\n";
echo '  (function() {';
echo '    var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;';
echo '    ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";';
echo '    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);';
echo '  })();';
echo "\n";
echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');

?>