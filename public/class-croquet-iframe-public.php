<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://stevefisher.org.uk/
 * @since      1.0.0
 *
 * @package    croquet_iframe
 * @subpackage croquet_iframe/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package Croquet_Iframe
 * @subpackage Croquet_Iframe/public
 * @author Steve Fisher <dr.s.m.fisher@gmail.com>
 */
class Croquet_Iframe_Public {

    /**
     * The ID of this plugin.
     *
     * @since 1.0.0
     * @access private
     * @var string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since 1.0.0
     * @access private
     * @var string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since 1.0.0
     * @param string $plugin_name
     *            The name of the plugin.
     * @param string $version
     *            The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->register_short_codes();
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since 1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Croquet_Iframe_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Croquet_Iframe_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/croquet-iframe-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since 1.0.0
     */
    public function enqueue_scripts()     {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Croquet_Iframe_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Croquet_Iframe_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/croquet-iframe-public.js', array(
            'jquery'
        ), $this->version, false);
    }

    /**
     * Add all shortcodes for the user to add to pages or posts
     */
    private function register_short_codes() {
        add_shortcode('croquet-rain-map', [
            $this,
            'rain_map_function'
        ]);
        add_shortcode('croquet-google-map', [
            $this,
            'google_map_function'
        ]);
    }    

    /**
     * @param array $atts
     *            arguments with the short code
     * @param string $content
     *            material between the opening and closing of the shortcode
     */
    public function rain_map_function($atts, $content = null)     {
        foreach ($atts as $att => $val) {
            $zoom = 5;
            if ($att === "latitude") {
                $latitude = intval($val);
            } elseif ($att === "longitude") {
                $longitude = intval($val);
            } elseif ($att === "zoom") {
                $zoom = intval($val);
            } else {
                return 'Bad shortcode parameter ' . $att;
            }
        }
        return '<iframe src="https://maps.meteoradar.co.uk/GratisRadar/' . $latitude . '/' . $longitude . '/actueel?zoom= ' . $zoom . '" scrolling="no" width="500" height="500" frameborder="no"></iframe>';
    }

    public function google_map_function($atts) {
        foreach ($atts as $att => $val) {
            if ($att === 'pb') {
                $pb = $val;
            } else {
                return 'Bad shortcode parameter ' . $att;
            }
        }
        return '<iframe src="https://www.google.com/maps/embed?pb=' . esc_html($pb) . '" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
    }

}
