<?php

function wpdevs_load_scripts(){
    wp_enqueue_style( 'wpdevs-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all' );
}
// wpdevs-style = parâmetro  handle (identificador do arquivo na fila )
// get_stylesheet_uri() = passa o caminho até o arquivo
// array() - não é necessário
//  '1.0'  - Versão da folha de estilo

add_action( 'wp_enqueue_scripts', 'wpdevs_load_scripts' );
