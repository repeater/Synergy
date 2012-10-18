<?php
/**
 * Template Name: Product 3 columns
 */

get_header(); ?>

	<?php include_once (TEMPLATEPATH . '/title.php');?>   
  <?php global $more;	$more = 0;?>
  <?php $values = get_post_custom_values("category-include"); $cat=$values[0];  ?>
  <?php $catinclude = 'portfolio_category='. $cat ;?>
  
  <?php $temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query(); ?>
  <?php $wp_query->query("post_type=portfolio&". $catinclude ."&paged=".$paged.'&showposts=9'); ?>
  <?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'my_framework' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'my_framework' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>
<div id="gallery">
  <ul class="portfolio">
    <?php 
      $i=1;
      if ( have_posts() ) while ( have_posts() ) : the_post(); 
      if(($i%3) == 0){ $addclass = "nomargin";	}	
    ?>
    
    
    <?php
      $custom = get_post_custom($post->ID);
      $lightbox = $custom["lightbox-url"][0];
    ?>
    
      <li class="<?php echo $addclass; ?>">
				<?php if($lightbox!=""){ ?>
        <span class="image-border"><a class="image-wrap" href="<?php echo $lightbox;?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>"><?php the_post_thumbnail( 'portfolio-post-thumbnail' ); ?><span class="zoom-icon"></span></a></span>
      <?php }else{ ?>
        <span class="image-border"><a class="image-wrap" href="<?php the_permalink() ?>" title="<?php _e('Permanent Link to', 'my_framework');?> <?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'portfolio-post-thumbnail' ); ?></a></span>
        <?php } ?>
        <div class="folio-desc">
          <h3><a href="<?php the_permalink(); ?>"><?php $title = the_title('','',FALSE); echo substr($title, 0, 40); ?></a></h3>
          <p class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,13);?></p>
        </div>
      </li>
    
  
    <?php $i++; $addclass = ""; endwhile; ?>
  </ul>
  <div class="clear"></div>
</div>





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

<?php $wp_query = null; $wp_query = $temp;?>

<!-- end #main -->
<?php get_footer(); ?>