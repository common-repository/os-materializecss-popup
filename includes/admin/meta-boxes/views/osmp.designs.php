<?php
$pt = new osmpPostTypes();
$settings = '';
$osmp_custom = $pt->osmp_return_slider_custom_meta( $post_id );

if( !empty( $osmp_custom ) )
$design = $osmp_custom['design']; 
?>
<div id="osmp-design-wrapper">
    <ul>
        <li<?php echo ( 'design-1' == $design['design'] ) ? ' class="active"' : '';?>><a href="javascript:;" class="osmp_design" id="design-1"><img src="<?php echo OSMP_PLUGIN_URL;?>/images/design-1.jpg" width="165" alt="Design 1"></a></li>
        <li<?php echo ( 'design-2' == $design['design'] ) ? ' class="active"' : '';?>><a href="javascript:;" class="osmp_design" id="design-2"><img src="<?php echo OSMP_PLUGIN_URL;?>/images/design-2.jpg" width="165" alt="Design 2"></a></li>
        <li<?php echo ( 'design-3' == $design['design'] ) ? ' class="active"' : '';?>><a href="javascript:;" class="osmp_design" id="design-3"><img src="<?php echo OSMP_PLUGIN_URL;?>/images/design-3.jpg" width="165" alt="Design 3"></a></li>
        <li<?php echo ( 'design-4' == $design['design'] ) ? ' class="active"' : '';?>><a href="javascript:;" class="osmp_design" id="design-4"><img src="<?php echo OSMP_PLUGIN_URL;?>/images/design-4.jpg" width="165" alt="Design 4"></a></li>
    </ul>
    <input type="hidden" name="osmp[design][design]" id="osmp_design" value="<?php echo $design['design'];?>" />
    <div class="clear"></div>
    <div class="osmp-design-wrap"<?php echo ( 'design-1' == $design['design'] || 'design-2' == $design['design'] ) ? 'style="display: block;"' : 'style="display: none;"' ;?>>
        <div class="osmp-row">
            <label for="popup-heading">Popup Heading</label>
            <input type="text" value='<?php echo ( !empty( $design['popup-heading'] ) ) ? $design['popup-heading'] : '' ;?>' name="osmp[design][popup-heading]">
            <em>This is the OS popup heading text.</em>
        </div>
        <div class="clear"></div>
        <div class="osmp-row-box">
            <label for="offer-txt">Offer Text</label>
            <textarea name="osmp[design][offer-txt]"><?php echo ( !empty( $design['offer-txt'] ) ) ? $design['offer-txt'] : '' ;?></textarea>
            <em>This is the OS popup offer text. You can use html, text etc.</em>
        </div>
        <div class="osmp-row-box last">
            <label for="offer-subtxt">Offer Sub Text</label>
            <textarea name="osmp[design][offer-subtxt]"><?php echo ( !empty( $design['offer-subtxt'] ) ) ? $design['offer-subtxt'] : '' ;?></textarea>
            <em>This text display under offer text. You can use html, text etc.</em>
        </div>
        <div class="clear"></div>
        <div class="osmp-row-box">
            <label for="form-shortcode">Form Shortcode</label>
            <input type="text" value='<?php echo ( !empty( $design['form-shortcode'] ) ) ? $design['form-shortcode'] : '' ;?>' name="osmp[design][form-shortcode]">
            <em>This is the OS popup form shortcode. You can use Contact form 7, Gravity form or any other wordpress forms shortcode here.</em>
        </div>
        <div class="osmp-row-box last">
            <label for="shortcode-subtxt">Shortcode Sub Text</label>
            <input type="text" value='<?php echo ( !empty( $design['shortcode-subtxt'] ) ) ? $design['shortcode-subtxt'] : '' ;?>' name="osmp[design][shortcode-subtxt]">
            <em>This text display under shortcode form area. You can use html, text etc.</em>
        </div>
        <div class="clear"></div>
        <div class="osmp-row">
            <label for="footer-text">Footer Text</label>
            <textarea name="osmp[design][footer-text]"><?php echo ( !empty( $design['footer-text'] ) ) ? $design['footer-text'] : '' ;?></textarea>
            <em>This is the OS popup offer text. You can use html, text etc.</em>
        </div>
        <div class="clear"></div>
    </div>
    <div class="osmp-design-wrap-new"<?php echo ( 'design-3' == $design['design'] || 'design-4' == $design['design'] ) ? 'style="display: block;"' : 'style="display: none;"' ;?>>
        <div class="osmp-row-box">
            <label for="popup-heading">Popup Heading</label>
            <input type="text" value='<?php echo ( !empty( $design['popup-heading'] ) ) ? $design['popup-heading'] : '' ;?>' name="osmp[design][popup-heading]">
            <em>This is the OS popup heading text.</em>
        </div>
        <div class="osmp-row-box last">
            <label for="form-shortcode">Form Shortcode</label>
            <input type="text" value='<?php echo ( !empty( $design['form-shortcode'] ) ) ? $design['form-shortcode'] : '' ;?>' name="osmp[design][form-shortcode]">
            <em>This is the OS popup form shortcode. You can use Contact form 7, Gravity form or any other wordpress forms shortcode here.</em>
        </div>
        <div class="clear"></div>
        <div class="osmp-row">
            <label for="popup-txt">Popup Text</label>
            <textarea name="osmp[design][popup-txt]"><?php echo ( !empty( $design['popup-txt'] ) ) ? $design['popup-txt'] : '' ;?></textarea>
            <em>This is the OS popup text. You can use html, text etc.</em>
        </div>
        <div class="clear"></div>
    </div>
</div>                                                                                    