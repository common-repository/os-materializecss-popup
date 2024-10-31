<?php 
/*
* OS Materializecss Popup Design 3
* Offshorent Softwares Pvt. Ltd. | Jinesh.P.V
*/
$pt = new osmpPostTypes();
$button_color = $pt->osmp_get_the_value( $post_id, 'settings', 'button-color', '' );
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
$popup_txt = $pt->osmp_get_the_value( $post_id, 'design', 'popup-txt', '' );
$form_shortcode = $pt->osmp_get_the_value( $post_id, 'design', 'form-shortcode', '' );

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
				.osmp-model-popup .osmp-modal h3 {
					margin-bottom: 15px;
					font-size: {$heading_font_size};
					color: {$heading_font_color};
				}
				.osmp-modal { font-size: {$body_font_size}; background-color: {$bg_color}; }
				.osmp-modal span, .osmp-modal a { 
					color: {$heading_font_color}; 
					font-size: {$heading_font_size};
				}
				.osmp-model-popup .modal.design-3 .modal-content {
					color: {$offer_font_color}; 
				}
				.osmp-model-popup .modal.design-3 .modal-content .osmp-form form input[type=\"submit\"],
				.osmp-model-popup .modal.design-3 .modal-content .osmp-form form input[type=\"button\"] {
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
		<div class="osmp-form">
			<?php if( $popup_heading ) { ?><h3><?php echo $popup_heading; ?></h3><?php } ?>		
			<?php if( $popup_txt ) {?><p><?php echo $popup_txt; ?></p><?php } ?>
			<?php if( $form_shortcode ) {?><?php echo do_shortcode( $form_shortcode ); ?><?php } ?>
		</div>
		<div class="clear"></div>
	</div>
</div>