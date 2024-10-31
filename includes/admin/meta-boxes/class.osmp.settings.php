<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Post types
 *
 * Creating metabox for settings
 *
 * @class 		osmpMetaboxSettings
 * @version		1.3
 * @category    Class
 * @author 		Offshorent Softwares Pvt Ltd. | Jinesh.P.V 
 */
 
if ( ! class_exists( 'osmpMetaboxSettings' ) ) :

    class osmpMetaboxSettings { 

        /**
         * Constructor
         */

        public function __construct() { 

            add_action( 'add_meta_boxes_osmp-popup', array( &$this, 'osmp_settings_meta_box' ), 10, 1 );
        }		

        /**
         * callback function for osmp_auto_meta_boxe.
         */

        public function osmp_settings_meta_box() {
            add_meta_box( 	
                            'display_osmp_settings_meta_box',
                            'Display Settings',
                            array( &$this, 'display_osmp_settings_meta_box' ),
                            'osmp-popup',
                            'side', 
                            'low'
                        );
        }

        /**
         * display function for display_osmp_auto_meta_box.
         */

        public function display_osmp_settings_meta_box() {

            $post_id = get_the_ID();					

            wp_nonce_field( 'osmp-popup', 'osmp-popup' );
            include_once( 'views/osmp.settings.php' );
        }
    }
endif;

/**
 * Returns the main instance of osmpMetaboxSettings to prevent the need to use globals.
 *
 * @since  2.3
 * @return osmpMetaboxSettings
 */
 
return new osmpMetaboxSettings();
?>