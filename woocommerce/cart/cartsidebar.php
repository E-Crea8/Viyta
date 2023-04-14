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

defined( 'ABSPATH' ) || exit;

//do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
  <?php do_action( 'woocommerce_before_cart_table' ); ?>

  <!-- Default Table -->

  <?php do_action( 'woocommerce_before_cart_contents' ); ?>

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

  <?php do_action( 'woocommerce_cart_contents' ); ?>


  <?php do_action( 'woocommerce_after_cart_contents' ); ?>
  <!-- </tbody>
  </table>  -->





  <?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>





<!-- Start cart popup items if cart is not empty -->
<?php if (!WC()->cart->is_empty()) { ?>
<!-- <div class="cart-container" id="cart-sidebar"> -->
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
<!-- </div> -->
<?php } ?>




<?php do_action( 'woocommerce_after_cart' ); ?>