(function( $ ) {

    wp.customize( 'dogood_logo', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #logo ').hide();
            } else {
                $(' #logo ').show();
                $(' #logo ').attr( 'src', to );
            }
        } );
    });    

    wp.customize( 'dogood_lg_photo', function( value ) {
        value.bind( function( to ) {
            $( '.lg-homepage-photo' ).css( 'background-image: url', to );
        } );
    });

        wp.customize( 'dogood_headline_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #site-headline ').hide();
            } else {
                $(' #site-headline ').show();
                $(' #site-headline ').text( to );
            }
        } );
    }); 

    wp.customize( 'dogood_subheadline_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #site-subheadline ').hide();
            } else {
                $(' #site-subheadline ').show();
                $(' #site-subheadline ').text( to );
            }
        } );
    }); 

    wp.customize( 'dogood_phone_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #phone ').hide();
            } else {
                $(' #phone ').show();
                $(' #phone ').text( to );
            }
        } );
    }); 

    wp.customize( 'dogood_address_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #address ').hide();
            } else {
                $(' #address ').show();
                $(' #address ').text( to );
            }
        } );
    });  

})( jQuery );