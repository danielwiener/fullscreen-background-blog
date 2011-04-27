<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
				<?php $dw_page_title = $wp_query->post->post_title; ?>
            <h1 class="page-title"><?php echo $dw_page_title; ?></h1>
			<?php
			/* Run the loop to output the page.*/
			get_template_part( 'loop', 'page' );
			?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
