<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Post types
 *
 * Registers post types and taxonomies
 *
 * @class       osmpPostTypes
 * @version     1.3
 * @category    Class
 * @author      Offshorent Softwares Pvt Ltd. | Jinesh.P.V 
 */
 
if ( ! class_exists( 'osmpPostTypes' ) ) :
    
    class osmpPostTypes {
        
        /**
         * Constructor
         */

        public function __construct() {

            add_action( 'init', array( &$this, 'register_osmp_post_types' ) );
            add_filter( 'manage_edit-osmp-popup_columns', array( &$this, 'osmp_edit_columns' ), 10, 2 );
            add_action( 'manage_osmp-popup_posts_custom_column', array( &$this, 'osmp_custom_column' ), 10, 2 );
            add_action( 'save_post', array( &$this, 'osmp_save_meta_values' ) );
        }

        /**
         * Register oshtml5 post types.
         */

        public static function register_osmp_post_types() {
            
            self::osmp_includes();

            if ( post_type_exists( 'osmp-popup' ) )
                return;

            $label              =   'OS PopUp';
            $labels = array(
                'name'                  =>  _x( $label, 'post type general name' ),
                'singular_name'        =>   _x( $label, 'post type singular name' ),
                'add_new'               =>  _x( 'Add New', OSMP_TEXT_DOMAIN ),
                'add_new_item'          =>  __( 'Add New OS PopUp', OSMP_TEXT_DOMAIN ),
                'edit_item'             =>  __( 'Edit OS PopUp', OSMP_TEXT_DOMAIN),
                'new_item'              =>  __( 'New OS PopUp' , OSMP_TEXT_DOMAIN ),
                'view_item'             =>  __( 'View OS PopUp', OSMP_TEXT_DOMAIN ),
                'search_items'          =>  __( 'Search ' . $label ),
                'not_found'             =>  __( 'Nothing found' ),
                'not_found_in_trash'    =>  __( 'Nothing found in Trash' ),
                'parent_item_colon'     =>  ''
            );

            register_post_type( 'osmp-popup', 
                apply_filters( 'osmp_register_post_types',
                    array(
                            'labels'                 => $labels,
                            'public'                 => true,
                            'publicly_queryable'     => true,
                            'show_ui'                => true,
                            'exclude_from_search'    => true,
                            'query_var'              => true,
                            'has_archive'            => false,
                            'hierarchical'           => true,
                            'menu_position'          => 20,
                            'show_in_nav_menus'      => true,
                            'supports'               => array( 'title' ),
							'menu_icon'				 => 'dashicons-megaphone'
                        )
                )
            );                              
        }
        
        /**
         * Includes the metabox classes and views
         */
        
        public static function osmp_includes() {
            
            include_once( 'meta-boxes/class.osmp.shortcode.php' );
            include_once( 'meta-boxes/class.osmp.designs.php' );
            include_once( 'meta-boxes/class.osmp.settings.php' );
            include_once( 'meta-boxes/class.osmp.general.php' );
        }

        /**
         * oshtml5 slider edit columns.
         */

        public function osmp_edit_columns() {

            $columns = array(
                'cb'                          =>    '<input type="checkbox" />',
                'title'                       =>    'Title',
                'osmp-shortcode'        	  =>    'Shortcode',
                'date'                        =>    'Date'
            );

            return $columns;
        }

        /**
         * display oshtml5 slider custom columns.
         */

        public function osmp_custom_column( $column, $post_id ) {
			
           switch ( $column ) {
                case 'osmp-shortcode':
                    if ( !empty( $post_id ) )
                        echo self::osmp_shortcode_creator( $post_id );
                    break;
            }
        }

       /**
        * oshtml5 shortcode creation
        */

        public function osmp_shortcode_creator( $post_id ) {
			
            $osmp_custom = self::osmp_return_slider_custom_meta( $post_id );
            $design = $osmp_custom['design']['design'];
            $shortcode = '[osmp-materializecss-popup id="' . $post_id . '" design="' . $design . '"]';
			
            return '<input type="text" readonly="readonly" id="shortcode_' . $post_id . '" class="shortcode" value="' . esc_attr( $shortcode ) . 
            '">';
        }

        /**
        * storing meta fields function for ospt_save_slider_values.
        */

        public function osmp_save_meta_values( $post_id ) {

            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
                return;

            if ( ! empty( $_POST['post_type'] ) && 'osmp-popup' == $_POST['post_type'] ) {
                if ( ! current_user_can( 'edit_page', $post_id ) )
                    return;
            } else {
                if ( ! current_user_can( 'edit_post', $post_id ) )
                return;
            }

            if ( ! empty( $_POST['osmp'] ) ) {           
                update_post_meta( $post_id, 'osmp_custom_meta', maybe_unserialize( $_POST['osmp'] ) );
            }
        }

        /**
        * return slider custom meta values.
        */

        public function osmp_return_slider_custom_meta( $post_id ) {

            return $osmp = maybe_unserialize( get_post_meta( $post_id, 'osmp_custom_meta', true ) );
        }
        
       /**
        * return slider custom meta values.
        */

        public function osmp_get_the_value( $post_id, $type, $field, $default ) {

            $osmp = maybe_unserialize( get_post_meta( $post_id, 'osmp_custom_meta', true ) );
            $osmp_values = !empty( $osmp ) ? $osmp[$type] : '';
            
            return $return = !empty( $osmp_values[$field] ) ? $osmp_values[$field] : $default;
        }
    }
endif;

/**
 * Returns the main instance of osmpPostTypes to prevent the need to use globals.
 *
 * @since  1.3
 * @return osmpPostTypes
 */
 
return new osmpPostTypes();
?>