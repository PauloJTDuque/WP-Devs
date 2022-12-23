<?php

if( ! class_exists( 'Duque_Slider_Settings')){
    class Duque_Slider_Settings{
        public static $options;

        public function __construct(){
            self::$options = get_option( 'duque_slider_options' );
            add_action( 'admin_init', array( $this, 'admin_init') );

        }

        public function admin_init(){

            // Nada vai para o database se não houver registro
            // Parâmetro Option group aceita os parâmetros: general,
            // discussion, media, reading, writing, misc, options, privacy
            // referentes a itens nativos do wordpress
            register_setting( 'duque_slider_group', 'duque_slider_options');
            add_settings_section(
                'duque_slider_main_section',
                'How does it works?',
                null,
                'duque_slider_page1',
            );

            add_settings_section(
                'duque_slider_second_section',
                'Other plugin options?',
                null,
                'duque_slider_page2',
            );

            add_settings_field(
                'duque_slider_shortcode',
                'Shortcode',
                array( $this, 'duque_slider_shortcode_callback'),
                //null,
                'duque_slider_page1',
                'duque_slider_main_section',
            );

            add_settings_field(
                'duque_slider_title',
                'Slider TItle',
                array( $this, 'duque_slider_title_callback'),
                //null,
                'duque_slider_page2',
                'duque_slider_second_section',
            );

        }
        public function duque_slider_shortcode_callback(){
            ?>
                <span> Use the shortcode [duque_slider] to display the slider in any page/post/widget</span>
            <?php
        }

        public function mv_slider_title_callback(){
            ?>
                <input type="text"
                 name="duque_slider_options[]"
                 id=""
                 value=""
                 >   
            <?php
        }
    }
}    