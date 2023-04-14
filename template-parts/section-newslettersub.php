<?php 
  $title = get_sub_field('heading_text'); 
  $description = get_sub_field('description'); 
  ?>

<section class="full-width-container subscribe-newsletter-section bg-light text-center">
  <!-- Add Spacer -->
  <div class="h-80" aria-hidden="true" class="wp-block-spacer"></div>
  <!-- End Spacer -->

  <!-- if title has value -->
  <?php if( !empty($title)): ?>
  <h2 class="h2-heading m-auto">
    <?php echo $title; ?>
  </h2>
  <?php endif; ?>

  <!-- if description has value -->
  <?php if( !empty($description)): ?>

  <?php echo $description; ?>

  <?php endif; ?>

  <!-- Subscription Form Shortcode -->
  <?php echo do_shortcode( '[contact-form-7 id="74" title="Newsletter Subscription Form"]' ); ?>
  <!-- End Subscription Form Shortcode -->


  <!-- Add Spacer -->
  <div class="h-80" aria-hidden="true" class="wp-block-spacer"></div>
  <!-- End Spacer -->

</section>