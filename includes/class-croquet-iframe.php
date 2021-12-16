<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
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
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-croquet-iframe-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-croquet-iframe-i18n.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-croquet-iframe-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-croquet-iframe-public.php';
        $this->loader = new Croquet_Iframe_Loader();
    }

    private function set_locale() {
        $plugin_i18n = new Croquet_Iframe_i18n();
        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    private function define_admin_hooks() {
        $plugin_admin = new Croquet_Iframe_Admin($this->get_plugin_name(), $this->get_version());
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
