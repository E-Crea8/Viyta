<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;


add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );


add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );

add_action( 'woocommerce_output_product_data_tabs', 'custom_woocommerce_output_product_data_tabs', 20 );

// Remove heading from related products shortcode
// add_filter( 'woocommerce_product_related_products_heading', '__return_empty_string' );
// End heading removal




// add_filter( 'woocommerce_short_description', 'add_text_after_excerpt_single_product', 20, 1 );
// function add_text_after_excerpt_single_product( $post_excerpt ){
//     if ( ! $post_excerpt )
//         return;

//     // Your custom text
//     $post_excerpt .= '
// 		<div class="custom-field">
// 		<div class="first-row">
// 		<p>
// 		<img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/03/bottle-icon.svg">

// 		<span>Dairy-Free</span>
// 		</p>

// 		<p>
// 		<img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/03/ozu-lazer-icon.svg">

// 		<span>Gluten-Free</span>
// 		</p>
// 		</div>
// 		<div class="second-row">
// 		<p>
// 		<img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/03/micro-organism-icon.svg">

// 		<span>Non-GMO</span>
// 		</p>

// 		<p>
// 		<img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/03/nature-icon.svg">

// 		<span>Vegan</span>
// 		</p>
// 		</div>
// 		</div>';

//     return $post_excerpt;
// }


/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
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


<div class="full-width-container">
  <div class=" container m-auto bg-light p-tb-40 grid-no-gap grid--2-cols col-gap-80 product-single">

    <!-- import product picture details -->
    <div class="product-media">
      <?php
				do_action( 'woocommerce_before_single_product_summary' );
			?>
    </div>

    <div class="product-details">
      <?php
				do_action( 'woocommerce_single_product_summary' );
			?>
    </div>



    <?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */

		?>

  </div>

  <!-- Add Spacer -->
  <div class="h-64"></div>
  <!-- End Spacer -->

  <div class=" container m-auto bg-light p-tb-40 product-tabs-container">

    <div class="product-tabs-box">
      <?php
				do_action( 'woocommerce_after_single_product_summary' );
			?>
    </div>
  </div>

  <!-- Add Spacer -->
  <div class="h-64"></div>
  <!-- End Spacer -->

  <div class="full-width-container overflow-hide linked-products-blog-post bg-light">
    <div class=" container m-auto">

      <!-- Add Spacer -->
      <div class="h-120" aria-hidden="true" class="wp-block-spacer"></div>
      <!-- End Spacer -->

      <h2 class="title">Customers who viewed this item also viewed</h2>
      <div class="slickSliderJS related-products">


        <?php echo do_shortcode( '[related_products limit="10" columns="5"]' ); ?>
      </div>
      <!-- Add Spacer -->
      <div class="h-120" aria-hidden="true" class="wp-block-spacer"></div>
      <!-- End Spacer -->


    </div>
  </div>




</div>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
<?php
// Guternberg Block function for social media
reblex_display_block(68);

// Guternberg Block Function for Subscription
reblex_display_block(92);