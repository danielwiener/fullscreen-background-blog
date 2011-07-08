<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.0
 */

get_header();        
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
