<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://stevefisher.org.uk/
 * @since      1.0.0
 *
 * @package    Croquet_Iframe
 * @subpackage Croquet_Iframe/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Croquet_Iframe
 * @subpackage Croquet_Iframe/includes
 * @author     Steve Fisher <dr.s.m.fisher@gmail.com>
 */
class Croquet_Iframe_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'croquet-iframe',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
