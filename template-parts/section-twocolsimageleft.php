<!-- Get all the fields in the Section -->
<?php 
  $image = get_sub_field('image'); 
  $title = get_sub_field('heading_text'); 
  $description = get_sub_field('description_text'); 
?>

<section class="full-width-container grid-no-gap grid--2-cols grid-align-center two-cols-full ">
  <!-- <div class="cover-container bg-light m-auto text-center p-tb-48"></div> -->
  <div class="full-img-box">
    <!-- if image has value -->
    <?php if( !empty($image)): ?>

    <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image['alt']); ?>">

    <?php endif; ?>
  </div>
  <div class="content-box-right">
    <div class="content-holder">
      <!-- if title has value -->
      <?php if( !empty($title)): ?>
      <h2 class="h2-heading mb-24">
        <?php echo $title; ?>
      </h2>
      <?php endif; ?>

      <!-- if title has value -->
      <?php if( !empty($description)): ?>

      <?php echo $description; ?>

      <?php endif; ?>
    </div>
  </div>
</section>