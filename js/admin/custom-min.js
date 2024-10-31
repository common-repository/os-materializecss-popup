(function($) {
	$( document ).on( 'click', '.shortcode', function(e) {

        $( this ).select();
        $( this ).onmouseup = function() {
            $( this ).onmouseup = null;
            return false
        }
    });

	$( '.button-color' ).wpColorPicker();
	$( document ).on( 'click', '.osmp_design', function(e) {

        if ( $( this ).hasClass( "active" ) ) {

            $( '#osmp_design' ).val( '' );
            $( '.osmp_design' ).parent().removeClass( 'active' );
            $( '.osmp-design-wrap' ).hide();
        } else {

            var type_value = $( this ).attr( 'id' );
            $( '#osmp_design' ).val( type_value );
            $( '.osmp_design' ).parent().removeClass( 'active' );
            $( this ).parent().addClass( 'active' );
            $( '.osmp-design-wrap' ).show();

            if( type_value == 'design-3' || type_value == 'design-4' ) {
                $( '.osmp-design-wrap' ).hide();
                $( '.osmp-design-wrap-new' ).show();
            }
        }
    });
})(jQuery);