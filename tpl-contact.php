<?php
/**
 * Template Name: Contact
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


<!-- Start contact content -->
<section class="full-width-container main-contact-box">

  <?php
    // Guternberg Block for contact map info
    reblex_display_block(484);

    // Guternberg Block for contact form
    reblex_display_block(467);

  ?>

</section>
<!-- End contact content -->

<?php
// Guternberg Block function for social media
reblex_display_block(68);

// Guternberg Block Function for Subscription
reblex_display_block(92);


get_footer();