<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package viyta
 */

?>

<footer id="colophon" class="site-footer">
  <div class="container">
    <!-- display footer widgets here -->
    <div id="sidebar-primary" class="footer-container grid-footer grid--5-cols">
      <div class="widget-box">
        <?php if ( is_active_sidebar( 'footer-column-1' ) ) : ?>
        <?php dynamic_sidebar( 'footer-column-1' ); ?>

        <?php else : ?>
        <!-- Time to add some widgets! -->
        <?php endif; ?>
      </div>

      <div class="widget-box">
        <?php if ( is_active_sidebar( 'footer-column-2' ) ) : ?>
        <?php dynamic_sidebar( 'footer-column-2' ); ?>
        <?php else : ?>
        <!-- Time to add some widgets! -->

        <?php endif; ?>
      </div>

      <div class="widget-box">
        <?php if ( is_active_sidebar( 'footer-column-3' ) ) : ?>
        <?php dynamic_sidebar( 'footer-column-3' ); ?>
        <?php else : ?>
        <!-- Time to add some widgets! -->

        <?php endif; ?>
      </div>

      <div class="widget-box">
        <?php if ( is_active_sidebar( 'footer-column-4' ) ) : ?>
        <?php dynamic_sidebar( 'footer-column-4' ); ?>
        <?php else : ?>
        <!-- Time to add some widgets! -->

        <?php endif; ?>
      </div>

      <div class="widget-box">
        <?php if ( is_active_sidebar( 'footer-column-5' ) ) : ?>
        <?php dynamic_sidebar( 'footer-column-5' ); ?>
        <?php else : ?>
        <!-- Time to add some widgets! -->

        <?php endif; ?>
      </div>


    </div>
    <!-- End footer widgets here -->

    <div class="hr-footer"></div>

    <div class="copyright-info">
      <span>&copy;<?php echo do_shortcode( '[year]' ); ?>, Viyta. All Rights Reserved</span>

      <a href="https://bullshark.studio/" target="_blank">
        <img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/03/bullshark-logo.png"
          alt="bullshark logo">
      </a>
    </div>
    <!-- copyright-info -->
  </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- jQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
  integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<!-- End jQuery CDN -->

<!-- Slick JS CDN -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


<!-- Custom-Script JS -->
<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/custom-script.js"></script>
<!-- End Custom-Script JS -->

<script>
jQuery(document).ready(function($) {
  $(".cart-box").on("click", function(e) {
    e.preventDefault();
    $("#cart-sidebar").toggleClass("cart-open");
  });
});


// jQuery(function($) {
//   $('a[data-toggle="sidebar"]').on('click', function(e) {
//     e.preventDefault();
//     var target = $(this).data('target');
//     $(target).toggleClass('open');
//   });
// });
</script>

</body>

</html>