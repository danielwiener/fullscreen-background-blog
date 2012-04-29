<?php
/**
 * The loop that displays posts.
 *
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.0
 */
?> 

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
	 */ ?>
<?php while ( have_posts() ) : the_post(); ?>

        <div class="date"><?php echo get_the_date('m/j/y'); ?>
			<?php    $args = array(
			    	'smallest'  => .7,
				    'largest'   => 1.8,
				    'unit'      => 'em',
				    'number'    => 0,
				    'format'    => 'flat',
				    'separator' => ' ',
				    'orderby'   => 'name',
				    'order'     => 'ASC',
				    'topic_count_text_callback'  => 'default_topic_count_text',
				    'topic_count_scale_callback' => 'default_topic_count_scale',
				    'filter'    => 1 );
					$tags = get_the_tags(); 
						$lm_tag_slug = '';
						if ( $tags ) {
							$lm_tag_slug = '';
							foreach($tags as $lm_tag) {
								$tags[ $lm_tag->term_id ]->link = get_tag_link($lm_tag->term_id); //$tags[ $key ]->link The key is the term_id !!!!
							} //foreach
						} // if
					?>
					<div class="tags_cloud"> 
						<?php  echo wp_generate_tag_cloud( $tags, $args );  ?>
					</div>
	
	</div>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
             
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
        </div><!-- #post-## -->
<?php endwhile; // End the loop. Whew. ?>