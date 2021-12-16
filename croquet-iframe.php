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

if (! function_exists("write_log")) {
    function write_log($log) { // TODO delete when no longer needed or make it depend  on WP_DEBUG
        if (is_array($log) || is_object($log)){
            error_log(print_r($log,true,3,"/tmp/my.log"));
        } else {
            error_log($log,3,"/tmp/my.log");
        }
    }
}


define('CROQUET_IFRAME_VERSION', '1.0.0');

function activate_croquet_iframe()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-croquet-iframe-activator.php';
    Croquet_Iframe_Activator::activate();
}

function deactivate_croquet_iframe()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-croquet-iframe-deactivator.php';
    Croquet_Iframe_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_croquet_iframe');
register_deactivation_hook(__FILE__, 'deactivate_croquet_iframe');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-croquet-iframe.php';

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
write_log("Starting up plugin");
run_croquet_iframe();
