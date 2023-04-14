<?php 
  // $image = get_sub_field('image');
  $logoContent = get_sub_field('client_logo');  
?>

<section class="full-width-container p-lr-20">
  <div class="cover-container bg-light m-auto text-center p-tb-48 border-top">
    <div class="logo-box">
      <!-- if image has value -->
      <?php foreach($logoContent as $imageContents): ?>

      <img src="<?php echo esc_url($imageContents['image']['url']); ?>" class="img-fluid"
        alt="<?php echo esc_attr($imageContents['image']['alt']); ?>">

      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Add Spacer -->
<div class="h-120"></div>
<!-- End Spacer -->