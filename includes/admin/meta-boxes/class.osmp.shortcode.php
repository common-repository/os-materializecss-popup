<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Post types
 *
 * Creating metabox for shortcode
 *
 * @class 		osmpMetaboxShortcode
 * @version		1.3
 * @category    Class
 * @author 		Offshorent Softwares Pvt Ltd. | Jinesh.P.V 
 */
 
if ( ! class_exists( 'osmpMetaboxShortcode' ) ) :

    class osmpMetaboxShortcode { 

        /**
         * Constructor
         */

        public function __construct() { 

            add_action( 'add_meta_boxes_osmp-popup', array( &$this, 'osmp_shortcode_meta_box' ), 10, 1 );
        }		

        /**
         * callback function for ospt_auto_meta_boxe.
         */

        public function osmp_shortcode_meta_box() {
            add_meta_box( 	
                            'display_osmp_shortcode_meta_box',
                            'Shortcode',
                            array( &$this, 'display_osmp_shortcode_meta_box' ),
                            'osmp-popup',
                            'side', 
                            'high'
                        );
        }

        /**
         * display function for display_osmp_auto_meta_box.
         */

        public function display_osmp_shortcode_meta_box() {

            $post_id = get_the_ID();					

            wp_nonce_field( 'os-html5', OSMP_TEXT_DOMAIN );
            include_once( 'views/osmp.shortcode.php' );
        }
    }
endif;

/**
 * Returns the main instance of osmpMetaboxShortcode to prevent the need to use globals.
 *
 * @since  2.3
 * @return osmpMetaboxShortcode
 */
 
return new osmpMetaboxShortcode();
?>