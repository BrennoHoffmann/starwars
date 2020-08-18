<?php

if( ! defined( 'ABSPATH' ) ) { header( 'Location: /' ); exit; }


define('VERSION','3');


function shapeSpace_conditional_styles() {
  wp_enqueue_style( 'vendor', get_template_directory_uri() .'/dist/css/vendor.css?v0', array(), VERSION );
  wp_enqueue_style( 'main', get_template_directory_uri() . '/dist/css/main.css?v0', array(), VERSION );
}

function shapeSpace_frontend_scripts() {
	shapeSpace_conditional_styles();
	
	
	wp_enqueue_script( 'vendor', get_template_directory_uri() .'/dist/js/vendor.js', array('jquery'), VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() .'/dist/js/main.js', array('jquery'), VERSION, true );

}
add_action('wp_enqueue_scripts', 'shapeSpace_frontend_scripts');


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/* SUPORTE AO MENU */
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'menu_principal', 'Menu do Topo' );
	add_theme_support( 'custom-logo');
}

/* CONFIGURA O SUPORTE A MINIATURAS */
if ( function_exists( 'add_theme_support' )){
	add_theme_support( 'post-thumbnails' );	
	add_image_size( 'square', 183, 178, true );
	add_image_size( 'small', 113, 78, true );
	add_image_size( 'thumb', 330, 240, true );
	add_image_size( 'post_thumbnail', 674, 472, true );
}