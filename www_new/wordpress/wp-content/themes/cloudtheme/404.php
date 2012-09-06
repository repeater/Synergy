<?php get_header(); ?>

   <div id="error404" class="clearfix">
      <div class="error404-num">404</div>
      <?php echo '<h1>' . __('Sorry!', 'my_framework') . '</h1>'; ?>
      <?php echo '<h2>' . __('Page Not Found', 'my_framework') . '</h2>'; ?>
      <?php echo '<h6>' . __('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'my_framework') . '</h6>'; ?>
      <?php echo '<p>' . __('Please try using our search box below to look for information on the internet.', 'my_framework') . '</p>'; ?>
      <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
   </div><!--#error404 .post-->

<?php get_footer(); ?>