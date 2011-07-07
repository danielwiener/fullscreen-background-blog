<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.0
 */

get_header(); 
   	global $post;
	$categories = get_the_category($post->ID);
	foreach ($categories as $category) {
	   //$dw_category_slug = $category->slug;
		$dw_category_name = $category->name;
	}
	?>

		<div id="container">
			<div id="content" role="main">
                   <h1 class="page-title"><?php echo $dw_category_name; ?></h1>
			<?php
			/* Run the loop to output the post.*/
			get_template_part( 'loop', 'single' );
			?>
              
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>
