<?php

function custom_woo_activate() {
	// activation logic goes here.
}

register_activation_hook( CW_PLUGIN_URL, 'custom_woo_activate' );


function custom_woo_deactivate() {
	// deactivation logic goes here.
}

register_deactivation_hook( CW_PLUGIN_URL, 'custom_woo_deactivate' );


add_action( 'wp_enqueue_scripts', 'custom_woo_enqueue_scripts' );

function custom_woo_enqueue_scripts() {

	wp_enqueue_style( 'custom_woo_main_css', plugin_dir_url( CW_PLUGIN_URL ) . 'assets/css/main.css' );

}