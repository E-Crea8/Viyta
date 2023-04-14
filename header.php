<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package viyta
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>

  <!-- Slick JS CSS-->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


  <script>
  // (function($) {
  //   $(document).on("change", "li.product .quantity input.qty", function(e) {
  //     e.preventDefault();
  //     var add_to_cart_button = $(this).closest("li.product").find("a.add_to_cart_button");
  //     // For AJAX add-to-cart actions.
  //     add_to_cart_button.attr("data-quantity", $(this).val());
  //     // For non-AJAX add-to-cart actions.
  //     add_to_cart_button.attr("href", "?add-to-cart=" + add_to_cart_button.attr("data-product_id") +
  //       "&quantity=" + $(this).val());
  //   });
  // })(jQuery);
  </script>


</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site main-page">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'viyta' ); ?></a>

    <header id="masthead" class="site-header">





      <!-- <div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$viyta_description = get_bloginfo( 'description', 'display' );
			if ( $viyta_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $viyta_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
      </div>.site-branding -->

      <!-- <nav id="site-navigation" class="main-navigation">
        <button class="menu-toggle" aria-controls="primary-menu"
          aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'viyta' ); ?></button>
        <?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
				?>
        </nav>#site-navigation -->

      <div class="main-nav">

        <?php the_custom_logo(); ?>


        <!-- <nav class="main-nav__navbar">
          <ul class="navbar-menu">
            <li class="nav-item">
              <a href="#" class="nav-link"> Products </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"> Our Story </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"> Blog </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"> Explore </a>

              <ul>
                <li>
                  <a href="#"> submenu 1 </a>
                </li>

                <li>
                  <a href="#"> submenu 2 </a>
                </li>
              </ul>

            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"> Contact </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"> Help </a>
            </li>
          </ul>
        </nav> -->
        <nav class="main-nav__navbar">
          <?php wp_nav_menu(array(
							'menu' => 'top-menu',
							'menu_class' => 'navbar-menu',
							'container' => '',
							'li_class' => 'nav-item',
							'a_class' => 'nav-link',
							'active_class' => 'active'
					));
					?>
        </nav>

        <div class="login-search-box">
          <?php
          if ( is_user_logged_in() ) {
              // Display link for logged in users
              echo '<a href="' . esc_url( wp_logout_url( home_url() ) ) . '">Log out</a>';
          } else {
              // Display link for non-logged in users
              echo '<a href="' . esc_url( wp_login_url() ) . '">Log in</a>';
          }
        ?>

          <!-- <a href="#"> Log in </a> -->

          <a href="#">
            <img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/03/search-icon.svg"
              alt="search icon">
          </a>

          <a href="#" class="cart-box">
            <!-- <a href="<?php echo wc_get_cart_url(); ?>" class="cart-box" data-toggle="sidebar" data-target="#cart-sidebar"> -->
            <img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/03/bag-icon.svg"
              alt="open-cart-icon">

            <?php 
              $cart_count = WC()->cart->get_cart_contents_count();
            ?>
            <span class="cart-count">
              <?php echo $cart_count; ?>
            </span>
          </a>

        </div>



      </div>


    </header><!-- #masthead -->