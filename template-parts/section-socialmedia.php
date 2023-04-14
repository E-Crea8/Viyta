<!-- Get all the fields in the Section -->
<?php 
  $title = get_sub_field('heading_text'); 
  $description = get_sub_field('description_text'); 
  $linkText1 = get_sub_field('link_text_1'); 
  $linkUrl1 = get_sub_field('link_url_1'); 
  $linkText2 = get_sub_field('link_text_2'); 
  $linkUrl2 = get_sub_field('link_url_2'); 
  $imagesContent = get_sub_field('images'); 
?>

<section class="is-layout-flex is-layout-flex wp-container wp-block-columns container two-column p-0">
  <div class="is-layout-flow wp-block-column is-vertically-aligned-center">
    <!-- if title has value -->
    <?php if( !empty($title)): ?>
    <h2 class="h2-heading mw-570 mb-24">
      <?php echo $title; ?>
    </h2>
    <?php endif; ?>

    <!-- if description has value -->
    <?php if( !empty($description)): ?>

    <?php echo $description; ?>

    <?php endif; ?>

    <!-- if button link has value -->
    <?php if( !empty($linkText1) && !empty($linkUrl1) && !empty($linkText2) && !empty($linkUrl2)): ?>
    <div class="is-layout-flex social-buttons gap-24">
      <a href="<?php echo $linkUrl1; ?>" class="button-no-bg fw-600 has-underline">
        <?php echo $linkText1; ?>
      </a>
      <a href="<?php echo $linkUr2; ?>" class="button-no-bg no-underline">
        <?php echo $linkText2; ?>
      </a>
    </div>
    <?php endif; ?>
  </div>

  <div class="grid-no-gap grid-gap-10 grid--2-cols">
    <?php foreach($imagesContent as $imagesContents): ?>

    <img src="<?php echo esc_url($imagesContents['image']['url']); ?>" class="img-fluid"
      alt="<?php echo esc_attr($imagesContents['image']['alt']); ?>">

    <?php endforeach; ?>
  </div>

</section>

<!-- Add Spacer -->
<div class="h-120"></div>
<!-- End Spacer -->