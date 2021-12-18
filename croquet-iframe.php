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
 * @package           croquet_iframe
 *
 * @wordpress-plugin
 * Plugin Name:       Croquet Iframe
 * Plugin URI:        https://github.com/fisherab/croquet-iframe
 * Description:       This provides shortcodes iframe support for specific sites that might be useful to embed and the ability to generate code with specific JS scipts. 
 * Version:           1.0.0
 * Author:            Steve Fisher
 * Author URI:        https://stevefisher.org.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       croquet-iframe
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die();
}

function croquet_iframe_log($msg) {
    $file = plugin_dir_path( __FILE__ ) . '/errors.txt'; 
    $fo = fopen( $file, "a" ); 
    fputs($fo,$msg . PHP_EOL);
    fclose($fo);
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/Croquet_Iframe.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 1.0.0
 */
function run_croquet_iframe()
{
    $plugin = new Croquet_Iframe();
    $plugin->run();
}

run_croquet_iframe();
