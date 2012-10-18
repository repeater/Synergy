<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>
	
   <div class="grid_12">
   	<div class="wrapper">
      
			<?php if ( ! dynamic_sidebar( 'Content Area 1' ) ) : ?>
            <!-- Wigitized Content -->
         <?php endif ?>
         
      </div>
   </div>
         
   <div class="wrapper">
      
      <div class="grid_4">
         <?php if ( ! dynamic_sidebar( 'Content Area 2' ) ) : ?>
            <!-- Wigitized Content -->
         <?php endif ?>
      </div>
      
      <div class="grid_8">
         <?php if ( ! dynamic_sidebar( 'Content Area 3' ) ) : ?>
            <!-- Wigitized Content -->
         <?php endif ?>
      </div>
      
   </div>
   
<?php get_footer(); ?>