<?php

function dogood_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'do-good-free');  
  $wp_customize->get_control('display_header_text')->section = 'title_tagline'; 
  $wp_customize->get_control('blogname')->label = __('Site Name', 'do-good-free');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'do-good-free');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_control('header_textcolor')->section = 'header_text_styles'; 
  $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'do-good-free');
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage'; 

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'do-good-free');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'do-good-free');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'do-good-free');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'do-good-free');  


  // Customize Background Settings

  $wp_customize->get_section('background_image')->title = __('Background Styles', 'do-good-free');  
  $wp_customize->get_control('background_color')->section = 'background_image'; 

  $wp_customize->remove_control('header_image');

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'do-good-free' ),
      'description' => __( 'Controls the basic settings for the theme.', 'do-good-free' ),
  ) );
  $wp_customize->add_panel( 'design_settings', array(
      'priority' => 20,
      'theme_supports' => '',
      'title' => __( 'Design Settings', 'do-good-free' ),
      'description' => __( 'Controls the basic design settings for the theme.', 'do-good-free' ),
  ) ); 

  // Remove Panels

  $wp_customize->remove_control('header_image');
  $wp_customize->remove_section('colors');

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;


// GENERAL SETTINGS PANEL ........................................ //


// Contact Bar Text

  $wp_customize->add_section( 'contactbar_text' , array(
    'title'      => __('Phone and Address Text','do-good-free'), 
    'panel'      => 'general_settings',
    'priority'   => 100   
  ) );  
  $wp_customize->add_setting(
      'dogood_phone_text',
      array(
          'default'           => __( '123 123-1234', 'do-good-free' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'contactbar_phone_text',
            array(
                'label'          => __( 'Phone', 'do-good-free' ),
                'section'        => 'contactbar_text',
                'settings'       => 'dogood_phone_text',
                'type'           => 'text'
            )
        )
   );  

  $wp_customize->add_setting(
      'dogood_address_text',
      array(
          'default'           => __( '444 South Lake St. Fancytown, CA 12345', 'do-good-free' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'contactbar_address_text',
            array(
                'label'          => __( 'Address', 'do-good-free' ),
                'section'        => 'contactbar_text',
                'settings'       => 'dogood_address_text',
                'type'           => 'text'
            )
        )
   );   


  // Add Site Headline Text

  $wp_customize->add_section( 'custom_headline_text' , array(
    'title'      => __('Site Headline Text','do-good-free'), 
    'panel'      => 'general_settings',
    'priority'   => 200    
  ) );  
  $wp_customize->add_setting(
      'dogood_headline_text',
      array(
          'default'           => __( 'Large Headline Text', 'do-good-free' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_headline_text',
            array(
                'label'          => __( 'Site Headline', 'do-good-free' ),
                'section'        => 'custom_headline_text',
                'settings'       => 'dogood_headline_text',
                'type'           => 'text'
            )
        )
   );  


  // Add Site Sub-Headline Text

  $wp_customize->add_section( 'custom_subheadline_text' , array(
    'title'      => __('Site Sub-Headline Text','do-good-free'), 
    'panel'      => 'general_settings',
    'priority'   => 200    
  ) );  
  $wp_customize->add_setting(
      'dogood_subheadline_text',
      array(
          'default'           => __( 'Smaller Sub Headline Text', 'do-good-free' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_subheadline_text',
            array(
                'label'          => __( 'Site Sub-Headline', 'do-good-free' ),
                'section'        => 'custom_subheadline_text',
                'settings'       => 'dogood_subheadline_text',
                'type'           => 'text'
            )
        )
   );


// DESIGN SETTINGS PANEL ........................................ //

  // Add Custom Logo Settings

  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','do-good-free'), 
    'panel'      => 'design_settings',
    'priority'   => 20    
  ) );  
  $wp_customize->add_setting(
      'dogood_logo',
      array(
          'default'         => get_template_directory_uri() . '/images/logo.png',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'custom_logo',
           array(
               'label'      => __( 'Change Logo', 'do-good-free' ),
               'section'    => 'custom_logo',
               'settings'   => 'dogood_logo',
               'context'    => 'dogood-custom-logo' 
           )
       )
   ); 

  // Add Large Homepage Background Photo

  $wp_customize->add_section( 'custom_background' , array(
    'title'      => __('Large Homepage Photo','do-good-free'), 
    'panel'      => 'design_settings',
    'priority'   => 20    
  ) );  
  $wp_customize->add_setting(
      'dogood_lg_photo',
      array(
          'default'         => get_template_directory_uri() . '/images/do-good-free-front.jpg',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'custom_background',
           array(
               'label'      => __( 'Set Photo', 'do-good-free' ),
               'section'    => 'custom_background',
               'settings'   => 'dogood_lg_photo',
               'context'    => 'dogood-lg-photo' 
           )
       )
   ); 

 
  // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','do-good-free'), 
    'panel'      => 'design_settings',
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'dogood_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'do-good-free' ),
                'section'        => 'custom_css_field',
                'settings'       => 'dogood_custom_css',
                'type'           => 'textarea'
            )
        )
   );

}
  
add_action( 'customize_register', 'dogood_customize_register' );


// Call the custom css into the header

$defaults = array(
  'wp-head-callback'       => 'dogood_style_header'
);
add_theme_support( 'custom-header', $defaults );

// Callback function for updating styles

function dogood_style_header() {

   ?>

<style type="text/css">

  <?php if( get_theme_mod('dogood_custom_css') != '' ) {
    echo get_theme_mod('dogood_custom_css');
  } ?>

  </style>

<?php 

}

// Add theme support for Custom Backgrounds

$defaults = array(
  'default-color' => '#ffffff',
);
add_theme_support( 'custom-background', $defaults );


// Sanitize text 

function sanitize_text( $text ) {
    
    return sanitize_text_field( $text );

}

// Sanitize textarea 

function sanitize_textarea( $text ) {
    
    return esc_textarea( $text );

}

// Custom js for theme customizer

function dogood_customizer_js() {
  wp_enqueue_script(
    'dogood_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}
add_action( 'customize_preview_init', 'dogood_customizer_js' );

?>