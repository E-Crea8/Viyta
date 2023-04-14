<?php 
  $title = get_sub_field('heading_text'); 
  $linkText = get_sub_field('link_text'); 
  $linkUrl = get_sub_field('link_url'); 
?>

<section class="full-width-container bg-light">

  <div class="container-full-width blog-post-section m-auto p-lr-120">
    <!-- Add Spacer -->
    <div class="h-120" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- End Spacer -->

    <div class="is-layout-flex wp-block-columns mb-0 mt-0">

      <div class="is-layout-flow wp-block-column is-vertically-aligned-center">
        <!-- if title has value -->
        <?php if( !empty($title)): ?>
        <h2 class="h2-heading mw-560 mb-0">
          <?php echo $title; ?>
        </h2>
        <?php endif; ?>
      </div>

      <div class="is-layout-flow wp-block-column is-vertically-aligned-center text-right">
        <!-- if button link has value -->
        <?php if( !empty($linkText) && !empty($linkUrl)): ?>
        <div class="primary-btn d-inline-block">
          <a href="<?php echo $linkUrl; ?>" class="button">
            <?php echo $linkText; ?>
          </a>
        </div>
        <?php endif; ?>
      </div>


    </div>

    <!-- Add Spacer -->
    <div class="h-48" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- End Spacer -->

    <div class="blog-box grid-no-gap grid--3-cols g-gap-24">

      <!-- Get the blog posts -->
      <?php
        $args = array(
        'posts_per_page' => 3, 
        'orderby' => 'post_date',
        'order' => 'ASC',
        'post_type' => 'post', 
        'post_status' => 'publish'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
      ?>

      <div class="blog-content">
        <div class="featured-img-holder">
          <?php the_post_thumbnail( 'thumbnail' ); ?>
        </div>
        <div class="blog-info">
          <div class="cat-box no-bg">
            <img
              src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/03/blog-cat-icon.svg">
            <span>
              <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>
            </span>
          </div>

          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

          <?php the_excerpt(); ?>

          <a href="<?php the_permalink(); ?>" class="primary-btn">Learn more</a>

        </div>



      </div>

      <?php 
        endwhile;
        endif; 
      ?>

    </div>



    <!-- Add Spacer -->
    <div class="h-94" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- End Spacer -->
  </div>
</section>

<!-- Use this after doing custom post types to show ACF Blocks -->
<?php wp_reset_query(); ?>


<!-- Add Spacer -->
<div class="h-120" aria-hidden="true" class="wp-block-spacer"></div>
<!-- End Spacer -->