<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
				<h1 class="page-title"><?php echo single_tag_title( '', false ); ?></h1>  
				<?php

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'tag' );
				?>
                <?php if ( $wp_query->max_num_pages > 1 ) : ?>
					<div class="date">Pages</div> 
					<div class="post"><?php numeric_pagination(); ?></a></div> 
				<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
