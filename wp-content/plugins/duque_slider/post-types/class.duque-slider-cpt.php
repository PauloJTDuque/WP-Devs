<?php 

if( !class_exists( 'Duque_Slider_Post_Type') ){
    class Duque_Slider_Post_Type{
        function __construct(){
            add_action( 'init', array( $this, 'create_post_type' ) );
            add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
            add_action( 'save_post', array( $this, 'save_post' ), 10, 2);
            add_filter( 'manage_duque-slider_posts_columns', array( $this, 'duque_slider_cpt_columns'));
            add_action( 'manage_duque-slider_posts_custom_column', array( $this, 'duque_slider_custom_columns' ), 10, 2);
            add_filter( 'manage_edit-duque-slider_sortable_columns', array( $this, 'duque_slider_sortable_columns'));
        }

        public function create_post_type(){
            register_post_type(
                'duque-slider',
                array(
                    'label' => 'Slider',
                    'description'   => 'Sliders',
                    'labels' => array(
                        'name'  => 'Sliders',
                        'singular_name' => 'Slider'
                    ),
                    'public'    => true,
                    'supports'  => array( 'title', 'editor', 'thumbnail' ),
                    'hierarchical'  => false,
                    'show_ui'   => true,
                    'show_in_menu'  => false,
                    'menu_position' => 5,
                    'show_in_admin_bar' => true,
                    'show_in_nav_menus' => true,
                    'can_export'    => true,
                    'has_archive'   => false,
                    'exclude_from_search'   => false,
                    'publicly_queryable'    => true,
                    'show_in_rest'  => true,
                    'menu_icon' => 'dashicons-images-alt2',
                    //'register_meta_box_cb'  =>  array( $this, 'add_meta_boxes' )
                )
            );
        }
        public function duque_slider_cpt_columns( $columns ){
            $columns['duque_slider_link_text'] = esc_html__( 'Link Text', 'duque-slider' );
            $columns['duque_slider_link_url'] = esc_html__( 'Link URL', 'duque-slider' );
            return $columns;
        }

        public function duque_slider_custom_columns( $column, $post_id ){
            switch( $column ){
                case 'duque_slider_link_text':
                    echo esc_html( get_post_meta( $post_id, 'duque_slider_link_text', true) );
                break;    

                case 'duque_slider_link_url':
                    echo esc_url( get_post_meta( $post_id, 'duque_slider_link_url', true) );
                break;                   
            }
        }

        public function duque_slider_sortable_columns( $columns ){
            $columns['duque_slider_link_text'] = 'duque_slider_link_text';
            return $columns;
        }

        public function add_meta_boxes(){
            add_meta_box(
                'duque_slider_meta_box',
                'Link Options',
                array( $this, 'add_inner_meta_boxes' ),
                'duque-slider',
                'normal',
                'high'
            );
        }

        public function add_inner_meta_boxes( $post ){
            require_once(DUQUE_SLIDER_PATH . 'views/duque-slider_metabox.php' );
        }
        public function save_post( $post_id ){
            if ( isset( $_POST['duque_slider_nonce' ] ) ){
                if( ! wp_verify_nonce( $_POST['duque_slider_nonce'], 'duque_slider_nonce' ) ){
                    return;                    
                }
            }
            
            // Verificando se AUTOSAVE est?? Ativo
            if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE){
                return;
            }

            //Verificando se estamos na tela CPT correto
            if( isset( $_POST['post_type']) && $_POST['post_type'] === 'duque-slider' ){
                //User pode editar p??gina do CPT
                if( ! current_user_can( 'edit_page', $post_id ) ){
                    return;
                //User pode editar POST     
                }elseif( ! current_user_can( 'edit_post', $post_id ) ){
                    return;
                }
            }

            if ( isset( $_POST['action'] ) && $_POST['action'] == 'editpost'){
                $old_link_text = get_post_meta( $post_id, 'duque_slider_link_text', true);
                $new_link_text = $_POST['duque_slider_link_text'];
                $old_link_url = get_post_meta( $post_id, 'duque_slider_link_url', true);
                $new_link_url = $_POST['duque_slider_link_url'];

                if( empty( $new_link_text )){
                    update_post_meta( $post_id, 'duque_slider_link_text',  'Add some text'  );
                }else{
                    update_post_meta( $post_id, 'duque_slider_link_text', sanitize_text_field( $new_link_text), $old_link_text  );
                }
                
                if( empty( $new_link_url )){
                    update_post_meta( $post_id, 'duque_slider_link_text',  '#'  );
                }else{
                    update_post_meta( $post_id, 'duque_slider_link_url', sanitize_text_field( $new_link_url), $old_link_url  );
                }
            }
           
        }        
    }
}