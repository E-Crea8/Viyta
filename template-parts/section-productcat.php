<?php 
  $title = get_sub_field('heading_text'); 
  $description = get_sub_field('description_text'); 
?>

<section class="container-full-width product-cat-section">

  <!-- if title has value -->
  <?php if( !empty($title)): ?>
  <h2 class="h2-heading mw-520 m-auto text-center mb-24">
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

  <div class="cat-block">
    <!-- Product Categories Shortcode -->
    <?php echo do_shortcode( '[product_categories columns="5"]' ); ?>
    <!-- End Product Categories Shortcode -->
  </div>

</section>

<!-- Add Spacer -->
<div class="h-120" aria-hidden="true" class="wp-block-spacer"></div>
<!-- End Spacer -->