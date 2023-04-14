<?php
/**
 * Template Name: Blog Archive
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
      <?php
        $categories = get_categories();

        foreach($categories as $category) {
            $category_link = get_category_link($category->cat_ID);
            echo '<a href="' . esc_url($category_link) . '">' . $category->name . '</a>';
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
  <div class=" container m-auto">
    <!-- Product Categories Shortcode -->
    <?php echo do_shortcode( '[reblex id=418]' ); ?>
    <!-- End all product shortcode -->
  </div>
</div>


<?php
// Guternberg Block function for social media
reblex_display_block(68);

// Guternberg Block Function for Subscription
reblex_display_block(92);


get_footer();
?>