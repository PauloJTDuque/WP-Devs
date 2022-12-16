<?php
    $meta = get_post_meta( $post->ID);
    $link_text = get_post_meta( $post->ID, 'duque_slider_link_text', true );
    $link_url = get_post_meta( $post->ID, 'duque_slider_link_url', true );
    //var_dump( $meta );
?>

<table class="form-table duque-slider-metabox"> 
<input type="hidden" name="duque_slider_nonce" value="<?php echo wp_create_nonce( "duque_slider_nonce"); ?>">    
    <tr>
        <th>
            <label for="duque_slider_link_text">Link Text</label>
        </th>
        <td>
            <input 
                type="text" 
                name="duque_slider_link_text" 
                id="duque_slider_link_text" 
                class="regular-text link-text"
                value="<?php echo ( isset( $link_text ) ) ? esc_html( $link_text ) : ''; ?>"
                required
                >
            </td>
        </tr>
        <tr>
            <th>
                <label for="duque_slider_link_url">Link URL</label>
            </th>
            <td>
                <input 
                type="url" 
                name="duque_slider_link_url" 
                id="duque_slider_link_url" 
                class="regular-text link-url"
                value="<?php echo ( isset( $link_url ) ) ? esc_url( $link_url ) : ''; ?>"
                required
            >
        </td>
    </tr>               
</table>