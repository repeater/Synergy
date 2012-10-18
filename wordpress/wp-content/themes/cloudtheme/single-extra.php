<?php get_header(); ?>
<div id="content" class="grid_8 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<div class="<?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "indent-right";} else {echo "indent-left";} ?>">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="single-post">
          <h1><?php the_title(); ?></h1>
        <div class="post-content extra-wrap">
          <?php the_content(); ?>
        </div><!--.post-content-->
      </article>

    </div><!-- #post-## -->

  <?php endwhile; /* end loop */ ?>
  
   </div>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>