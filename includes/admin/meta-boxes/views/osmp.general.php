<?php
$pt = new osmpPostTypes();
$settings = '';
$osmp_custom = $pt->osmp_return_slider_custom_meta( $post_id );

if( !empty( $osmp_custom ) )
$general = $osmp_custom['general']; 
?>
<div id="ospt-general-wrapper">
    <div class="osmp-row-box">
        <label for="btn-txt"><?php _e( 'Button Text', OSMP_TEXT_DOMAIN ); ?></label>
        <input type="text" name="osmp[general][btn-txt]" value="<?php echo isset( $general['btn-txt'] ) ? $general['btn-txt'] : 'Submit'; ?>" />
    </div>    
    <div class="osmp-row-box last">
        <label for="position"><?php _e( 'Button Position', OSMP_TEXT_DOMAIN ); ?></label>
        <?php _e( 'Top: ', OSMP_TEXT_DOMAIN ); ?><input type="text" name="osmp[general][top]" value="<?php echo isset( $general['top'] ) ? $general['top'] : ''; ?>" class="small" />    
        <?php _e( 'Right: ', OSMP_TEXT_DOMAIN ); ?><input type="text" name="osmp[general][right]" value="<?php echo isset( $general['right'] ) ? $general['right'] : ''; ?>" class="small" />    
        <?php _e( 'Bottom: ', OSMP_TEXT_DOMAIN ); ?><input type="text" name="osmp[general][bottom]" value="<?php echo isset( $general['bottom'] ) ? $general['bottom'] : '0px'; ?>" class="small" />    
        <?php _e( 'Left: ', OSMP_TEXT_DOMAIN ); ?><input type="text" name="osmp[general][left]" value="<?php echo isset( $general['left'] ) ? $general['left'] : '45%'; ?>" class="small" />    
    </div>
    <div class="osmp-row">
        <label for="custom-css"><?php _e( 'Custom CSS', OSMP_TEXT_DOMAIN ); ?></label>
        <textarea name="osmp[general][custom-css]"><?php echo isset( $general['custom-css'] ) ? $general['custom-css'] : ''; ?></textarea>
    </div>
    <div class="clear"></div>
</div>                                                                                    