<?php 
  $title = get_sub_field('heading_text'); 
  $description = get_sub_field('description'); 
?>

<section class="full-width-container testimoial-section">

  <div class="testimonial-slider">
    <!-- if title has value -->
    <?php if( !empty($title)): ?>
    <h2 class="h2-heading mw-454 mb-24 m-auto text-center">
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


    <div class="testimonial-slick-slider">
      <!-- Get custom testimonial post type content -->
      <?php
          $args = array( 'post_type' => 'testimonial' );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ): $loop->the_post();      
        ?>

      <div class="testimonial-content">

        <img
          src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/03/5-star-rating-icon.svg"
          alt="rating-icon">


        <?php the_content(); ?>


        <div class="user-details">
          <?php the_post_thumbnail( 'full' ); ?>

          <span><?php the_title(); ?></span>
        </div>

      </div>
      <?php endwhile; ?>
    </div>

  </div>
</section>

<!-- Use this after doing custom post types to show ACF Blocks -->
<?php wp_reset_query(); ?>


<!-- Add Spacer -->
<div class="h-120" aria-hidden="true" class="wp-block-spacer"></div>
<!-- End Spacer -->