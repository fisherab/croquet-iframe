<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://stevefisher.org.uk/
 * @since      1.0.0
 *
 * @package    Croquet_Iframe
 * @subpackage Croquet_Iframe/public
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
class Croquet_Iframe_Public
{

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
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since 1.0.0
     */
    public function enqueue_styles()
    {

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
    public function enqueue_scripts()
    {

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
    public function register_short_codes()
    {
        add_shortcode('croquet-iframe', [
            $this,
            'croquet_iframe_function'
        ]);
    }

    /**
     * A competition of type competition_ss is a post holding all the data about a competition.
     *
     * The competition has post meta data:
     * * competitors - an array of competitor ids registered for this competition
     * * results - an array indexed by the lower
     * id of the two competitors and from his/her perspective. Within the array
     * is another array indexed by the id of the higher player and holding an
     * array of game results where a game result is an array of hoops for and hoops against.
     *
     * @param array $atts
     *            arguments with the short code
     * @param string $content
     *            material between the opening and closing of the shortcode
     */
    public function croquet_iframe_function($atts, $content = null)
    {
        return 'Competion not specified in call to short code.';
    }
}
	    
