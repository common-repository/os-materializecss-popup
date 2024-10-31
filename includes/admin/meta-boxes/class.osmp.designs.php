<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Post types
 *
 * Creating metabox for designs
 *
 * @class 		osmpMetaboxDesigns
 * @version		1.3
 * @category    Class
 * @author 		Offshorent Softwares Pvt Ltd. | Jinesh.P.V 
 */
 
if ( ! class_exists( 'osmpMetaboxDesigns' ) ) :

    class osmpMetaboxDesigns { 

        /**
         * Constructor
         */

        public function __construct() { 

            add_action( 'add_meta_boxes_osmp-popup', array( &$this, 'osmp_type_meta_box' ), 10, 1 );
        }		

        /**
         * callback function for osmp_type_meta_boxe.
         */

        public function osmp_type_meta_box() {
            add_meta_box( 	
                            'display_osmp_type_meta_box',
                            'Designs',
                            array( &$this, 'display_osmp_type_meta_box' ),
                            'osmp-popup',
                            'normal', 
                            'high'
                        );
        }

        /**
         * display function for display_osmp_type_meta_box.
         */

        public function display_osmp_type_meta_box() {

            $post_id = get_the_ID();					

            wp_nonce_field( 'osmp-popup', 'osmp-popup' );
            include_once( 'views/osmp.designs.php' );
        }
    }
endif;

/**
 * Returns the main instance of osmpMetaboxDesigns to prevent the need to use globals.
 *
 * @since  1.3
 * @return osmpMetaboxDesigns
 */
 
return new osmpMetaboxDesigns();
?>