<!-- Get all the fields in the Section -->
<?php 
  $title = get_sub_field('heading_title'); 
  $description = get_sub_field('description_text'); 
  $columnContent = get_sub_field('column_content'); 
?>

<section class="container three-column p-0">
  <!-- heading -->
  <?php if( !empty($title)): ?>
  <h2 class="h2-heading m-auto mw-417 mb-24" style="font-size:48px">
    <?php echo $title; ?>
  </h2>
  <?php endif; ?>

  <!-- description -->
  <?php if( !empty($description)): ?>
  <?php echo $description; ?>
  <?php endif; ?>

  <div style="height:48px" aria-hidden="true" class="wp-block-spacer"></div>

  <!-- Row 3 columns -->
  <div class="grid-no-gap grid--3-cols no-flex-gap mb-0">

    <?php foreach($columnContent as $columnContents): ?>

    <div class="col-goals padding-32">
      <div class="wp-block-image rounded-box">
        <img src="<?php echo esc_url($columnContents['image']['url']); ?>" class="img-fluid"
          alt="<?php echo esc_attr($columnContents['image']['alt']); ?>">
      </div>

      <h3 class="has-text-align-center h3-heading mb-12" style="font-size:24px">
        <?php echo $columnContents['title']; ?>
      </h3>

      <?php echo $columnContents['description']; ?>
    </div>

    <?php endforeach; ?>

  </div>

</section>

<!-- Add Spacer -->
<div class="h-120"></div>
<!-- End Spacer -->