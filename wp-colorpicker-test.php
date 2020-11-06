<?php
/*
Plugin Name: WP ColorPicker Test
Plugin URI: http://maddisondesigns.com
Description: A simple plugin to test the WP Color Picker Alpha script
Version: 1.0.1
Author: Anthony Hortin
Author URI: http://maddisondesigns.com
Text Domain: skyrocket
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Load all our Customizer options
 */
function skyrocket_customizer_setup() {
	include_once trailingslashit( dirname(__FILE__) ) . 'inc/customizer.php';
}
add_action( 'after_setup_theme', 'skyrocket_customizer_setup' );
