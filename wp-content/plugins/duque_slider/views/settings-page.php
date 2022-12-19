<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    
    <!-- options.php arquivo responsável  por processar todos os formularios  
    no admin do wordpress e tb os formularios criados pelo usuário-->
    <form action="options.php" method="post"> 
    <?php
        settings_fields ( 'duque_slider_group' );
        //primeira página dentro da guia
        do_settings_sections( 'duque_slider_page1' );
        //apresentar botão que permite enviar dados para tabela
        submit_button( 'Save Settings');
    ?>    

    </form>
    


</div>