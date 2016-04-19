<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package University of Utah
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="icon" href="/wp-content/themes/umc2014/images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/wp-content/themes/umc2014/images/apple-touch-icon.png">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />   

<?php wp_head(); ?>
<!--[if lte IE 8]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<?php

    if ( !isset($themeOptions) )
    	$themeOptions = UtahThemeOptions::getOptions();

?>

<body class="<?php echo($themeOptions['template_width'])?>">

    <div id="header-container" class="clearfix" role="banner">

    	<header id="masthead" class="site-header" role="banner">

      		<div id="utah-logo"> </div>

        	<div class="clearfix" id="search-area" role="search"><form action="http://gsa.search.utah.edu/search" method="get"><label class="visuallyhidden" for="search">Search Campus</label> <input id="search" title="Enter Search Terms" type="text" value="" name="q" /> <input type="hidden" value="default_collection" name="site" /> <input type="hidden" value="MainCampus" name="client" /> <input type="hidden" value="xml_no_dtd" name="output" /> <input type="hidden" value="MainCampus" name="proxystylesheet" /> <input type="hidden" value="10" name="numgm" /> <input id="search-btn" title="Submit Search" type="submit" value="Search" name="search-btn" /></form></div>     

        	<div class="header-color clearfix"> </div>

        		<nav id="top-nav" role="navigation">
          			<a href="javascript:///" class="top-mobile-nav mobile-menu-trigger" rel="top">MENU <span> </span></a>
				
					<?php wp_nav_menu( array( 
						'theme_location' 	=> 'primary', 
						'menu_class' 		=> 'top-menu menu-trigger',
						'container' 		=> false,
						'before'			=> '<h3>',
						'after'				=> '</h3>',
						'items_wrap'		=> '<ul id="%1$s" class="%2$s" rel="top">%3$s</ul>'
					) ); ?>
				</nav><!-- #site-navigation -->        	

		        <div class="main-headline">
		          	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a><br />
		          	<?php
		          		if ( ! isset( $description ) ) {
							bloginfo('description');
						}
					?>
		          	</h1>
		        </div>

			</header>

		</div>


	<?php if ( !empty($themeOptions['header_background_image']) ) { ?>

		<div id="header-bg-image" style="background: url('<?php echo get_template_directory_uri(); ?>/images/headers/<?php echo $themeOptions['header_background_image']; ?>_background.jpg') no-repeat top center"></div>
	

	    <script type="text/javascript">
	      	var headerImage = "url('<?php echo get_template_directory_uri(); ?>/images/headers/<?php echo $themeOptions['header_background_image']; ?>_background.jpg')";
	      	jQuery('.main-headline').css('background-image',headerImage);
	    </script> 	

    <?php } ?>

    <?php if ($themeOptions['header_background_image'] == 'header_blank') { ?>
	    <script type="text/javascript">
	      	jQuery('#header-bg-image').css('background','');
	      	jQuery('#header-bg-image img').hide();
	      	jQuery('#header-container').css('background-color','#e1e1e1');
	      	jQuery('.main-headline h1 a, .main-headline h1').css('color','#333');
	      	jQuery('.main-headline h1 a, .main-headline h1').css('text-shadow', 'none');
	    </script> 	
	<?php } ?>

    <?php if (get_page_template_slug( $post->ID ) !== '') { ?>
    	<style type="text/css">
    		.breadcrumb { margin-left: 1em;}
    	</style>
    <?php } ?>	

	    <div id="main-container">
		