<?php 
  $title = get_sub_field('heading_text'); 
  $description = get_sub_field('description_text'); 
  $linkText = get_sub_field('link_text'); 
  $linkUrl = get_sub_field('link_url'); 
   
?>

<section class="full-width-container">
  <div class="container bg-light m-auto text-center p-tb-120 bg-image">
    <!-- if title has value -->
    <?php if( !empty($title)): ?>
    <h2 class="h2-heading mw-520 mb-24 m-auto">
      <?php echo $title; ?>
    </h2>
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
</section>