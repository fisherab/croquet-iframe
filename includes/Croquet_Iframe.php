<?php

/**
 * The core plugin class.
 */
class Croquet_Iframe {

    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        if (defined('CROQUET_IFRAME_VERSION')) {
            $this->version = CROQUET_IFRAME_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'croquet-iframe';

        $this->load_dependencies();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/Croquet_Iframe_Loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/Croquet_Iframe_Public.php';
        $this->loader = new Croquet_Iframe_Loader();
    }

    private function define_public_hooks() {
        $plugin_public = new Croquet_Iframe_Public($this->get_plugin_name(), $this->get_version());
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_loader() {
        return $this->loader;
    }

    public function get_version() {
        return $this->version;
    }
}
