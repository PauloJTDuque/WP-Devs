<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- wp_head() = Função que carrega scripts e folhas de estilo e outros -->
    <?php wp_head(); ?> 
</head>
<body <?php body_class();?>>
    <h1>Esse é o meu Primeiro Tema</h1>
    <div id="page" class="site"></div>
        <header>
            <section class="top-bar">
                <div class="container">
                    <div class="logo">
                        Logo
                    </div>
                    <div class="searchbox">
                        Search
                    </div>                  
                </div>
            </section>
            <section class="menu-area">
                <div class="container">
                    <nav class="main-menu">
                        <?php wp_nav_menu( array( 'theme_location' => 'wp_devs_main_menu' , 'depth' => 2)); ?>
                    </nav>
                </div>
            </section>
        </header>