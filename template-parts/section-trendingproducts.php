<?php 
  $title = get_sub_field('heading_text'); 
  $description = get_sub_field('description_text'); 
?>

<section class="full-width-container trending-products-section bg-light">
  <div class="container-full-width">
    <!-- Add Spacer -->
    <div class="h-120" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- End Spacer -->


    <div class="product-slider">
      <!-- if title has value -->
      <?php if( !empty($title)): ?>
      <h2 class="h2-heading mw-500 mb-24">
        <?php echo $title; ?>
      </h2>
      <?php endif; ?>

      <!-- if description has value -->
      <?php if( !empty($description)): ?>

      <?php echo $description; ?>

      <?php endif; ?>

      <!-- Add Spacer -->
      <div class="h-48" aria-hidden="true" class="wp-block-spacer"></div>
      <!-- End Spacer -->

      <div class="product-block slickJS">
        <!-- Product Categories Shortcode -->
        <?php echo do_shortcode( '[recent_products limit="10" columns="5"]' ); ?>
        <!-- End Product Categories Shortcode -->
      </div>

    </div>

    <!-- Add Spacer -->
    <div class="h-94" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- End Spacer -->

  </div>
</section>

<!-- Add Spacer -->
<div class="h-120" aria-hidden="true" class="wp-block-spacer"></div>
<!-- End Spacer -->