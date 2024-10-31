<?php
class osmpWidget extends WP_Widget {
 
 
	public function __construct() {

		$widget_ops			=	array( 'classname' => 'osmp_widget', 'description' => __( 'Add popup using OS Materializecss PopUp WP Widget', osmp_TEXT_DOMAIN) );
		$control_ops		=	array( 'id_base' => 'osmp_widget' );
		$this->WP_Widget( 'osmp_widget', __( 'OS Materializecss PopUp', OSMP_TEXT_DOMAIN ), $widget_ops, $control_ops );
	}
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget( $args, $instance ) {	
	
        extract( $args );
        global $wpdb;
		
        $title 		= apply_filters( 'widget_title', $instance['title'] );
		$post_id = !empty( $instance['message'] ) ? $instance['message'] : '';

        echo $before_widget;
        if ( $title )
        echo $before_title . $title . $after_title;
		$osmp_content = get_post( $post_id ) ;
		
		if( !empty( $osmp_content->post_content ) ) {
			echo do_shortcode( $osmp_content->post_content );
		} else {
			echo '';
		}
							
        echo $after_widget;
        
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update( $new_instance, $old_instance ) {		
	
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form( $instance ) {	
	
    	$shortcodes = query_posts( array( 'post_type' => 'osmp-popup', 'showposts' => -1 ) );
    	
    	
    	if( isset( $instance['title'] ) ){
    		$title	= esc_attr( $instance['title'] );
    	} else {
    		$title = '';
    	}
    	
    	if( isset( $instance['message'] ) ){
    		$message	= esc_attr( $instance['message'] );
    	} else {
    		$message = '';
    	}
    	
        ?>
         <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id( 'message' ); ?>"><?php _e( 'Choose Shortcode :' ); ?></label> 
          
          <select name="<?php echo $this->get_field_name( 'message' ); ?>">
          <?php 
			if( count( $shortcodes ) > 0 ) {
				$count = 1;
				$class = '';
				foreach( $shortcodes as $entry ) {
			?>
			<option value="<?php echo $entry->ID;?>" <?php if( $message == $entry->ID )echo "selected"; ?>><?php echo $entry->post_title;?></option>
			<?php 		
				}
			}
			?>
          </select>
        </p>
        <?php 
    }
 
 
} // end class osmpWidget
add_action( 'widgets_init', create_function( '', 'return register_widget( "osmpWidget" );' ) );
?>