<?php

function rwom_setup() {

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'rwom' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
add_action( 'after_setup_theme', 'rwom_setup' );

function rwom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rwom' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'rwom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rwom_scripts() {
	wp_enqueue_style( 'rwom-style', get_template_directory_uri() . '/assets/styles/build/rwom.min.css' );

	wp_enqueue_script( 'rwom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'rwom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

}
add_action( 'wp_enqueue_scripts', 'rwom_scripts' );

