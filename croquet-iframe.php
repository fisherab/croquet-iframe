<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://stevefisher.org.uk/
 * @since             1.0.0
 * @package           Croquet_Iframe
 *
 * @wordpress-plugin
 * Plugin Name:       Croquet iframe
 * Plugin URI:        https://github.com/fisherab/croquet-iframe
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Steve Fisher
 * Author URI:        https://stevefisher.org.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       croquet-iframe
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CROQUET_IFRAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-croquet-iframe-activator.php
 */
function activate_croquet_iframe() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-croquet-iframe-activator.php';
	Croquet_Iframe_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-croquet-iframe-deactivator.php
 */
function deactivate_croquet_iframe() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-croquet-iframe-deactivator.php';
	Croquet_Iframe_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_croquet_iframe' );
register_deactivation_hook( __FILE__, 'deactivate_croquet_iframe' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-croquet-iframe.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_croquet_iframe() {

	$plugin = new Croquet_Iframe();
	$plugin->run();

}
run_croquet_iframe();
