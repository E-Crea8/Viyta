<?php
/**
 * Template Name: Help Archive
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

<!-- display list of categories here -->
<div class="full-width-container cat-link-box">
  <div class=" container m-auto">
    <div class="categories-holder">
      <!-- start breadcrumbs -->
      <!-- List all categories and link to each category page -->
      <?php
        $terms = get_terms( array(
          'taxonomy' => 'help_post_type_categories',
          'hide_empty' => false,
        ) );

        // echo '<a href="help-category">All</a>';

        foreach ( $terms as $term ) {
          echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a> ';
        }
    ?>

      <!-- end breadcrumbs -->
    </div>
  </div>
</div>
<!-- End display list of categories here -->


<!-- Add Spacer -->
<div class="h-48" aria-hidden="true" class="wp-block-spacer"></div>
<!-- End Spacer -->

<div class="full-width-container overflow-hide blog-post-container">
  <div class=" container m-auto help-custom-post-section">
    <!-- Product Categories Shortcode -->
    <!-- Get custom testimonial post type content -->
    <div class="help-box grid-no-gap grid--3-cols g-gap-24">

      <?php
        $args = array(
        'posts_per_page' => 9, 
        'orderby' => 'post_date',
        'order' => 'ASC',
        'post_type' => 'help_post_type', 
        'post_status' => 'publish'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
      ?>

      <div class="help-content">
        <div class="featured-img-holder">
          <?php the_post_thumbnail( 'full' ); ?>
        </div>
        <div class="help-info">
          <div class="cat-box no-bg">
            <img
              src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/03/blog-cat-icon.svg">
            <span>

              <?php 
                
                // Get the current post ID
                $post_id = get_the_ID();

                // Get the category terms for the current post
                $terms = get_the_terms( $post_id, 'help_post_type_categories' );

                // Check if there are any terms for the current post
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

                // Loop through each term and display a link to its category page
                foreach ( $terms as $term ) {
                  echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a>';
                }


                }

              
              ?>
            </span>
          </div>

          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

          <?php the_excerpt(); ?>

          <a href="<?php the_permalink(); ?>" class="primary-btn">More information</a>

        </div>


        <!-- End all product shortcode -->
      </div>
      <?php  
        endwhile;
        endif; 
       ?>
    </div>


    <?php
// Guternberg Block function for social media
reblex_display_block(68);

// Guternberg Block Function for Subscription
reblex_display_block(92);


get_footer();
?>