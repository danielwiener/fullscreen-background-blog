<?php
/**
 * Front Page - displays posts from News category
 *
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">  
				<h1 class="page-title">News</h1>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 *
	 * Without further ado, the loop:
	 */ 
	?>
<?php 
            global $wp_query;
			$args = array_merge( $wp_query->query, array( 
				'category_name' 	=> 'news',
				'post-type'		    => 'post',
				'post-status'		=> 'publish',
				) 
				);
			query_posts( $args );

			while ( have_posts() ) : the_post(); ?>

        <div class="date"><?php echo get_the_date('m/j/y'); ?></div>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
             
			<div class="entry-summary">
				<?php the_content(); ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
			</div><!-- .entry-summary -->
        </div><!-- #post-## -->
<?php endwhile; // End the loop. Whew. ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
<div class="date">Pages</div> 
<div class="post"><?php numeric_pagination(); ?></a></div> 
<?php endif; ?>
</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>