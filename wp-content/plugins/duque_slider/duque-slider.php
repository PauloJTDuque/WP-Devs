<?php

/**
 * Plugin Name: Duque Slider
 * Plugin URI: https://www.wordpress.org/duque-slider
 * Description: My plugin's description
 * Version: 1.0
 * Requires at least: 5.6
 * Author: Paulo Duque
 * Author URI: https://www.pauloduque.dev
 * License: GPL v2 or later
 * License URI: 
 * Text Domain: duque-slider
 * Domain Path: /languages
 */

 /*
Duque Slider is free software
*/

if( ! defined( 'ABSPATH') ){
    exit;
}
if( ! class_exists( 'Duque_Slider' ) ){
    class Duque_Slider{
        function __construct(){
            $this->define_constants();

            require_once( DUQUE_SLIDER_PATH  .  'post-types/class.duque-slider-cpt.php' );
            $Duque_Slider_Post_Type = new Duque_Slider_Post_Type();
        }
        public function define_constants(){
            define( 'DUQUE_SLIDER_PATH', plugin_dir_path( __FILE__ ) );
            define( 'DUQUE_SLIDER_URL', plugin_dir_url( __FILE__ ) );
            define( 'DUQUE_SLIDER_VERSION', '1.0.0' );        
        }

        public static function activate(){
            update_option( 'rewrite_rules', '' );
        }

        public static function deactivate(){
            flush_rewrite_rules();
            unregister_post_type( 'duque-slider' );
        }

        public static function uninstall(){

        }
    }
}

if( class_exists( 'Duque_Slider' ) ){
    register_activation_hook( __FILE__, array( 'Duque_Slider', 'activate' ) );
    register_deactivation_hook( __FILE__, array( 'Duque_Slider', 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'Duque_Slider', 'uninstall' ) );

    $duque_slider = new Duque_Slider();
} 