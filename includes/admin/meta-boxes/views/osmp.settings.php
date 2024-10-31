<?php 
$pt = new osmpPostTypes();
?>
<div id="osmp-settings-wrapper">   
    <div class="osmp-row-box">
        <label for="body-font-size"><?php _e( 'Body Font Size', OSPT_TEXT_DOMAIN ); ?></label>
        <input type="text" name="osmp[settings][body-font-size]" value="<?php echo $pt->osmp_get_the_value( $post_id, 'settings', 'body-font-size', '14px' ); ?>" />
    </div>
     <div class="osmp-row-box last">
        <label for="heading-font-size"><?php _e( 'Heading Font Size', OSPT_TEXT_DOMAIN ); ?></label>
        <input type="text" name="osmp[settings][heading-font-size]" value="<?php echo $pt->osmp_get_the_value( $post_id, 'settings', 'heading-font-size', '16px' ); ?>" />
    </div>
     <div class="osmp-row-box">
        <label for="offer-font-size"><?php _e( 'Offer Text Font Size', OSPT_TEXT_DOMAIN ); ?></label>
        <input type="text" name="osmp[settings][offer-font-size]" value="<?php echo $pt->osmp_get_the_value( $post_id, 'settings', 'offer-font-size', '72px' ); ?>" />
    </div>     
    <div class="osmp-row-box last">
        <label for="button-font-size"><?php _e( 'Button Font Size', OSPT_TEXT_DOMAIN ); ?></label>
        <input type="text" name="osmp[settings][button-font-size]" value="<?php echo $pt->osmp_get_the_value( $post_id, 'settings', 'button-font-size', '20px' ); ?>" />
    </div>
    <h3>Color Settings</h3>
    <div class="osmp-row">
        <label for="bg-color"><?php _e( 'Background Color', OSPT_TEXT_DOMAIN ); ?></label>
        <input type="text" name="osmp[settings][bg-color]" class="button-color" value="<?php echo $pt->osmp_get_the_value( $post_id, 'settings', 'bg-color', '#801638' ); ?>" />
    </div>
    <div class="osmp-row">
        <label for="heading-font-color"><?php _e( 'Heading Font Color', OSPT_TEXT_DOMAIN ); ?></label>
        <input type="text" name="osmp[settings][heading-font-color]" class="button-color" value="<?php echo $pt->osmp_get_the_value( $post_id, 'settings', 'heading-font-color', '#ffb8cf' ); ?>" />
    </div>
    <div class="osmp-row">
        <label for="offer-font-color"><?php _e( 'Offer Text Font Color', OSPT_TEXT_DOMAIN ); ?></label>
        <input type="text" name="osmp[settings][offer-font-color]" class="button-color" value="<?php echo $pt->osmp_get_the_value( $post_id, 'settings', 'offer-font-color', '#ffffff' ); ?>" />
    </div>
    <div class="osmp-row">
        <label for="button-font-color"><?php _e( 'Button Font Color', OSPT_TEXT_DOMAIN ); ?></label>
        <input type="text" name="osmp[settings][button-font-color]" class="button-color" value="<?php echo $pt->osmp_get_the_value( $post_id, 'settings', 'button-font-color', '#ffffff' ); ?>" />
    </div>
    <div class="osmp-row">
        <label for="button-color"><?php _e( 'Button Color', OSPT_TEXT_DOMAIN ); ?></label>
        <input type="text" name="osmp[settings][button-color]" class="button-color" value="<?php echo $pt->osmp_get_the_value( $post_id, 'settings', 'button-color', '#FDB632' ); ?>" />
    </div>
    <div class="clear"></div>
</div>  