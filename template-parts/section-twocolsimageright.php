<!-- Get all the fields in the Section -->
<?php 
  $title = get_sub_field('heading_text'); 
  $description = get_sub_field('description_text');
  $image = get_sub_field('image'); 
  $linkText = get_sub_field('link_text'); 
  $linkUrl = get_sub_field('link_url'); 
?>

<section class="full-width-container grid-no-gap grid--2-cols grid-align-center two-cols-full ">
  <!-- <div class="cover-container bg-light m-auto text-center p-tb-48"></div> -->
  <div class="content-box-left">
    <div class="content-right">
      <!-- if title has value -->
      <div class="content-holder">
        <?php if( !empty($title)): ?>
        <h2 class="h2-heading mb-24">
          <?php echo $title; ?>
        </h2>
        <?php endif; ?>

        <!-- if title has value -->
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
    </div>
  </div>


  <div class="full-img-box">
    <!-- if image has value -->
    <?php if( !empty($image)): ?>

    <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image['alt']); ?>">

    <?php endif; ?>
  </div>

</section>

<!-- Add Spacer -->
<div class="h-120"></div>
<!-- End Spacer -->