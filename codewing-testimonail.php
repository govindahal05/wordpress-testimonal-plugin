<?php
/*
Plugin Name: codewing Test Testimonail
Plugin URI: https://wordpress.org/plugins/codewing-test-testimonal/
Description: Basic Testimonal Test
Version: 1.0.0
Author: Govinda
Author URI: https://www.govindahal.com.np
License: GPL3
License URI: http://www.gnu.org/licenses/gpl.html
Text Domain: codewing-test-testimonal
*/

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'CWTEST_PATH', plugin_dir_path( __FILE__ ) );

// Current version of the plugin.
define( 'CWTEST_VERSION', '1.3.2' );

// Path/URL to root of this plugin, with trailing slash.
define( 'CWTEST_URL', plugin_dir_url( __FILE__ ) );

if ( ! function_exists( 'cwtest_user_scripts' ) ) {
    function cwtest_user_scripts() {

        wp_enqueue_style( 'style',  CWTEST_URL . "/css/style.css");
        wp_enqueue_style( 'bootstrap-style',  "https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css");

        wp_enqueue_script( 'my-plugin-script', CWTEST_URL. 'js/script.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'my-plugin-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js', '1.0', false );

        
    }
}

add_action( 'wp_enqueue_scripts', 'cwtest_user_scripts' );

require CWTEST_PATH . 'includes/class-cwtest-init.php';
require CWTEST_PATH . 'includes/class-cwtest-meta.php';
