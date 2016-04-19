<?php
/**
 * The front page template file.
 *
 * This is the template used to generate all of the content 
 * on the home page of the site. It pulls in content from
 * a sidebar location that is specific to the home page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package University of Utah
 */

get_header(); ?>

<div class="container-fluid">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		  <?php if ( ! dynamic_sidebar( 'front-page' ) ) : endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div>
<?php get_footer(); ?>
