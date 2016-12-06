(function( $ ) {

    wp.customize( 'dogood_logo', function( value ) {
        value.bind( function( to ) {
            $(' .navbar-header img ').attr( 'src', to );
        } );
    });    

    wp.customize( 'dogood_lg_photo', function( value ) {
        value.bind( function( to ) {
            $( '.lg-homepage-photo img' ).attr( 'src', to );
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

    wp.customize( 'dogood_h1_color', function( value ) {
        value.bind( function( to ) {
            $( 'h1 a' ).css( 'color', to );
            $( 'h1' ).css( 'color', to );
            $( 'h2 a' ).css( 'color', to );
            $( 'h2' ).css( 'color', to );
            $( 'h3 a' ).css( 'color', to );
            $( 'h3' ).css( 'color', to );
            $( 'h4 a' ).css( 'color', to );
            $( 'h4' ).css( 'color', to );
            $( 'h5 a' ).css( 'color', to );
            $( 'h5' ).css( 'color', to );
            $( 'h6 a' ).css( 'color', to );
            $( 'h6' ).css( 'color', to );

        } );
    });

    wp.customize( 'dogood_h1_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'h1' ).css( 'font-family', to );  
            $( 'h2' ).css( 'font-family', to );  
            $( 'h3' ).css( 'font-family', to );  
            $( 'h4' ).css( 'font-family', to );
            $( 'h5' ).css( 'font-family', to );
            $( 'h6' ).css( 'font-family', to );
        } );
    }); 

    wp.customize( 'dogood_p_color', function( value ) {
        value.bind( function( to ) {
            $( 'p' ).css( 'color', to );
            $( 'li' ).css( 'color', to );
        } );
    });

    wp.customize( 'dogood_p_font_size', function( value ) {
        value.bind( function( to ) {            
            $( 'p' ).css( 'font-size', to + 'px' ); 
            $( 'li' ).css( 'font-size', to + 'px' );         
        } );
    }); 

    wp.customize( 'dogood_p_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'p' ).css( 'font-family', to ); 
            $( 'a' ).css( 'font-family', to );
            $( 'li' ).css( 'font-family', to );           
        } );
    });


    wp.customize( 'dogood_accent_color', function( value ) {
        value.bind( function( to ) {
            $( 'a' ).css( 'color', to );
            $( 'a:visited' ).css( 'color', to );
            $( 'button:hover' ).css( 'background-color', to );
            $( 'html input[type="button"]' ).css( 'background-color', to );
            $( 'input[type="reset"]' ).css( 'background-color', to );
            $( 'input[type="submit"]' ).css( 'background-color', to );
            $( 'button:hover' ).css( 'border-color', to );
            $( '.cta-sidebar button' ).css( 'background-color', to );
            $( '.cta-sidebar button' ).css( 'border-color', to );
            $( '.home-widget button' ).css( 'background-color', to );
            $( '.home-widget button' ).css( 'border-color', to );
         } );

    });


})( jQuery );