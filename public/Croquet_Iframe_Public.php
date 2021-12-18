<?php

/**
 * The public-facing functionality of the plugin.
 */

class Croquet_Iframe_Public {

    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        croquet_iframe_log("Constructing a Croquet_Iframe_Public");
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->register_short_codes();
    }

    /**
     * Add all shortcodes for the user to add to pages or posts
     */
    private function register_short_codes() {
        add_shortcode('croquet-rain-map', [$this, 'rain_map_function']);
        add_shortcode('croquet-google-map', [$this, 'google_map_function']);
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
        return '<p><iframe src="https://maps.meteoradar.co.uk/GratisRadar/' . $latitude . '/' . $longitude . '/actueel?zoom= ' . $zoom . '" scrolling="no" width="500" height="500" frameborder="no"></iframe></p>';
    }

    public function google_map_function($atts) {
        foreach ($atts as $att => $val) {
            if ($att === 'pb') {
                $pb = $val;
            } else {
                return 'Bad shortcode parameter ' . $att;
            }
        }
        return '<p><iframe src="https://www.google.com/maps/embed?pb=' . esc_html($pb) . '" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></p>';
    }

}
