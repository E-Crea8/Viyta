<?php 
  $title = get_sub_field('heading_title');  
?>

<section class="full-width-container p-lr-20 pt-20">
  <div class="cover-container bg-light m-auto text-center p-tb-80">
    <!-- if title has value -->
    <?php if( !empty($title)): ?>
    <h1 class="h1-heading mw-553 m-auto">
      <?php echo $title; ?>
    </h1>
    <?php endif; ?>
  </div>
</section>