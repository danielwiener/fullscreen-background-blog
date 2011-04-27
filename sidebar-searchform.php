<?php
/**
 * The template for displaying the search form.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Fullscreen Background Blog
 * @since Fullscreen Background Blog 1.0
 */
?> 

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" >
<div><label class="screen-reader-text" for="s"><?php __('Search for:'); ?></label>
<input type="text" value="<?php  get_search_query(); ?>" name="s" id="s" class="searchfield"/>
<input type="submit" id="searchsubmit" value="<?php echo esc_attr__('Search'); ?>" class="button" />
</div>
</form>