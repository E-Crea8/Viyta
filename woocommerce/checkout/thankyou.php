<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<?php
/**
 * Breadcrumbs
 */
if ( !empty( $breadcrumb ) ) {
  woocommerce_breadcrumb();
}
?>


<!-- Get the Breadcrumbs here -->
<div class="full-width-container border-tb">
  <div class="container breadcrumbs-box">
    <div class="breadcrumbs-holder">
      <!-- start breadcrumbs -->
      <?php 
				if ( function_exists('yoast_breadcrumb') ) {
  				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						} 
			?>
      <!-- end breadcrumbs -->
    </div>
  </div>
</div>
<!-- End the Breadcrumbs here -->


<!-- Add spacer -->
<div class="h-100"></div>
<!-- Remove spacer -->


<div class="full-width-container border-bottom">
  <div class=" container m-auto thank-you-box">



    <div class="woocommerce-order order-box">

      <?php
				if ( $order ) :

					do_action( 'woocommerce_before_thankyou', $order->get_id() );
			?>

      <?php if ( $order->has_status( 'failed' ) ) : ?>

      <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed order-failed-box">
        <?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
      </p>

      <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
        <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"
          class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
        <?php if ( is_user_logged_in() ) : ?>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"
          class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
        <?php endif; ?>
      </p>

      <?php else : ?>


      <div class="order-success-message-box">
        <img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/04/firework-icon.svg"
          alt="fireworks-icon">


        <h2
          class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received order-success-title">
          <?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you for your purchase!', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </h2>

        <div class="woocommerce-order-overview woocommerce-thankyou-order-details order_details order-success-details">

          <p class="woocommerce-order-overview__order order">
            <span class="order-no">
              <?php esc_html_e( 'Order', 'woocommerce' ); ?>
              <strong><?php echo '#'. $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
            </span> <span class="fade-text">has been received. You should receive an order confirmation email
              shortly.</span>
          </p>

          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="primary-btn">Back to Home</a>


        </div>

      </div>

      <?php endif; ?>

      <?php //do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
      <?php //do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

      <?php else : ?>

      <!-- <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
        <?php //echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
      </p> -->

      <?php endif; ?>

    </div>

  </div>
</div>