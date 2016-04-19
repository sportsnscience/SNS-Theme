<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package University of Utah
 */

get_header(); ?>

<div class="container-fluid">

    <div class="ten-twenty-four row clearfix">
    	<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
    	<?php if ( ! dynamic_sidebar( 'sidebar-above-columns' ) ) : endif; ?>

		<div class="two-column-margin">
	    	<div class="col-sm-8 main-channel float-left">

				<section id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
<div class="content-padding">
					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title" style="color:#000000;"><?php printf( __( 'Search Results for: %s', 'umc2014' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'search' ); ?>

						<?php endwhile; ?>

						<?php umc2014_paging_nav(); ?>

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>
</div>
					</main><!-- #main -->
				</section><!-- #primary -->

			</div>
		</div>

		<?php get_sidebar(); ?>

	</div> <!-- #content-wrapper -->

</div>


<?php get_footer(); ?>
