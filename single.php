<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package viyta
 */

get_header();
?>

<!-- Get the Breadcrumbs here -->
<div class="full-width-container border-tb">
  <div class="container breadcrumbs-box">
    <div class="breadcrumbs-holder">
      <!-- start breadcrumbs -->
      <?php 
				if ( function_exists('yoast_breadcrumb') ) {
  				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						} 
			?>
      <!-- end breadcrumbs -->
    </div>
  </div>
</div>
<!-- End the Breadcrumbs here -->

<!-- Add Spacer -->
<div class="h-80" aria-hidden="true" class="wp-block-spacer"></div>
<!-- End Spacer -->



<div class="full-width-container overflow-hide single-post-container">
  <div class=" container m-auto">

    <?php
		while ( have_posts() ) :
			the_post();

			?>

    <span class="post-date">
      <?php
				$post_date = get_the_date('d M Y');
				echo 'Published ' . $post_date;
			?>
    </span>

    <h1 class="title"><?php the_title(); ?></h1>

    <?php

			get_template_part( 'template-parts/content', get_post_type() );

			// the_post_navigation(
			// 	array(
			// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'viyta' ) . '</span> <span class="nav-title">%title</span>',
			// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'viyta' ) . '</span> <span class="nav-title">%title</span>',
			// 	)
			// );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

  </div>
</div>
<!-- Add Spacer -->
<div class="h-64" aria-hidden="true" class="wp-block-spacer"></div>
<!-- End Spacer -->

<div class="full-width-container overflow-hide linked-products-blog-post bg-light">
  <div class=" container m-auto">

    <!-- Add Spacer -->
    <div class="h-120" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- End Spacer -->

    <h2 class="title">Linked products related to the article</h2>

    <?php echo do_shortcode( '[recent_products limit="4" columns="4"]' ); ?>

    <!-- Add Spacer -->
    <div class="h-120" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- End Spacer -->


  </div>
</div>

<?php
// get_sidebar();

// Guternberg Block function for social media
reblex_display_block(68);

// Guternberg Block Function for Subscription
reblex_display_block(92);

get_footer();