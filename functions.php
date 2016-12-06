<?php

// Include Scripts and CSS

function dogood_theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap-3.3.5.css' );
	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/font-awesome-4.6.3/css/font-awesome.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'dogood_theme_styles');

function dogood_theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', 'false' );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', 'false' );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9');
  
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '', 'true');
}

add_action( 'wp_enqueue_scripts', 'dogood_theme_js');


// Add WP Basic Features Support

if ( ! function_exists( 'dogood_setup' ) ) :

function dogood_setup() {

	// Add Support for Feed Links

	add_theme_support( 'automatic-feed-links' );

	// Add Menu Support

	add_theme_support ( 'menus' );

	// Add Thumbnails Support

	add_theme_support( 'post-thumbnails' );

	// Add Support for Flexible Title Tag

	add_theme_support( 'title-tag' );

	}
	endif;
add_action( 'after_setup_theme', 'dogood_setup' );


// Check for Front Page being used
function dogood_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'dogood_filter_front_page_template' );

// Add Support for WooCommerce
add_action( 'after_setup_theme', 'dogood_woocommerce_support' );
function dogood_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Add Support for Google Fonts
function dogood_google_fonts() {
  $query_args = array(
    'family' => 'Open+Sans:400,700,700italic,400italic|Proza+Libre:400,600,700,700italic,600italic,400italic|Roboto:400,700,400italic,700italic|Lato:400,400italic,700italic,700|Slabo+27px|Source+Sans+Pro:400,400italic,700,700italic|Raleway:400,400italic,700,700italic|Lora:400,400italic,700italic,700|Droid+Sans:400,700|Ubuntu:400,400italic,700,700italic|Arimo:400,400italic,700,700italic',
    'subset' => 'latin,latin-ext',
  );
  wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
            
add_action('wp_enqueue_scripts', 'dogood_google_fonts');

// Content Width Requirement
function dogood_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'strunk_content_width', 800 );
}
add_action( 'after_setup_theme', 'dogood_content_width', 0 );

// MENUS!

function dogood_register_theme_menus() {

	register_nav_menus (
		array (
			'header-menu' => __( 'Header Menu', 'do-good')
	));
}

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

// Register Menus
add_action ( 'init', 'dogood_register_theme_menus');


// WIDGETS!

require_once get_template_directory() . '/inc/widgets.php';

// Include Sidebar Feature Widget
require_once get_template_directory() . '/inc/cta-sidebar-widget.php';

// Include Home Feature Widget
require_once get_template_directory() . '/inc/home-feature-widget.php';

// Include CTA Bar Widget
require_once get_template_directory() . '/inc/ctabar-widget.php';

// Include CTA Button Widget
require_once get_template_directory() . '/inc/ctabutton-widget.php';

// Include Social Icons Widget
require_once get_template_directory() . '/inc/social-widget.php';


// THEME CUSTOMIZER!

require_once get_template_directory() . '/inc/wp-customize-image-reloaded.php';
require_once get_template_directory() . '/inc/theme-customizer.php';


// Adjust Wordpress Excerpt

function dogood_wp_new_excerpt($text) {
	if ($text == '') 	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text);
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 28);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, ' ... ');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'dogood_wp_new_excerpt');

?>