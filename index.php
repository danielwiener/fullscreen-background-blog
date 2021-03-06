<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">  
				<h1 class="page-title">News</h1>
			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'index' );
			?> 
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			<div class="date">Pages</div> 
			<div class="post"><?php numeric_pagination(); ?></a></div> 
			<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>
