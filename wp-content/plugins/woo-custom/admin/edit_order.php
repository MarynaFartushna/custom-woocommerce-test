<?php

/**
 * Remove some (hardcoded) products from current order & create one more order
 */

function custom_woo_process_order( $order_id ) {
	if ( ! $order_id ) {
		return;
	}

	// get order object
	$order = new WC_Order( $order_id );

	// Iterating through order shipping items
	foreach ( $order->get_items( 'shipping' ) as $item_id => $item ) {
		$shipping_method_title       = $item->get_method_title();
		$shipping_method_id          = $item->get_method_id();
	}

	//Hardcode now
	$random_idis = [ 33, 34, 35, 36 ];

	$removed_items = [];

	// get order items = each product in the order
	$items = $order->get_items();

	foreach ( $items as $item ) {
		$product = wc_get_product( $item['product_id'] );

		if ( in_array( $product->get_id(), $random_idis ) ) {

			$removed_items[] = $product->get_id();

			$order->remove_item( $item->get_id() );

		}
	}

	$order->calculate_totals();

	$order->save();

	//new order

	$new_order = wc_create_order();

	foreach ( $removed_items as $removed_item ) {
		$new_order->add_product( wc_get_product( $removed_item ), 1 );
	}

	$shipping = new WC_Order_Item_Shipping();
	$shipping->set_method_title( $shipping_method_title );
	$shipping->set_method_id( $shipping_method_id );
	$new_order->add_item( $shipping );
	$new_order->set_address( $order->get_address() );
	$new_order->set_address( $order->get_address( 'shipping' ), 'shipping' );
	$new_order->set_payment_method( $order->get_payment_method() );
	$new_order->set_payment_method_title( $order->get_payment_method_title() );
	$new_order->set_status( 'wc-on-hold', 'Order is created programmatically' );
	$new_order->calculate_totals();
	$new_order->save();
}

add_action( 'woocommerce_checkout_order_processed', 'custom_woo_process_order', 10, 1 );