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
	
				  		<div class="content-padding">

							<?php 

								$args = array( 'post_type' => 'news', 'posts_per_page' => 3 );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
									the_title();
									echo '<div class="entry-content">';
									the_content();
									echo '</div>';
								endwhile;

							?>

						</div>


					</main><!-- #main -->
			
				</div><!-- #primary -->

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div> <!-- #content-wrapper -->

</div>


<?php get_footer(); ?>