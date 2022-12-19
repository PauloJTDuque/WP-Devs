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

            // Acrescentando ao menu admin
            add_action( 'admin_menu', array( $this, 'add_menu' ) );

            require_once( DUQUE_SLIDER_PATH  .  'post-types/class.duque-slider-cpt.php' );
            $Duque_Slider_Post_Type = new Duque_Slider_Post_Type();

            require_once( DUQUE_SLIDER_PATH  .  'class.duque-slider-settings.php' );
            $Duque_Slider_Settings = new Duque_Slider_Settings();
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

        public function add_menu(){
            add_menu_page(  //add_plugins_page (dentro de plugins) ou add_theme_page (dentro de Aparência) ou add_options_page (dentro de configurações)
                'Duque Slider Options',
                'Duque Slider',
                'manage_options',
                'duque_slider_admin',
                array( $this, 'duque_slider_settings_page' ),
                'dashicons-images-alt2',
            );
            
            add_submenu_page(
                'duque_slider_admin',
                'Manage Slides',
                'Manage Slides',
                'manage_options',
                'edit.php?post_type=duque-slider',
                null,
                null,
            );

            add_submenu_page(
                'duque_slider_admin',
                'Add New Slide',
                'Add New Slide',
                'manage_options',
                'post-new.php?post_type=duque-slider',
                null,
                null,
            );
        }

        public function duque_slider_settings_page(){
            require( MV_SLIDER_PATH . 'views/settings-page.php');
        }
    }
}

if( class_exists( 'Duque_Slider' ) ){
    register_activation_hook( __FILE__, array( 'Duque_Slider', 'activate' ) );
    register_deactivation_hook( __FILE__, array( 'Duque_Slider', 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'Duque_Slider', 'uninstall' ) );

    $duque_slider = new Duque_Slider();
} 