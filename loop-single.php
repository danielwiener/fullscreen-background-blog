<?php
/**
 * The loop that displays a single post.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				
                <div class="date"><?php echo get_the_date('m/j/y'); ?>
	<?php 
	$args = array(
	    'smallest'  => 8,
	    'largest'   => 22,
	    'unit'      => 'pt',
	    'number'    => 0,
	    'format'    => 'flat',
	    'separator' => '\n',
	    'orderby'   => 'name',
	    'order'     => 'ASC',
	    'topic_count_text_callback'  => 'default_topic_count_text',
	    'topic_count_scale_callback' => 'default_topic_count_scale',
	    'filter'    => 1 );
	$tags = get_the_tags();
	$lm_tag_slug = '';
foreach($tags as $lm_tag) {
	$tags[ $lm_tag->term_id ]->link = get_tag_link($lm_tag->term_id); //$tags[ $key ]->link The key is the term_id !!!!
} 

	// print_r($tags);?>  <div class="tags_cloud"> 
	<?php  echo wp_generate_tag_cloud( $tags, $args ); 
   // if ( function_exists( 'nk_wp_tag_cloud' ) ) {
   // 		echo nk_wp_tag_cloud( 'single=yes' );
   // 	} 
 ?></div> 
</div> 
			   
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
                       					 <div id="nav-below" class="navigation">
							<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
							<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
						</div><!-- #nav-below -->
				</div><!-- #post-## -->

			   

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>