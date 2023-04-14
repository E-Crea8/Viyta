<?php 
  $title = get_sub_field('heading_title'); 
  $description = get_sub_field('description_text'); 
  $linkText = get_sub_field('link_text'); 
  $linkUrl = get_sub_field('link_url'); 
  $image = get_sub_field('image'); 
?>

<section class="cover-container pl-100 pr-64 pb-0 pt-0">
  <div class="is-layout-flex wp-container-4 wp-block-columns mb-0 mt-0">
    <div class="is-layout-flow wp-block-column is-vertically-aligned-center">
      <!-- if title has value -->
      <?php if( !empty($title)): ?>
      <h1 class="h1-heading mw-570 mb-24">
        <?php echo $title; ?>
      </h1>
      <?php endif; ?>

      <!-- if description has value -->
      <?php if( !empty($description)): ?>

      <?php echo $description; ?>

      <?php endif; ?>

      <!-- if button link has value -->
      <?php if( !empty($linkText) && !empty($linkUrl)): ?>
      <div class="primary-btn">
        <a href="<?php echo $linkUrl; ?>" class="button">
          <?php echo $linkText; ?>
        </a>
      </div>
      <?php endif; ?>
    </div>

    <div class="is-layout-flow wp-block-column">
      <!-- if image has value -->
      <?php if( !empty($image)): ?>

      <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image['alt']); ?>">

      <?php endif; ?>
    </div>
  </div>
</section>
<!-- Add Spacer -->
<div aria-hidden="true" class="h-120"></div>
<!-- End Spacer -->