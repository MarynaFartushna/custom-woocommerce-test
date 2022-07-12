<?php

/**
 * Add custom Field for new tab
 */

add_action( 'woocommerce_product_options_general_product_data', 'custom_woo_product_custom_fields' );

// Save Field
add_action( 'woocommerce_process_product_meta', 'custom_woo_product_custom_fields_save' );

function custom_woo_product_custom_fields() {
	global $woocommerce, $post;
	echo '<div class="product_custom_field">';

	//Custom Product  Textarea
	woocommerce_wp_textarea_input(
		array(
			'id'          => 'custom_woo_product_textarea',
			'placeholder' => 'Custom Product Textarea',
			'label'       => __( 'Custom Product Textarea', 'woocommerce' )
		)
	);
	echo '</div>';

}

function custom_woo_product_custom_fields_save( $post_id ) {
	// Custom Product Textarea Field
	$woocommerce_custom_procut_textarea = $_POST['custom_woo_product_textarea'];
	if ( ! empty( $woocommerce_custom_procut_textarea ) ) {
		update_post_meta( $post_id, 'custom_woo_product_textarea', esc_html( $woocommerce_custom_procut_textarea ) );
	}
}


/**
 * Add a custom product data tab
 * https://woocommerce.com/document/editing-product-data-tabs/
 */

add_filter( 'woocommerce_product_tabs', 'custom_woo_product_tab' );

function custom_woo_product_tab( $tabs ) {

	$tabs['test_tab'] = array(
		'title'    => __( 'Information for goners', 'woocommerce' ),
		'priority' => 50,
		'callback' => 'custom_woo_product_tab_content'
	);

	return $tabs;

}

function custom_woo_product_tab_content() {

	// The new tab content

	echo '<h2>' . __( 'Information for goners', 'woocommerce' ) . '</h2>';

	// Display the value of custom field
	echo get_post_meta( get_the_ID(), 'custom_woo_product_textarea', true );

}


/**
 * Add a new text input field on the product page
 *
 */

add_action( 'woocommerce_before_add_to_cart_button', 'custom_woo_add_custom_fields' );

function custom_woo_add_custom_fields() {

	global $product;

	ob_start();

	?>
	<div class="custom-propose-wrapper">
		<span class="" for="custom-propose"><?php esc_html_e( 'Your custom propose:', 'woocommerce' ); ?></span>
		<input class="form-control" type="text" id="custom-propose" name="custom_propose" value="">
	</div>

	<div class="clear"></div>

	<?php

	$content = ob_get_contents();
	ob_end_flush();

	return $content;
}

// * Add custom data to Cart

add_filter( 'woocommerce_add_cart_item_data', 'custom_woo_add_item_data', 10, 3 );

function custom_woo_add_item_data( $cart_item_data, $product_id, $variation_id ) {
	if ( isset( $_REQUEST['custom_propose'] ) ) {
		$cart_item_data['custom_propose'] = sanitize_text_field( $_REQUEST['custom_propose'] );
	}

	return $cart_item_data;
}

// * Display information as Meta on Cart page

add_filter( 'woocommerce_get_item_data', 'custom_woo_add_item_meta', 10, 2 );

function custom_woo_add_item_meta( $item_data, $cart_item ) {

	if ( array_key_exists( 'custom_propose', $cart_item ) ) {
		$custom_details = $cart_item['custom_propose'];

		$item_data[] = array(
			'key'   => 'Custom propose',
			'value' => $custom_details
		);
	}

	return $item_data;
}

// * Save data to order

add_action( 'woocommerce_checkout_create_order_line_item', 'custom_woo_add_custom_order_line_item_metas', 10, 4 );

function custom_woo_add_custom_order_line_item_metas( $item, $cart_item_key, $values, $order ) {

	if ( array_key_exists( 'custom_propose', $values ) ) {
		$item->add_meta_data( __( 'Custom propose', 'woocommerce' ), $values['custom_propose'] );
	}
}