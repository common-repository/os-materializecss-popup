<?php
/*
Plugin Name: OS Materializecss PopUp
Plugin URI: http://offshorent.com/blog/extensions/os-materializecss-popup
Description: OS Materializecss PopUp is the colorful, responsive, customizable popup plugin for WordPress using materialize css.
Version: 1.3
Author: Offshorent Softwares Pvt Ltd. | Jinesh.P.V 
Author URI: http://offshorent.com/
License: GPL2
/*  Copyright 2015-2016  OS HTML5 Shortcodes - Offshorent Softwares Pvt Ltd  ( email: jinesh@offshorent.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 	  

if ( ! class_exists( 'osmpPopUp' ) ) :
    
    /**
    * Main osmpPopUp Class
    *
    * @class osmpPopUp
    * @version	1.3
    */

    final class osmpPopUp {

    	/**
		* @var string
		* @since	1.3
		*/
		 
		public $version = '1.3';
		
		/**
		* @var osmpPopUp The single instance of the class
		* @since 1.3
		*/
		
		protected static $_instance = null;

		/**
		* Main osmpPopUp Instance
		*
		* Ensures only one instance of osmpPopUp is loaded or can be loaded.
		*
		* @since 1.3
		* @static
		* @see OSBX()
		* @return osmpPopUp - Main instance
		*/
		 
		public static function init_instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
		}

		/**
		* Cloning is forbidden.
		*
		* @since 1.3
		*/

		public function __clone() {
            _doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '1.3' );
		}

		/**
		* Unserializing instances of this class is forbidden.
		*
		* @since 1.3
		*/
		 
		public function __wakeup() {
            _doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '1.3' );
		}
	        
		/**
		* Get the plugin url.
		*
		* @since 1.3
		*/

		public function plugin_url() {
            return untrailingslashit( plugins_url( '/', __FILE__ ) );
		}

		/**
		* Get the plugin path.
		*
		* @since 1.3
		*/

		public function plugin_path() {
            return untrailingslashit( plugin_dir_path( __FILE__ ) );
		}

		/**
		* Get Ajax URL.
		*
		* @since 1.3
		*/

		public function ajax_url() {
            return admin_url( 'admin-ajax.php', 'relative' );
		}
	        
		/**
		* osmpPopUp Constructor.
		* @access public
		* @return osmpPopUp
		* @since 1.3
		*/
		 
		public function __construct() {
			
            register_activation_hook( __FILE__, array( &$this, 'osmp_install' ) );
			
            // Define constants
            self::osmp_constants();

            // Include required files
            self::osmp_admin_includes();

            // Action Hooks
            add_action( 'init', array( $this, 'osmp_init' ), 0 );
            add_action( 'admin_init', array( $this, 'osmp_admin_init' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'osmp_frontend_styles_scrips' ) );
		
            // Shortcode Hooks
            add_shortcode( 'osmp-materializecss-popup', array( $this, 'osmp_materializecss_popup' ) );

            //Filter Hook
            add_filter( 'widget_text', 'do_shortcode', 11 );
            add_filter( 'body_class', array( $this, 'osmp_body_class_name' ), 1 );
		}
	        
		/**
		* Install osmpPopUp
		* @since 1.3
		*/
		 
		public function osmp_install (){
			
            // Flush rules after install
            flush_rewrite_rules();

            // Redirect to welcome screen
            set_transient( '_osmp_activation_redirect', 1, 60 * 60 );
		}
	        
		/**
		* Define osmpPopUp Constants
		* @since 1.3
		*/
		 
		private function osmp_constants() {
			
			define( 'OSMP_PLUGIN_FILE', __FILE__ );
			define( 'OSMP_PLUGIN_BASENAME', plugin_basename( dirname( __FILE__ ) ) );
			define( 'OSMP_PLUGIN_URL', plugins_url() . '/' . OSMP_PLUGIN_BASENAME );
			define( 'OSMP_TEXT_DOMAIN', 'osmp-shortcodes' );		
		}
	        
		/**
		* includes admin defaults files
		*
		* @since 1.3
		*/
		 
		private function osmp_admin_includes() { 
			
            include_once( 'includes/admin/osmp-about.php' );
            include_once( 'includes/admin/osmp-widget.php' );
            include_once( 'includes/admin/osmp-post-types.php' );
		}
	        
		/**
		* Init osmpPopUp when WordPress Initialises.
		* @since 1.3
		*/
		 
		public function osmp_init() {
	            
            self::osmp_do_output_buffer();
		}
	        
		/**
		* Clean all output buffers
		*
		* @since  1.3
		*/
		 
		public function osmp_do_output_buffer() {
	            
            ob_start( array( &$this, "osmp_do_output_buffer_callback" ) );
		}

		/**
		* Callback function
		*
		* @since  1.3
		*/
		 
		public function osmp_do_output_buffer_callback( $buffer ){
            return $buffer;
		}
		
		/**
		* Clean all output buffers
		*
		* @since  1.3
		*/
		 
		public function osmp_flush_ob_end(){
            ob_end_flush();
		}
	        
		/**
		* Admin init osmpPopUp when WordPress Initialises.
		* @since  1.3
		*/
		 
		public function osmp_admin_init() {
				
            self::osmp_admin_styles_scrips();
		}
	    
	    /**
		 * Add new class for body tag.
		 *
		 * @return string
		 */
		public function osmp_body_class_name( $classes ) {

	        $classes[] = 'osmp-model-popup';

			return $classes;
		}

		/**
		* Admin side style and javascript hook for osmpPopUp
		*
		* @since  1.3
		*/
		 
		public function osmp_admin_styles_scrips() {
			
			// Add the color picker css file       
        	wp_enqueue_style( 'wp-color-picker' );        
			wp_enqueue_style( 'osmp-admin-style', plugins_url( 'css/admin/style-min.css', __FILE__ ) );

			wp_enqueue_script( 'osmp-custom-min', plugins_url( 'js/admin/custom-min.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '1.3', true );
		}

		/**
		* Frontend style and javascript hook for osmpPopUp
		*
		* @since  1.3
		*/
		 
		public function osmp_frontend_styles_scrips( $post_id ) {
			
			wp_enqueue_style( 'osmp-style', plugins_url( 'css/style.min.css', __FILE__ ) );		
			wp_enqueue_script( 'osmp-jquery', 'https://code.jquery.com/jquery-2.1.1.min.js', array( 'jquery' ), '2.1.1', true );
			wp_enqueue_script( 'osmp-materialize', plugins_url( 'js/materialize.min.js', __FILE__ ), array( 'jquery' ), '0.97.3', true );
			wp_enqueue_script( 'osmp-custom-min', plugins_url( 'js/custom-min.js', __FILE__ ), array( 'jquery' ), '1.3', true );
		}

		/**
		* Shortcode function osmp_materializecss_popup()
		*
		* @since  1.3
		*/

		public function osmp_materializecss_popup( $atts, $content = null, $code = '' ) {

			ob_start();

			// Extract os-materializecss-popup shortcode

			$atts = shortcode_atts(
					array(
						'id' => '2',
						'design' => 'design-1'
					), $atts );
			$post_id = $atts['id'];
			$design = $atts['design'];

			if ( '' === locate_template( dirname( __FILE__ ) . '/includes/templates/osmp.' . $design . '.php', true, false ) )
				include( dirname( __FILE__ ) . '/includes/templates/osmp.' . $design . '.php' );

			return ob_get_contents();
		}
	}   
endif;

/**
 * Returns the main instance of osmpPopUp to prevent the need to use globals.
 *
 * @since  1.3
 * @return osmpPopUp
 */
 
return new osmpPopUp;
?>