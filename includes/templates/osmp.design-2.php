<?php 
/*
* OS Materializecss Popup Design 2
* Offshorent Softwares Pvt. Ltd. | Jinesh.P.V
*/
$pt = new osmpPostTypes();
echo $button_color = $pt->osmp_get_the_value( $post_id, 'settings', 'button-color', '' );
$button_font_color = $pt->osmp_get_the_value( $post_id, 'settings', 'button-font-color', '' );
$button_font_size = $pt->osmp_get_the_value( $post_id, 'settings', 'button-font-size', '' );
$body_font_size = $pt->osmp_get_the_value( $post_id, 'settings', 'body-font-size', '' );
$heading_font_size = $pt->osmp_get_the_value( $post_id, 'settings', 'heading-font-size', '' );
$offer_font_size = $pt->osmp_get_the_value( $post_id, 'settings', 'offer-font-size', '' );
$heading_font_color = $pt->osmp_get_the_value( $post_id, 'settings', 'heading-font-color', '' );
$bg_color = $pt->osmp_get_the_value( $post_id, 'settings', 'bg-color', '' );
$offer_font_color = $pt->osmp_get_the_value( $post_id, 'settings', 'offer-font-color', '' );

$left = $pt->osmp_get_the_value( $post_id, 'general', 'left', '' );
$right = $pt->osmp_get_the_value( $post_id, 'general', 'right', '' );
$bottom = $pt->osmp_get_the_value( $post_id, 'general', 'bottom', '' );
$top = $pt->osmp_get_the_value( $post_id, 'general', 'top', '' );
$back_custom_css = $pt->osmp_get_the_value( $post_id, 'general', 'custom-css', '' );
$btn_txt = $pt->osmp_get_the_value( $post_id, 'general', 'btn-txt', '' );

$popup_heading = $pt->osmp_get_the_value( $post_id, 'design', 'popup-heading', '' );
$offer_txt = $pt->osmp_get_the_value( $post_id, 'design', 'offer-txt', '' );
$offer_subtxt = $pt->osmp_get_the_value( $post_id, 'design', 'offer-subtxt', '' );
$form_shortcode = $pt->osmp_get_the_value( $post_id, 'design', 'form-shortcode', '' );
$shortcode_subtxt = $pt->osmp_get_the_value( $post_id, 'design', 'shortcode-subtxt', '' );
$footer_text = $pt->osmp_get_the_value( $post_id, 'design', 'footer-text', '' );

$custom_css =  ".osmp-model-popup .osmp-modal-btn {
					background-color: {$button_color};
					color: {$button_font_color};
					font-size: {$button_font_size};
					line-height: {$button_font_size};
					position: fixed;";
if( !empty( $top ) )
	$custom_css .=  "top: {$top};";
if( !empty( $bottom ) )
	$custom_css .=  "bottom: {$bottom};";
if( !empty( $left ) )	
	$custom_css .=  "left: {$left};";
if( !empty( $right ) )
	$custom_css .=  "right: {$right};";
$custom_css .=  "}
				.osmp-model-popup .osmp-modal, .osmp-model-popup .osmp-modal p {
					font-size: {$body_font_size};
				}
				.osmp-model-popup .osmp-modal h4 {
					margin-bottom: 15px;
					font-size: {$heading_font_size};
					color: {$heading_font_color};
				}
				.osmp-model-popup .modal .osmp-left{
					background-color: {$bg_color};
				}
				.osmp-modal { font-size: {$body_font_size}; }
				.osmp-modal h1 { 
					font-size: {$offer_font_size}; 
					color: {$offer_font_color};
				}
				.osmp-modal span, .osmp-modal a, .osmp-model-popup .modal.design-2 .osmp-left span { 
					color: {$heading_font_color}; 
					font-size: {$heading_font_size};
				}
				.osmp-model-popup .modal.design-2 form input[type=\"submit\"],
				.osmp-model-popup .modal.design-2 form input[type=\"button\"] {
					background-color: {$button_color};
					color: {$button_font_color};
					font-size: {$button_font_size};
					line-height: {$button_font_size};
				}";
$custom_css = $custom_css . $back_custom_css;
?>
<style type="text/css">
<?php echo $custom_css;?>
</style>
<a class="waves-effect waves-light btn modal-trigger osmp-modal-btn" href="#osmp-modal-<?php echo $post_id;?>">
	<?php echo $btn_txt;?>
</a>
<div id="osmp-modal-<?php echo $post_id;?>" class="modal osmp-modal <?php echo $design;?>">
	<div class="modal-content">
		<div class="osmp-left"><div class="osmp-box"><?php if( $offer_txt ) {?><?php echo $offer_txt; ?><?php } ?></div></div>
		<div class="osmp-right">
			<?php if( $popup_heading ) { ?><span><?php echo $popup_heading; ?></span><?php } ?>		
			<?php if( $offer_subtxt ) {?><small><?php echo $offer_subtxt; ?></small><?php } ?>
			<div class="osmp-form"><?php if( $form_shortcode ) {?><?php echo do_shortcode( $form_shortcode ); ?><?php } ?></div>
			<?php if( $shortcode_subtxt ) {?><?php echo $shortcode_subtxt; ?><?php } ?>
			<?php if( $footer_text ) {?><em><?php echo $footer_text; ?></em><?php } ?>
		</div>
		<div class="clear"></div>
	</div>
</div>