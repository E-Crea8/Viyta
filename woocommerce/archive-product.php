<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

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
<div class="full-width-container cat-box">
  <div class=" container m-auto">
    <div class="categories-holder">
      <!-- start breadcrumbs -->
      <?php 
								$taxonomy     = 'product_cat';
								$orderby      = 'name';  
								$show_count   = 0;      // 1 for yes, 0 for no
								$pad_counts   = 0;      // 1 for yes, 0 for no
								$hierarchical = 1;      // 1 for yes, 0 for no  
								$title        = '';  
								$empty        = 0;
							
								$args = array(
											'taxonomy'     => $taxonomy,
											'orderby'      => $orderby,
											'show_count'   => $show_count,
											'pad_counts'   => $pad_counts,
											'hierarchical' => $hierarchical,
											'title_li'     => $title,
											'hide_empty'   => $empty
								);
							$all_categories = get_categories( $args );
							foreach ($all_categories as $cat) {
									if($cat->category_parent == 0) {
											$category_id = $cat->term_id;       
											echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
											}
										}
			?>
      <!-- end breadcrumbs -->
    </div>
  </div>
</div>
<!-- End display list of categories here -->

<!-- <header class="woocommerce-products-header">
  <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
  <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
  <?php endif; ?>

  <?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header> -->

<?php
/**
* Hook: woocommerce_sidebar.
*
* @hooked woocommerce_get_sidebar - 10
*/
//do_action( 'woocommerce_sidebar' );
?>

<!-- Add Spacer -->
<div class="h-48" aria-hidden="true" class="wp-block-spacer"></div>
<!-- End Spacer -->

<div class="full-width-container overflow-hide products-container">
  <div class=" container m-auto">
    <!-- Product Categories Shortcode -->
    <?php echo do_shortcode( '[products columns="4"]' ); ?>
    <!-- End all product shortcode -->
  </div>
</div>


<?php
// Guternberg Block function for social media
reblex_display_block(68);

// Guternberg Block Function for Subscription
reblex_display_block(92);

get_footer( 'shop' );