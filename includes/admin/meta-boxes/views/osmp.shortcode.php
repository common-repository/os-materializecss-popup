<?php 
$pt = new osmpPostTypes();
$osmp_custom = $pt->osmp_return_slider_custom_meta( $post_id );
$design = !empty( $osmp_custom ) ? $osmp_custom['design']['design'] : '';

if( !empty( $post_id ) && !empty( $design ) ) {
    $shortcode = '[osmp-materializecss-popup id="' . $post_id . '" design="' . $design . '"]';
    $shortcode_function = '<?php echo do_shortcode( [osmp-materializecss-popup id="' . $post_id . '" design="' . $design . '"] );?>';
} else {
    $shortcode = '';
    $shortcode_function = '';
}
?>
<div id="osmp-shortcode-wrapper">
	<p><b>Shortcode: </b></p>
    <div class="option-box" style="margin: 15px 0 0 0; border-bottom: none;">
        <input type="text" readonly="readonly" id="shortcode_<?php echo $post_id;?>" class="shortcode" value="<?php echo esc_attr( $shortcode ); ?>">         
    </div>
    <em>Copy and paste this shortcode into your post, page or custom post types etc.</em>
	<p><b>Template Code: </b></p>
    <div class="option-box" style="margin: 15px 0 0 0; border-bottom: none;">
        <input type="text" readonly="readonly" id="shortcode_function_<?php echo $post_id;?>" class="shortcode" value="<?php echo esc_attr( $shortcode_function ); ?>">      
    </div>
    <em>Copy and paste this function into your page templates like header.php, front-page.php, etc.</em>    
    <div class="clear"></div>
</div>