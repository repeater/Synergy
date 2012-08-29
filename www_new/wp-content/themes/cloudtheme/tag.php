<?php get_header(); ?>
<div id="content" class="grid_8 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<div class="<?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "indent-right";} else {echo "indent-left";} ?>">
   
  <h1><?php printf( __( 'Tag Archives: %s' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
  <!-- displays the tag's description from the Wordpress admin -->
  <?php echo tag_description(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-holder'); ?>>
      
      	<div class="post-header">
         	<b><?php comments_popup_link('0', '1', '%', 'comments-link', 'x'); ?></b>
            <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
         </div>
        
        <?php $post_image_size = of_get_option('post_image_size'); ?>
				<?php if($post_image_size=='' || $post_image_size=='normal'){ ?>
          <?php if(has_post_thumbnail()) {
            echo '<figure class="featured-thumbnail"><span class="img-wrap"><a href="'; the_permalink(); echo '">';
            echo the_post_thumbnail();
            echo '</a></span></figure>';
            }
          ?>
        <?php } else { ?>
          <?php if(has_post_thumbnail()) {
            echo '<figure class="featured-thumbnail large"><span class="img-wrap clearfix"><span class="f-thumb-wrap"><a href="'; the_permalink(); echo '">';
            echo the_post_thumbnail('post-thumbnail-xl');
            echo '</a></span></span></figure>';
            }
          ?>
        <?php } ?>
        
        <div class="post-content">
          <?php $post_excerpt = of_get_option('post_excerpt'); ?>
      		<?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>
            <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,80);?></div>
          <?php } ?>
        </div>
        
         <div class="post-footer">
         
            <a href="<?php the_permalink() ?>" class="button"><?php _e('Read more', 'my_framework'); ?></a>
            
				<?php $post_meta = of_get_option('post_meta'); ?>
				<?php if ($post_meta=='true' || $post_meta=='') { ?>
               <div class="meta-info clearfix">
                <span class="ico ico1">
                  <div class="info-block">
                    <span class="meta-title"><?php _e('Published on:', 'theme1458'); ?></span>
                    <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('D, d/m/Y'); ?> - <?php the_time('h:i') ?></time>
                  </div>
                </span>
                <span class="ico ico2">
                  <div class="info-block">
                    <span class="meta-title"><?php _e('Author:', 'theme1458'); ?></span>
                    <?php the_author_posts_link() ?>
                  </div>
                </span>
                <span class="ico ico3">
                  <div class="info-block">
                    <span class="meta-title"><?php _e('Categories:', 'theme1458'); ?></span>
                    <?php the_category(', ') ?>
                  </div>
                </span>
                <span class="ico ico4">
                  <div class="info-block">
                    <?php the_tags('<span class="meta-title">Tags:</span> ', ', ', ''); ?>
                  </div>
                </span>
              </div>
            <?php } ?>		
            
         </div>
        
    </article>
    
  <?php endwhile; else: ?>
    <div class="no-results">
    	<?php echo '<p><strong>' . __('There has been an error.', 'my_framework') . '</strong></p>'; ?>
      <p><?php _e('We apologize for any inconvenience, please', 'my_framework'); ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'my_framework'); ?></a> <?php _e('or use the search form below.', 'my_framework'); ?></p>
      <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
    </div><!--no-results-->
  <?php endif; ?>
    
    <?php if(function_exists('wp_pagenavi')) : ?>
			<?php wp_pagenavi(); ?>
    <?php else : ?>
      <?php if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav class="oldernewer">
          <div class="older">
            <?php next_posts_link( __('&laquo; Older Entries', 'my_framework')) ?>
          </div><!--.older-->
          <div class="newer">
            <?php previous_posts_link(__('Newer Entries &raquo;', 'my_framework')) ?>
          </div><!--.newer-->
        </nav><!--.oldernewer-->
      <?php endif; ?>
    <?php endif; ?>
    <!-- Page navigation -->
   
   </div>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>