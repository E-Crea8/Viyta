<?php
// Menu Support
add_theme_support('menus' );
register_nav_menus(array(
	'top-menu' => __('Top Menu','theme')
	
));

/**
 * viyta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package viyta
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function viyta_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on viyta, use a find and replace
		* to change 'viyta' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'viyta', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'viyta' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'viyta_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'viyta_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function viyta_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'viyta_content_width', 640 );
}
add_action( 'after_setup_theme', 'viyta_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function viyta_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'viyta' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'viyta' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'viyta_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function viyta_scripts() {
	wp_enqueue_style( 'viyta-style', get_stylesheet_uri(), array(), _S_VERSION, true);
	wp_style_add_data( 'viyta-style', 'rtl', 'replace' );

	wp_enqueue_style('viyta-main', get_template_directory_uri() . '/assets/css/style.css');

	wp_enqueue_script( 'viyta-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'viyta-custom-script', get_template_directory_uri() . '/assets/js/custom-script.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'viyta_scripts' );


/**
 * Custom CDN Fonts (https://www.cdnfonts.com/aileron.font)
 */
function enqueue_custom_fonts() {
	if(!is_admin()) {
		wp_register_style('Aileron', 'https://fonts.cdnfonts.com/css/aileron?styles=20898,20899,20891,20889,,20893');
	
		
		wp_enqueue_style('Aileron');
	}
}

add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');

// End Enqueue Custom Fonts


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * Register Footer Widgets Sidebars
 * 
 */

add_action( 'widgets_init', 'footer_widgets' );
function footer_widgets() {
	/* Register footer widget 1 */
	register_sidebar(
		array(
			'id'            => 'footer-column-1',
			'name'          => __( 'Footer Column 1' ),
			'description'   => __( 'footer sidebar to display widgets 1.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);


	/* Register footer widget 2 */
	register_sidebar(
		array(
			'id'            => 'footer-column-2',
			'name'          => __( 'Footer Column 2' ),
			'description'   => __( 'footer sidebar to display widgets 2.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);


	/* Register footer widget 3 */
	register_sidebar(
		array(
			'id'            => 'footer-column-3',
			'name'          => __( 'Footer Column 3' ),
			'description'   => __( 'footer sidebar to display widgets 3.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);


	/* Register footer widget 4 */
	register_sidebar(
		array(
			'id'            => 'footer-column-4',
			'name'          => __( 'Footer Column 4' ),
			'description'   => __( 'footer sidebar to display widgets 4.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);


	/* Register footer widget 5 */
	register_sidebar(
		array(
			'id'            => 'footer-column-5',
			'name'          => __( 'Footer Column 5' ),
			'description'   => __( 'footer sidebar to display widgets 5.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}

// End Footer widgets

// current year
function currentYear( $atts ){
	return date('Y');
}
add_shortcode( 'year', 'currentYear' );

// End current year


// WooCommerce Theme Support
function viyta_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'viyta_add_woocommerce_support' );


// WooCommerce displar description before amount
add_action( 'woocommerce_after_shop_loop_item_title', 'woo_show_excerpt_shop_page', 5 );
function woo_show_excerpt_shop_page() {
	global $product;
	?>
<div class="woocommerce-product-description">
  <p>
    <?php
	echo $product->post->post_excerpt;

	?>
  </p>
</div>
<?php

}

/**
 * Display QTY Input before add to cart link.
 */
// function custom_wc_template_loop_quantity_input() {
// 	// Global Product.
// 	global $product;

// 	// Check if the product is not null, is purchasable, is a simple product, is in stock, and not sold individually.
// 	if ( $product && $product->is_purchasable() && $product->is_type( 'simple' ) && $product->is_in_stock() && ! $product->is_sold_individually() ) {
// 			woocommerce_quantity_input(
// 					array(
// 							'min_value' => 1,
// 							'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity(),
// 					)
// 			);
// 	}
// }
// add_action( 'woocommerce_after_shop_loop_item', 'custom_wc_template_loop_quantity_input', 9 );

/**
 * Override loop template and show quantities next to add to cart buttons
 */
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}
	return $html;
}


function cs_wc_loop_add_to_cart_scripts() {
    if ( is_shop() || is_product_category() || is_product_tag() || is_product() ) : ?>

<script>
jQuery(document).ready(function($) {
  $(document).on('change', '.quantity .qty', function() {
    $(this).parent('.quantity').next('.add_to_cart_button').attr('data-quantity', $(this).val());
  });
});
</script>

<?php endif;
}

add_action( 'wp_footer', 'cs_wc_loop_add_to_cart_scripts' );




/*=============================================
=            BREADCRUMBS			            =
=============================================*/

//  to include in functions.php
function the_breadcrumb() {

	$sep = ' / ';

	if (!is_front_page()) {

// Start the breadcrumb with a link to your homepage
			echo '<div class="breadcrumbs">';
			echo '<a href="';
			echo get_option('home');
			echo '">';
			bloginfo('name');
			echo '</a>' . $sep;

// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
			if (is_category() || is_single() ){
					the_category('title_li=');
			} elseif (is_archive() || is_single()){
					if ( is_day() ) {
							printf( __( '%s', 'text_domain' ), get_the_date() );
					} elseif ( is_month() ) {
							printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
					} elseif ( is_year() ) {
							printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
					} else {
							_e( 'Blog Archives', 'text_domain' );
					}
			}

// If the current page is a single post, show its title with the separator
			if (is_single()) {
					echo $sep;
					the_title();
			}

// If the current page is a static page, show its title.
			if (is_page()) {
					echo the_title();
			}

// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
			if (is_home()){
					global $post;
					$page_for_posts_id = get_option('page_for_posts');
					if ( $page_for_posts_id ) { 
							$post = get_post($page_for_posts_id);
							setup_postdata($post);
							the_title();
							rewind_posts();
					}
			}

			echo '</div>';
	}
}

// End Breadcrumbs function

// Get all categoris


  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
 $all_categories = get_categories( $args );
 foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
        $category_id = $cat->term_id;       
        echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';

        // $args2 = array(
        //         'taxonomy'     => $taxonomy,
        //         'child_of'     => 0,
        //         'parent'       => $category_id,
        //         'orderby'      => $orderby,
        //         'show_count'   => $show_count,
        //         'pad_counts'   => $pad_counts,
        //         'hierarchical' => $hierarchical,
        //         'title_li'     => $title,
        //         'hide_empty'   => $empty
        // );
        // $sub_cats = get_categories( $args2 );
        // if($sub_cats) {
        //     foreach($sub_cats as $sub_category) {
        //         echo  $sub_category->name ;
        //     }   
        // }
    }       
}

// Post Escerpt Length
function custom_excerpt_length( $length ) {
	return 20; // Change the number to the desired length
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Function to define custom fields in single woocommerce product details page

function custom_product_fields() {
	// Add custom fields here
		woocommerce_wp_checkbox( array(
			'id'          => 'dairy_free',
			'label'       => __( 'Dairy-Free', 'textdomain' ),
			'desc_tip'    => true,
			'description' => __( 'Check box if product is Dairy-Free', 'textdomain' ),
	) );

	woocommerce_wp_checkbox( array(
		'id'          => 'gluten_free',
		'label'       => __( 'Gluten-Free', 'textdomain' ),
		'desc_tip'    => true,
		'description' => __( 'Check box if product is Gluten-Free', 'textdomain' ),
	) );

	woocommerce_wp_checkbox( array(
		'id'          => 'non_gmo',
		'label'       => __( 'Non-GMO', 'textdomain' ),
		'desc_tip'    => true,
		'description' => __( 'Check box if product is Non-GMO', 'textdomain' ),
	) );

	woocommerce_wp_checkbox( array(
		'id'          => 'vegan',
		'label'       => __( 'Vegan', 'textdomain' ),
		'desc_tip'    => true,
		'description' => __( 'Check box if product is Vegan', 'textdomain' ),
	) );

}
add_action( 'woocommerce_product_options_general_product_data', 'custom_product_fields' );


// Function to save custom field data
function save_custom_product_fields( $post_id ) {
	// Save custom field data
	$custom_checkbox_field_value_1 = isset( $_POST['dairy_free'] ) ? 'yes' : 'no';	$custom_checkbox_field_value_2 = isset( $_POST['gluten_free'] ) ? 'yes' : 'no';
	$custom_checkbox_field_value_3 = isset( $_POST['non_gmo'] ) ? 'yes' : 'no';
	$custom_checkbox_field_value_4 = isset( $_POST['vegan'] ) ? 'yes' : 'no';

	update_post_meta( $post_id, 'dairy_free', $custom_checkbox_field_value_1 );
	update_post_meta( $post_id, 'gluten_free', $custom_checkbox_field_value_2 );
	update_post_meta( $post_id, 'non_gmo', $custom_checkbox_field_value_3 );
	update_post_meta( $post_id, 'vegan', $custom_checkbox_field_value_4 );
}
add_action( 'woocommerce_process_product_meta', 'save_custom_product_fields' );


// Function to display custom product fields data
function display_custom_product_fields() {
	// Display custom field data
	global $product;
	$custom_checkbox_field_value_1 = get_post_meta( $product->get_id(), 'dairy_free', true );
	$custom_checkbox_field_value_2 = get_post_meta( $product->get_id(), 'gluten_free', true );
	$custom_checkbox_field_value_3 = get_post_meta( $product->get_id(), 'non_gmo', true );
	$custom_checkbox_field_value_4 = get_post_meta( $product->get_id(), 'vegan', true );

	?>
<div class="custom-field">
  <div class="first-row">

    <?php
			if ( 'yes' === $custom_checkbox_field_value_1) {
				echo '<p class="diary-free">' . __( 'Diary-Free', 'textdomain' ) . '</p>';
			}

			if ( 'yes' === $custom_checkbox_field_value_2 ) {
				echo '<p class="glutten-free">' . __( 'Gluten-Free', 'textdomain' ) . '</p>';
			}

		?>
  </div>

  <div class="second-row">

    <?php
			if ( 'yes' === $custom_checkbox_field_value_3 ) {
			echo '<p class="non-gmo">' . __( 'Non-GMO', 'textdomain' ) . '</p>';
			}

			if ( 'yes' === $custom_checkbox_field_value_4 ) {
			echo '<p class="vegan">' . __( 'Vegan', 'textdomain' ) . '</p>';
			}
		?>
  </div>
</div>

<?php
}
add_action( 'woocommerce_single_product_summary', 'display_custom_product_fields', 20 );


// Create custom product tab
/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab'] = array(
		'title' 	=> __( 'Suggested usage', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;

}
function woo_new_product_tab_content() {

	// The new tab content

	echo '<h2>New Product Tab</h2>';
	echo '<p>Here\'s your new product tab.</p>';
	
}
// End Create custom product tab

// Renaming the description tab on the single product page

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Product description' );		// Rename the description tab
	// $tabs['reviews']['title'] = __( 'Ratings' );				// Rename the reviews tab
	// $tabs['additional_information']['title'] = __( 'Product Data' );	// Rename the additional information tab

	return $tabs;

}

// Function to add the cartsidebar.php in woocommerce footer so it can appear on all pages.
function show_cart_sidebar() {
	if (!is_cart()) {
			// display the toggle element
			echo '<div class="cart-container" id="cart-sidebar">';
			// output the content of the toggle element
			// echo '<div class="toggle-content">';
			// get the content of the toggle element from cart.php
			ob_start();
			include(get_template_directory() .'/woocommerce/cart/cartsidebar.php');
			$content = ob_get_clean();
			echo $content;
			echo '</div>';
	}
}
add_action('wp_footer', 'show_cart_sidebar');


// WoCommerce Checkout -  Add placeholder to Billing Fields
add_filter( 'woocommerce_checkout_fields', 'my_custom_checkout_fields_placeholder' );

function my_custom_checkout_fields_placeholder( $fields ) {
   // Add placeholder to the billing first name field
   $fields['billing']['billing_first_name']['placeholder'] = 'First name';


   // Add placeholder to the billing last name field
   $fields['billing']['billing_last_name']['placeholder'] = 'Last name';

	 // Add placeholder to the billing email field
   $fields['billing']['billing_email']['placeholder'] = 'Email';

	 // Add placeholder to the billing phone number field
   $fields['billing']['billing_phone']['placeholder'] = 'Phone number';

		// Add placeholder to the billing street address field 1
		$fields['billing']['billing_address_1']['placeholder'] = 'Street Address';

		// Add placeholder to the billing street address field 2
		$fields['billing']['billing_address_2']['placeholder'] = 'Street Address';

		// Add placeholder to the billing postal code field
		$fields['billing']['billing_postcode']['placeholder'] = 'Zip code';

		// Add placeholder to the billing city field
		$fields['billing']['billing_city']['placeholder'] = 'City';
			
		// Add placeholder to the billing country field
		$fields['billing']['billing_country']['placeholder'] = 'Country';

		// Add placeholder to the billing phone number field
		$fields['billing']['billing_phone']['placeholder'] = 'Phone number';

	 return $fields;
}
// WoCommerce Checkout -  End Add placeholder to Billing Fields

// WooCommerce Checkout - Make Address field not required
add_filter( 'woocommerce_billing_fields', 'make_billing_address_fields_not_required' );
function make_billing_address_fields_not_required( $fields ) {
    $fields['billing_address_1']['required'] = false;
    $fields['billing_city']['required'] = false;
    $fields['billing_postcode']['required'] = false;
    $fields['billing_country']['required'] = false;
    $fields['billing_state']['required'] = false;

    return $fields;
}

// WooCommerce Checkout - End Make Address field not required

// Function to add custom post type with categories for help
// function help_post_type() {
// 	$labels = array(
// 			'name' => 'Help Articles',
// 			'singular_name' => 'Help Article',
// 			'add_new' => 'Add New',
// 			'add_new_item' => 'Add New Help Article',
// 			'edit_item' => 'Edit Help Article',
// 			'new_item' => 'New Help Article',
// 			'view_item' => 'View Help Article',
// 			'search_items' => 'Search Help Articles',
// 			'not_found' => 'No help articles found',
// 			'not_found_in_trash' => 'No help articles found in Trash',
// 			'parent_item_colon' => '',
// 	);

// 	$args = array(
// 			'labels' => $labels,
// 			'public' => true,
// 			'has_archive' => true,
// 			'rewrite' => array('slug' => 'help'),
// 			'menu_icon' => 'dashicons-info',
// 			'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
// 			'taxonomies' => array('category', 'post_tag')
// 	);

// 	register_post_type('help_article', $args);
// }
// add_action('init', 'help_post_type');

function create_help_post_type() {
	$labels = array(
			'name' => __('Help Posts', 'textdomain'),
			'singular_name' => __('Help Post', 'textdomain'),
			'menu_name' => __('Help Posts', 'textdomain'),
	);

	$args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'help_post'),
			'menu_icon' => 'dashicons-info',
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
			'taxonomies' => array('help_post_type_categories', 'help_post_type_tags'),
	);

	register_post_type('help_post_type', $args);

	$category_labels = array(
			'name' => __('Help Post Categories', 'textdomain'),
			'singular_name' => __('Help Post Category', 'textdomain'),
			'menu_name' => __('Help Post Categories', 'textdomain'),
	);

	$category_args = array(
			'labels' => $category_labels,
			'public' => true,
			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'help-category' )
	);

	register_taxonomy('help_post_type_categories', 'help_post_type', $category_args);

	$tag_labels = array(
			'name' => __('Help Post Tags', 'textdomain'),
			'singular_name' => __('Help Post Tag', 'textdomain'),
			'menu_name' => __('Help Post Tags', 'textdomain'),
	);

	$tag_args = array(
			'labels' => $tag_labels,
			'public' => true,
			'hierarchical' => false,
			'rewrite' => array( 'slug' => 'help-tags' )
	);

	register_taxonomy('help_post_type_tags', 'help_post_type', $tag_args);
}
add_action('init', 'create_help_post_type');