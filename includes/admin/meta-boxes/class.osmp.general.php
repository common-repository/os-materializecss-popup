<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Post types
 *
 * Creating metabox for general settings
 *
 * @class 		osmpMetaboxGeneral
 * @version		1.3
 * @category    Class
 * @author 		Offshorent Softwares Pvt Ltd. | Jinesh.P.V 
 */
 
if ( ! class_exists( 'osmpMetaboxGeneral' ) ) :

    class osmpMetaboxGeneral { 

        /**
         * Constructor
         */

        public function __construct() { 

            add_action( 'add_meta_boxes_osmp-popup', array( &$this, 'osmp_design_meta_box' ), 10, 1 );
        }		

        /**
         * callback function for osmp_design_meta_boxe.
         */

        public function osmp_design_meta_box() {
            add_meta_box( 	
                            'display_osmp_design_meta_box',
                            'General Settings',
                            array( &$this, 'display_osmp_design_meta_box' ),
                            'osmp-popup',
                            'normal', 
                            'high'
                        );
        }

        /**
         * display function for display_osmp_design_meta_box.
         */

        public function display_osmp_design_meta_box() {

            $post_id = get_the_ID();					

            wp_nonce_field( 'osmp-popup', 'osmp-popup' );
            include_once( 'views/osmp.general.php' );
        }
    }
endif;

/**
 * Returns the main instance of osmpMetaboxGeneral to prevent the need to use globals.
 *
 * @since  1.3
 * @return osmpMetaboxGeneral
 */
 
return new osmpMetaboxGeneral();
?>