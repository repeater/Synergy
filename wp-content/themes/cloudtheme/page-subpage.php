<?php
/**
 * Template Name: Extra content
 */

get_header(); ?>
	
   <div class="grid_12">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
         <div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
            <?php the_content(); ?>
            <div class="pagination">
               <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
            </div><!--.pagination-->
         </div><!--#post-# .post-->
      <?php endwhile; ?>
   </div>

<?php get_footer(); ?>