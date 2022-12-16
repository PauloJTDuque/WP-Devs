<?php
    $meta = get_post_meta( $post->ID);
    var_dump( $meta );
?>

<table class="form-table duque-slider-metabox"> 
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
                value="<?php echo $meta['duque_slider_link_text'] [0]; ?>"
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
                value="<?php echo $meta['duque_slider_link_url'] [0]; ?>"
                required
            >
        </td>
    </tr>               
</table>