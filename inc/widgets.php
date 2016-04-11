<?php

function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function footer_widgets( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-widget-title">',
		'after_title' => '</p>'
	));
}

function social_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

// Create Widgets

create_widget( 'Call to Action Bar', 'front-bar', 'Displays on the bottom of the homepage, just above the footer' );
create_widget( 'Mission Statement', 'mission-statement', 'Mission statement on the homepage' );
create_widget( 'Google Map', 'google-map', 'Google map on the homepage' );
create_widget( 'Homepage Feature 1', 'create-your-own-1', 'First feature area on the homepage' );
create_widget( 'Homepage Feature 2', 'create-your-own-2', 'Second feature area on the homepage' );
create_widget( 'Homepage Feature 3', 'create-your-own-3', 'Third feature area on the homepage' );
create_widget( 'Headline Button', 'front-button', 'A button for the headline area' );

// Create Widget areas for Pages and Blog Posts

create_widget( 'Blog Sidebar', 'blog', 'Displays on the right of posts and pages' );

// Create Widget areas for Footer

footer_widgets( 'Footer 1', 'footer-1', 'Displays first in the footer' );
footer_widgets( 'Footer 2', 'footer-2', 'Displays second in the footer' );
footer_widgets( 'Footer 3', 'footer-3', 'Displays third in the footer' );
social_widget( 'Footer 4', 'social-icons', 'Social icons that display in the footer. If you dont want to show one of the icons, leave the URL field blank.' );

?>