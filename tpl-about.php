<?php
/**
 * Template Name: About us
 * 
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


<!-- Display ACFs for about-us page -->
<?php 
  if( have_rows('about_us_page') ):
    // loop through the rows of data
    while ( have_rows('about_us_page') ) : the_row(); 
?>


<?php if( get_row_layout() == 'hero_title_section' ): ?>
<!-- Get template part for hero section -->
<?php get_template_part('template-parts/section','pagetitlehero' ) ?>

<?php endif; ?>


<?php if( get_row_layout() == 'clients_section' ): ?>
<!-- Get template part for Choose Health Goals section -->
<?php get_template_part('template-parts/section','clients' ) ?>

<?php endif; ?>


<?php if( get_row_layout() == 'three_columns_with_heading_and_description_section' ): ?>
<!-- Get template part for product categories section -->
<?php get_template_part('template-parts/section','threecolsabout' ) ?>

<?php endif; ?>


<?php if( get_row_layout() == 'two_columns_image_left' ): ?>
<!-- Get template part for testimonial section -->
<?php get_template_part('template-parts/section','twocolsimageleft' ) ?>

<?php endif; ?>


<?php if( get_row_layout() == 'two_columns_image_right' ): ?>
<!-- Get template part for testimonial section -->
<?php get_template_part('template-parts/section','twocolsimageright' ) ?>

<?php endif; ?>


<?php if( get_row_layout() == 'cta_section' ): ?>
<!-- Get template part for testimonial section -->
<?php get_template_part('template-parts/section','ctashop' ) ?>

<?php endif; ?>


<?php 
  endwhile;
  endif; 
?>

<?php
// Guternberg Block function for social media
reblex_display_block(68);

// Guternberg Block Function for Subscription
reblex_display_block(92);


get_footer();