<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 */

defined( 'ABSPATH' ) || exit; ?>

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
do_action( 'woocommerce_before_cart' ); ?>


<!-- Add spacer -->
<div class="h-80"></div>
<!-- Remove spacer -->


<div class="full-width-container">
  <div class=" container m-auto main-cart-box">
    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
      <?php do_action( 'woocommerce_before_cart_table' ); ?>
      <div class="cart-summary-content-box">
        <div class="cart-items-box">

          <h2 class="cart-number">
            Your Cart (<?php echo WC()->cart->get_cart_contents_count(); ?> Items)
          </h2>




          <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents cart-summary-table"
            cellspacing="0">
            <thead>
              <tr>

                <!-- <th class="product-thumbnail">
                  <span class="screen-reader-text"><?php esc_html_e( 'Thumbnail image', 'woocommerce' ); ?>
                  </span>
                </th> -->

                <th class="product-name">
                  <?php esc_html_e( 'Product', 'woocommerce' ); ?>
                </th>

                <th class="product-quantity">
                  <?php esc_html_e( 'Quantity', 'woocommerce' ); ?>
                </th>

                <th class="product-price">
                  <?php esc_html_e( 'Price', 'woocommerce' ); ?>
                </th>

                <th class="product-remove"><span
                    class="screen-reader-text"><?php esc_html_e( 'Remove item', 'woocommerce' ); ?></span>
                </th>
                <!-- <th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th> -->
              </tr>
            </thead>

            <tbody>
              <?php do_action( 'woocommerce_before_cart_contents' ); ?>

              <?php
											foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
												$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
												$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

												if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
													$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
													?>
              <tr
                class="cart-details-row woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">


                <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">

                  <div class="thumbnail-product-info-box">
                    <!-- Product Thumbnail -->
                    <div class="thumbnail-box">
                      <?php
															$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

															if ( ! $product_permalink ) {
																echo $thumbnail; // PHPCS: XSS ok.
															} else {
																printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
															}
											?>
                    </div>
                    <!-- End Product Thumbnail -->

                    <div class="info-box">
                      <!-- Product Info -->
                      <?php
														if ( ! $product_permalink ) {
															echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
														} else {
															echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
														}

														do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

														// Meta data.
														echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

														// Backorder notification.
														if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
															echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
														}
												?>

                      <p><?php echo $_product->get_short_description(); ?></p>
                    </div>
                    <!-- End Product Info -->


                  </div>

                </td>

                <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">

                  <p><?php echo $cart_item['quantity']; ?></p>

                </td>


                <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                  <?php
																echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
													?>
                </td>


                <td class="product-remove">
                  <?php
																echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
																	'woocommerce_cart_item_remove_link',
																	sprintf(
																		'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">
																		<img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/04/close-icon-product-items.svg"></a>',
																		esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
																		esc_html__( 'Remove this item', 'woocommerce' ),
																		esc_attr( $product_id ),
																		esc_attr( $_product->get_sku() )
																	),
																	$cart_item_key
																);
															?>
                </td>


              </tr>
              <?php
												}
											}
											?>

              <?php do_action( 'woocommerce_cart_contents' ); ?>

              <!-- <tr>
                <td colspan="6" class="actions">

                  <?php if ( wc_coupons_enabled() ) { ?>
                  <div class="coupon">
                    <label for="coupon_code"
                      class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value=""
                      placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit"
                      class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
                      name="apply_coupon"
                      value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                    <?php do_action( 'woocommerce_cart_coupon' ); ?>
                  </div>
                  <?php } ?>

                  <button type="submit"
                    class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
                    name="update_cart"
                    value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                  <?php do_action( 'woocommerce_cart_actions' ); ?>

                  <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                </td>
              </tr> -->

              <?php do_action( 'woocommerce_after_cart_contents' ); ?>
            </tbody>
          </table>




          <?php do_action( 'woocommerce_after_cart_table' ); ?>




          <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

          <div class="cart-collaterals">
            <?php
						/**
						 * Cart collaterals hook.
						 *
						 * @hooked woocommerce_cross_sell_display
						 * @hooked woocommerce_cart_totals - 10
						 */

						//  comment woocommerce cart collaterals
						// do_action( 'woocommerce_cart_collaterals' );
					?>
          </div>
        </div>

        <div class="order-summary-box bg-light">
          <h3>Order summary</h3>
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

          <div class="btn-box">
            <a href="./../checkout" class="primary-btn checkout-btn">Proceed to Checkout</a>

            <a href="./../shop" class="btn-no-bg shop-btn">Continue shopping</a>

          </div>

          <div class="order-info-box">
            <p class="delivery-info">
              Free Delivery all over Malta on orders over €25.00
            </p>

            <p class="payment-info">
              Safe and Secure payment system
            </p>

          </div>



        </div>
      </div>
    </form>


  </div>

</div>
</div>



<!-- Cart items sidebar -->
<div class="cart-items-sidebar">

  <!-- Start cart popup items if cart is not empty -->
  <?php if (!WC()->cart->is_empty()) { ?>
  <div class="cart-container" id="cart-sidebar">
    <div class="cart-title-box">
      <h2>Your Cart</h2>
      <img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/04/close-button-cart.svg"
        alt="close-cart-icon" class="cart-box">
    </div>


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
							<img src="https://woocommerce-869479-3348306.cloudwaysapps.com/wp-content/uploads/2023/04/close-icon-product-items.svg" alt="remove-product-icon">
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

      <?php
							}
					?>

      <!-- Add spacer -->
      <div class="h-32"></div>
      <!-- Remove spacer -->

      <div class="cart-footer-box">
        <?php 
								// Output the overall subtotal
								echo '<span class="subtotal-text">Subtotal: €' . $subtotal . '</span>'; 
						?>

        <a href="./../cart" class="primary-btn view-cart-btn">View cart</a>

        <a href="./../checkout" class="primary-btn checkout-btn">Checkout</a>

        <a href="./../shop" class="border-grey-btn shop-btn">Continue shopping</a>
      </div>
    </div>
  </div>
  <?php } ?>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>