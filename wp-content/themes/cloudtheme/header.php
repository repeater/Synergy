<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->
<head>
	<title><?php if ( is_category() ) {
		echo __('Category Archive for &quot;', 'my_framework'); single_cat_title(); echo __('&quot; | ', 'my_framework'); bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo __('Tag Archive for &quot;', 'my_framework'); single_tag_title(); echo __('&quot; | ', 'my_framework'); bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo __(' Archive | ', 'my_framework'); bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo __('Search for &quot;', 'my_framework').wp_specialchars($s).__('&quot; | ', 'my_framework'); bloginfo( 'name' );
	} elseif ( is_home() || is_front_page()) {
		bloginfo( 'name' );
	}  elseif ( is_404() ) {
		echo __('Error 404 Not Found | ', 'my_framework'); bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title( ' | ', false, right ); bloginfo( 'name' );
	} ?></title>
	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
  <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
    	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
    </div>
  <![endif]-->
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/prettyPhoto.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/grid.css" />
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
  <!--[if lt IE 9]>
  <style type="text/css">
    a.link, .nivo-caption a, ul.post_list li, .widget_nav_menu ul li, ul.posts li .thumb-wrap img, ul.posts li .thumb-wrap span, a.button, ul.posts li .thumb-wrap, #post-author, .reply a, .comment-body, input[type="text"], textarea, input[type="submit"], input[type="reset"], span.wpcf7-not-valid-tip, a.image-wrap {
      behavior:url(<?php bloginfo('stylesheet_directory'); ?>/PIE.php)
      }
  </style>
  <![endif]-->
  
  <script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery('ul.sf-menu').superfish({
				delay:       <?php echo of_get_option('sf_delay'); ?>, 		// one second delay on mouseout 
				animation:   {opacity:'<?php echo of_get_option('sf_f_animation'); ?>',height:'<?php echo of_get_option('sf_sl_animation'); ?>'}, // fade-in and slide-down animation 
				speed:       '<?php echo of_get_option('sf_speed'); ?>',  // faster animation speed 
				autoArrows:  <?php echo of_get_option('sf_arrows'); ?>,   // generation of arrow mark-up (for submenu) 
				dropShadows: <?php echo of_get_option('sf_shadows'); ?>   // drop shadows (for submenu)
			});
			
			// prettyphoto init
			jQuery("a[rel^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				slideshow:5000,
				autoplay_slideshow: false
			});
			
			jQuery('.footer-area-2 ul li:last-child').addClass('last');
			
		});
		
		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
  </script>
  
  <script type="text/javascript">
		jQuery(window).load(function() {
			// nivoslider init
			jQuery('#slider').nivoSlider({
				effect: '<?php echo of_get_option('sl_effect'); ?>',
				slices:<?php echo of_get_option('sl_slices'); ?>,
				boxCols:<?php echo of_get_option('sl_box_columns'); ?>,
				boxRows:<?php echo of_get_option('sl_box_rows'); ?>,
				animSpeed:<?php echo of_get_option('sl_animation_speed'); ?>,
				pauseTime:<?php echo of_get_option('sl_pausetime'); ?>,
				directionNav:<?php echo of_get_option('sl_dir_nav'); ?>,
				directionNavHide:<?php echo of_get_option('sl_dir_nav_hide'); ?>,
				controlNav:<?php echo of_get_option('sl_control_nav'); ?>,
				captionOpacity:<?php $sl_caption_opacity = of_get_option('sl_caption_opacity'); if ($sl_caption_opacity != '') { echo of_get_option('sl_caption_opacity'); } else { echo '0'; } ?>,
    beforeChange: function(){
     jQuery('.nivo-caption').animate({left:"-400px"}, {easing:"jswing"});
    },
    afterChange: function(){
     jQuery('.nivo-caption').animate({left:"78px"}, {easing:"jswing"});
    }
			});
		});
	</script>
  <!-- Custom CSS -->
	<?php if(of_get_option('custom_css') != ''){?>
  <style type="text/css">
  	<?php echo of_get_option('custom_css' ) ?>
  </style>
  <?php }?>
  
  
  
  
  <style type="text/css">
		/* Body styling options */
		<?php $background = of_get_option('body_background');
			if ($background != '') {
				if ($background['image'] != '') {
					echo 'body { background-image:url('.$background['image']. '); background-repeat:'.$background['repeat'].'; background-position:'.$background['position'].';  background-attachment:'.$background['attachment'].'; }';
				}
				if($background['color'] != '') {
					echo 'body { background-color:'.$background['color']. '}';
				}
			};
		?>
		
  	/* Header styling options */
		<?php $header_styling = of_get_option('header_color'); 
			if($header_styling != '') {
				echo '#header {background-color:'.$header_styling.'}';
			}
		?>
		
		/* Links and buttons color */
		<?php $links_styling = of_get_option('links_color'); 
			if($links_styling) {
				echo 'a{color:'.$links_styling.'}';
				echo '.button {background:'.$links_styling.'}';
			}
		?>
		
		/* Body typography */
		<?php $body_typography = of_get_option('body_typography'); 
			if($body_typography) {
				echo 'body {font-family:'.$body_typography['face'].'; color:'.$body_typography['color'].'}';
				echo '#main {font-size:'.$body_typography['size'].'; font-style:'.$body_typography['style'].';}';
			}
		?>
  </style>
</head>

<body <?php body_class(); ?>>

<div id="main"><!-- this encompasses the entire Web site -->

   <header id="header">
      <div class="container_12 clearfix">
         <div class="grid_12">
         
            <div class="logo">
					<?php if(of_get_option('logo_type') == 'text_logo'){?>
						<?php if( is_front_page() || is_home() || is_404() ) { ?>
                     <h1><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
                  <?php } else { ?>
                     <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
                  <?php } ?>
					<?php } else { ?>
                  <?php if(of_get_option('logo_url') != ''){ ?>
                     <a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
                  <?php } else { ?>
                     <a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
                  <?php } ?>
               <?php }?>
            </div>
        
            <nav class="primary">
					<?php wp_nav_menu( array(
						'container'       => 'ul', 
						'menu_class'      => 'sf-menu', 
						'menu_id'         => 'topnav',
						'depth'           => 0,
						'theme_location' => 'header_menu' 
                 )); 
               ?>
            </nav><!--.primary-->
        
				<?php if ( of_get_option('g_search_box_id') == 'yes') { ?>  
               <form method="get" id="searchform" action="<?php echo get_option('home'); ?>/">
                  <input type="text" name="s" value="search..." onblur="if(this.value=='') this.value='search...'" onfocus="if(this.value =='search...' ) this.value=''">
                  <input type="submit" value="">
               </form>
            <?php } ?>

         </div>
      </div>
   </header>
   
	<?php if( is_front_page() ) { ?>
      <section id="slider-wrapper">
         <div class="container_12 clearfix">
            <div class="grid_12">
					<?php include_once(TEMPLATEPATH . '/slider.php'); ?>
            </div>
         </div>
      </section><!--#slider-->
   <?php } ?>
  	
   <?php if( is_front_page() ) { ?>
      <div class="before-content-area">
         <div class="container_12 clearfix">
            <div class="grid_12">
            	<div class="wrapper">
						<?php if ( ! dynamic_sidebar( 'Before Content Area' ) ) : ?>
                     <!-- Wigitized Content -->
                  <?php endif ?>
               </div>
            </div>
         </div>
      </div>
   <?php } ?>
  
	<div class="primary_content_wrap">
   	<div class="container_12 clearfix">
      	<div class="wrapper">