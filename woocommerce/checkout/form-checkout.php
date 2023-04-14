<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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

<?php


do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<!-- Add spacer -->
<div class="h-80"></div>
<!-- Remove spacer -->


<div class="full-width-container border-bottom">
  <div class=" container m-auto main-checkout-box">
    <form name="checkout" method="post" class="checkout woocommerce-checkout"
      action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

      <?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>

      <?php
							}
						}
					?>


      <div class="checkout-summary-content-box">
        <div class="checkout-customer-info">


          <?php if ( $checkout->get_checkout_fields() ) : ?>

          <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

          <div class="col2-set" id="customer_details">
            <div class="col-1">
              <!-- Comment out default billing details form -->
              <?php //do_action( 'woocommerce_checkout_billing' ); ?>

              <div class="personal-details-box">
                <span class="number-section">01</span>
                <h2>Personal details</h2>
                <div class="firstname-lastname-box">
                  <?php
										$fields = $checkout->get_checkout_fields( 'billing' );
										$fields_order = array(
												'billing_first_name',
												'billing_last_name',
										);
										foreach ( $fields_order as $field ) :
												if ( isset( $fields[ $field ] ) ) {
														woocommerce_form_field( $field, $fields[ $field ], $checkout->get_value( $field ) );
												}
										endforeach;
									?>
                </div>

                <div class="email-phone-box">
                  <?php
										$fields = $checkout->get_checkout_fields( 'billing' );
										$fields_order = array(
												'billing_email',
												'billing_phone',
										);
										foreach ( $fields_order as $field ) :
												if ( isset( $fields[ $field ] ) ) {
														woocommerce_form_field( $field, $fields[ $field ], $checkout->get_value( $field ) );
												}
										endforeach;
									?>
                </div>

              </div>

              <div class="shipping-details-box">
                <span class="number-section">02</span>
                <h2>Shipping details</h2>
                <div class="street-address-box">
                  <?php
											$fields = $checkout->get_checkout_fields( 'billing' );
											$fields_order = array(
													'billing_address_1',
													// 'billing_address_2',
											);
											foreach ( $fields_order as $field ) :
													if ( isset( $fields[ $field ] ) ) {
															woocommerce_form_field( $field, $fields[ $field ], $checkout->get_value( $field ) );
													}
											endforeach;
										?>
                </div>

                <div class="zip-city-country-box">
                  <?php
												$fields = $checkout->get_checkout_fields( 'billing' );
												$fields_order = array(
														'billing_postcode',
														'billing_city',
														'billing_country',
	
												);
												foreach ( $fields_order as $field ) :
														if ( isset( $fields[ $field ] ) ) {
																woocommerce_form_field( $field, $fields[ $field ], $checkout->get_value( $field ) );
														}
												endforeach;
										?>

                </div>
              </div>

              <!-- Additional Shipping Details -->
              <div class="woocommerce-billing-fields__field-wrapper additional-billing-box">
                <?php if ( ! WC()->cart->needs_shipping() || WC()->cart->needs_shipping_address() ) : ?>

                <p id="different-billing-address">
                  <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                    <input id="different-billing-address-checkbox"
                      class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox"
                      name="different_billing_address" value="1" />
                    <span><?php esc_html_e( '+ Add different billing address', 'woocommerce' ); ?></span>
                  </label>
                </p>

                <div class="different_billing_address" style="display:none">
                  <?php //do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

                  <?php //foreach ( $checkout->get_checkout_fields( 'billing' ) as $key => $field ) : ?>
                  <?php //woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                  <?php //endforeach; ?>

                  <?php //do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>

                  <div class="additional-shipping-details-box">
                    <h6>Additional Shipping details</h6>

                    <div class="street-address-box">
                      <?php
											$fields = $checkout->get_checkout_fields( 'billing' );
											$fields_order = array(
													'billing_address_1',
													// 'billing_address_2',
											);
											foreach ( $fields_order as $field ) :
													if ( isset( $fields[ $field ] ) ) {
															woocommerce_form_field( $field, $fields[ $field ], $checkout->get_value( $field ) );
													}
											endforeach;
										?>
                    </div>

                    <div class="zip-city-country-box">
                      <?php
												$fields = $checkout->get_checkout_fields( 'billing' );
												$fields_order = array(
														'billing_postcode',
														'billing_city',
														'billing_country',
	
												);
												foreach ( $fields_order as $field ) :
														if ( isset( $fields[ $field ] ) ) {
																woocommerce_form_field( $field, $fields[ $field ], $checkout->get_value( $field ) );
														}
												endforeach;
										?>

                    </div>



                  </div>
                </div>

              </div>

              <?php endif; ?>
            </div>

          </div>



          <!-- Comment out default additional information form -->
          <!-- <div class="col-2">
					<?php //do_action( 'woocommerce_checkout_shipping' ); ?>
					</div> -->

          <div class="payment-method">
            <div class="select-payment-box">
              <span class="number-section">03</span>
              <h2>Payment method</h2>
              <div class="card-box">
                <?php
								if ( ! is_ajax() ) {
										$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
										WC()->payment_gateways->set_current_gateway( $available_gateways );
								}
							?>

                <?php if ( WC()->cart->needs_payment() ) : ?>
                <div id="payment" class="woocommerce-checkout-payment">
                  <h3><?php esc_html_e( 'Payment', 'woocommerce' ); ?></h3>
                  <?php
									if ( ! empty( $available_gateways ) ) {
											foreach ( $available_gateways as $gateway ) {
													wc_get_template(
															'checkout/payment-method.php',
															array(
																	'gateway' => $gateway,
															)
													);
											}
									} else {
											echo '<div class="woocommerce-notice woocommerce-notice--info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', esc_html__( 'Sorry, no payment methods are available for your location. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									}
								?>
                </div>
                <?php endif; ?>


              </div>

              <div class="secured-text">
                <span>Your transaction is secured with SSL encryption</span>
              </div>

            </div>

          </div>




          <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

          <?php endif; ?>

          <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

          <!-- Commented Order Review Out -->

          <!-- <h3 id="order_review_heading"><?php //esc_html_e( 'Your order', 'woocommerce' ); ?></h3> -->

          <?php //do_action( 'woocommerce_checkout_before_order_review' ); ?>

          <!-- <div id="order_review" class="woocommerce-checkout-review-order">
					<?php //do_action( 'woocommerce_checkout_order_review' ); ?>
					</div> -->

          <!-- End Commented Order Review Out-->

          <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>


        </div>

        <div class="checkout-order-summary-box bg-light">
          <h3>Order summary</h3>

          <div class="cart-items-box">
            <?php
							// Get the current cart
							$cart = WC()->cart;

							// Initialize subtotal variable
							$subtotal = 0;

							// Loop through each cart item
							foreach ( $cart->get_cart() as $cart_item ) {
									// Get the product ID and quantity
									$product_id = $cart_item['product_id'];
									$quantity = $cart_item['quantity'];

									// Get the product object
									$product = wc_get_product( $product_id );

									// Get the product thumbnail
									$thumbnail = $product->get_image();

									// Get the product name
									$name = $product->get_name();

									// Get the product price
									$price = $product->get_price();

									// Calculate the item subtotal
									$item_subtotal = $price * $quantity;

									// Add item subtotal to overall subtotal
									$subtotal += $item_subtotal;
						?>


            <div class="cart-items">
              <div class="thumbnail-info-box">
                <div class="product-thumbnail">

                  <?php echo '<a href="' . $_product->get_permalink() . '">'; ?>

                  <?php
									echo $thumbnail;
								?>

                  <?php echo '</a>'; ?>

                </div>

                <div class="product-info">
                  <?php echo '<a href="' . $_product->get_permalink() . '">'; ?>

                  <?php echo '<h3>' . $name . '</h3>'; ?>

                  <?php echo '</a>'; ?>

                  <?php echo '<span class="price-box">Price: €' . $price . '</span>'; ?>

                  <?php echo '<span class="qty-box">Quantity: ' . $quantity . '</span>'; ?>
                </div>
              </div>

              <div class="remove-box">
                <?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">
										<img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/04/close-icon-product-items.svg">
										</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>

              </div>

            </div>

            <?php } ?>

            <!-- Add spacer -->
            <div class="h-32"></div>
            <!-- Remove spacer -->

          </div>



          <!-- discount box -->
          <div class="discount-form-box">
            <?php if ( wc_coupons_enabled() ) { ?>
            <div class="coupon">
              <label for="coupon_code"
                class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
              <input type="text" name="coupon_code" class="input-text" id="coupon_code" value=""
                placeholder="<?php esc_attr_e( 'Discount code', 'woocommerce' ); ?>" /> <button type="submit"
                class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
                name="apply_coupon"
                value="<?php esc_attr_e( 'Apply', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply', 'woocommerce' ); ?></button>
              <?php do_action( 'woocommerce_cart_coupon' ); ?>
            </div>

            <?php } ?>

            <!-- Comment button update cart -->
            <!-- <button type="submit"
            class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
            name="update_cart"
            value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?>
						</button> -->

            <?php do_action( 'woocommerce_cart_actions' ); ?>

            <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
          </div>

          <div class="cost-box">
            <?php
						global $woocommerce;

						$subtotal = $woocommerce->cart->subtotal; // get the subtotal amount
						$shipping_cost = $woocommerce->cart->shipping_total; // get the shipping cost amount
						$discount = $woocommerce->cart->get_discount_total(); // get the discount amount
						
						$total = $subtotal + $shipping_cost - $discount; // calculate the total amount
						
						// echo 'Subtotal: ' . $subtotal . '<br>';
						// echo 'Shipping cost: ' . $shipping_cost . '<br>';
						// echo 'Discount: ' . $discount . '<br>';
						// echo 'Total: ' . $total;
						
					?>

            <div class="subtotal-box">

              <span class="title">Subtotal</span>
              <span class="price">
                <?php echo wc_price($subtotal); ?>
              </span>
            </div>
            <div class="ship-cost-box">
              <span class="title">Shipping cost</span>
              <span class="price">
                <?php
								// echo WC()->cart->get_shipping_total();
								// Get shipping cost
								// $shipping_cost = WC()->cart->get_shipping_total();
								// if ( $shipping_cost > 0 ) {
								// 	echo wc_price( $shipping_cost );
								// }
								// else{
								// 	echo wc_price ($shipping_cost);
								// }

								echo wc_price ($shipping_cost);

							?>

              </span>
            </div>
            <div class="discount-box">
              <span class="title">Discount (20%)</span>
              <span class="price">
                <?php
							// Get discount amount
							// $discount_amount = 0;
							// foreach ( WC()->cart->get_coupons() as $coupon ) {
							// 	$discount_amount += $coupon->get_amount();
							// }

							// if ( $discount_amount > 0 ) {
							// 	echo wc_price( $discount_amount );
							// }

							echo '-'.wc_price( $discount );

							
							?>
              </span>
            </div>
          </div>

          <div class="total-box">

            <span class="title">Total</span>
            <span class="price">
              <?php
							// Get total cost
							$total_cost = WC()->cart->get_total();
							echo wc_price( $total );

						?>
            </span>
          </div>


          <div class="checkout-btn-box">
            <!-- <a href="./../checkout" class="primary-btn checkout-btn">Place order</a> -->

            <?php
							if ( WC()->cart->needs_payment() ) :
						?>
            <div class="woocommerce-PlaceOrder">
              <?php
								$order_button_text = apply_filters( 'woocommerce_order_button_text', esc_html__( 'Place order', 'woocommerce' ) );
								echo '<button type="submit" class="primary-btn checkout-btn alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
       				?>
            </div>

            <?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>
            <?php endif; ?>



          </div>


        </div>
      </div>

    </form>

  </div>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>


<!-- Toggle script -->
<script type="text/javascript">
jQuery(document).ready(function($) {
  $('#different-billing-address-checkbox').change(function() {
    if ($(this).is(':checked')) {
      $('.different_billing_address').show();
    } else {
      $('.different_billing_address').hide();
    }
  });
});
</script>