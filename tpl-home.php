<?php
/**
 * Template Name: Landing Page
 * 
 */

 get_header(); 
 ?>

<!-- Display ACFs for landing page -->
<?php 
  if( have_rows('landing_page') ):
    // loop through the rows of data
    while ( have_rows('landing_page') ) : the_row(); 
?>


<?php if( get_row_layout() == 'two_columns_section' ): ?>
<!-- Get template part for hero section -->
<?php get_template_part('template-parts/section','twocolumns' ) ?>

<?php endif; ?>


<?php if( get_row_layout() == 'three_columns_with_heading_and_description_section' ): ?>
<!-- Get template part for Choose Health Goals section -->
<?php get_template_part('template-parts/section','3columnswithheadingdescription' ) ?>

<?php endif; ?>


<?php if( get_row_layout() == 'product_categories_section' ): ?>
<!-- Get template part for product categories section -->
<?php get_template_part('template-parts/section','productcat' ) ?>

<?php endif; ?>

<?php if( get_row_layout() == 'trending_products_section' ): ?>
<!-- Get template part for subscription section -->
<?php get_template_part('template-parts/section','trendingproducts' ) ?>

<?php endif; ?>


<?php if( get_row_layout() == 'testimonial_section' ): ?>
<!-- Get template part for testimonial section -->
<?php get_template_part('template-parts/section','testimonial' ) ?>

<?php endif; ?>


<?php if( get_row_layout() == 'blog_post_section' ): ?>
<!-- Get template part for testimonial section -->
<?php get_template_part('template-parts/section','blogpost' ) ?>

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