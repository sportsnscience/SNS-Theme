<?php
/**
 * The Template for displaying all single posts.
 *
 * @package University of Utah
 */

get_header(); ?>

<div class="container-fluid">

    <div class="ten-twenty-four row clearfix">
    	<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
    	<?php if ( ! dynamic_sidebar( 'sidebar-above-columns' ) ) : endif; ?>
    	<div class="two-column-margin">

	    	<div class="col-sm-8 main-channel">

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

				  		<?php // if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?>

				  		<?php // endif; // end above post widget area ?>		

						<div class="content-padding">

							<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'single' ); ?>

							<?php umc2014_post_nav(); ?>

							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() ) :
									comments_template();
								endif;
							?>

						</div>

					<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->
			
				</div><!-- #primary -->

				<?php // if ( ! dynamic_sidebar( 'sidebar-4' ) ) : ?>  

				<?php // endif; // end below post widget area ?>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div> <!-- #content-wrapper -->

</div>


<?php get_footer(); ?>