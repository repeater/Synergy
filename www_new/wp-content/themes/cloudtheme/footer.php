			</div>
      </div>
   </div>
   
	<footer id="footer">
   
      <div id="back-top-wrapper">
         <p id="back-top">
            <a href="#top"><span></span></a>
         </p>
      </div>
    	
      <?php if( is_front_page() ) { ?>
      
         <div class="footer-area-1">
            <div class="container_12 clearfix">
               <div class="grid_12">
                  <div class="wrapper">
                  
                     <div class="col-1">
                        <?php if ( ! dynamic_sidebar( 'Footer Area 1' ) ) : ?>
                           <!--Widgetized Footer-->
                        <?php endif ?>
                     </div>
                     
                     <div class="col-2">
                        <?php if ( ! dynamic_sidebar( 'Footer Area 2' ) ) : ?>
                           <!--Widgetized Footer-->
                        <?php endif ?>
                     </div>
                  
                  </div>
               </div>
            </div>
         </div>
         
         <div class="footer-area-2">
            <div class="container_12 clearfix">
               <div class="grid_12">
                  <div class="wrapper">
                  
                     <?php if ( ! dynamic_sidebar( 'Footer Area 3' ) ) : ?>
                        <!--Widgetized Footer-->
                     <?php endif ?>
                  
                  </div>
               </div>
            </div>
         </div>
      
      <?php } ?>
      
      <?php if( is_page_template('page-subpage.php') ) { ?>
      	
         <div class="extra-content">
            <div class="container_12 clearfix">
               <div class="grid_12">
                  <div class="inner">
                  	<div class="wrapper">
                  	
								<?php if ( ! dynamic_sidebar( 'Extra Content' ) ) : ?>
                           <!--Widgetized Footer-->
                        <?php endif ?>
                     
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
      <?php } ?>
      
      <div class="footer-area-3">
         <div class="container_12 clearfix">
            <div class="grid_12">
            	<div class="wrapper">
            	
						<?php if ( of_get_option('footer_menu') == 'true') { ?>  
                     <nav class="footer">
                        <?php wp_nav_menu( array(
                           'container'       => 'ul', 
                           'menu_class'      => 'footer-nav', 
                           'depth'           => 0,
                           'theme_location' => 'footer_menu' 
                          )); 
                        ?>
                     </nav>
                  <?php } ?>
                  
                  <?php $myfooter_text = of_get_option('footer_text'); ?>
                  <?php if($myfooter_text){?>
                     <?php echo of_get_option('footer_text'); ?>
                  <?php } else { ?>
                     <p><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>" class="site-name"><?php bloginfo('name'); ?></a> &copy; <?php echo date ('Y');?> <a href="<?php bloginfo('url'); ?>/privacy-policy"><?php _e('Privacy Policy', 'my_framework'); ?></a> <?php if( is_front_page() ) { ?> More Business WordPress Templates at <a rel="nofollow" href="http://www.templatemonster.com/category/business-wordpress-templates/" target="_blank">TemplateMonster.com</a> <?php } ?></p>
                  <?php } ?>
               
               </div>
            </div>
         </div>
      </div>

   </footer>
   
</div><!--#main-->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
<?php if(of_get_option('ga_code')) { ?>
	<script type="text/javascript">
		<?php echo stripslashes(of_get_option('ga_code')); ?>
	</script>
  <!-- Show Google Analytics -->	
<?php } ?>
</body>
</html>