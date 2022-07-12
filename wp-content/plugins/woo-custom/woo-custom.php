<?php

/**
 * Plugin Name: Custom woocommerce
 * Description: Custom woocommerce
 * Author URI:  https://t.me/Maryna_Far
 * Author:      Maryna Fartushna
 * Version:     1.0.0
 * Text Domain: woocommerce
 *
 * WC requires at least: 6.6
 * WC tested up to: 6.6.1
 */

// Prevent Data Leaks
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CW_PLUGIN_URL', __FILE__ );

require_once plugin_dir_path( __FILE__ ) . '/admin/init.php';