<?php
/**
 * fin-pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fin-pro
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.1' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fin_pro_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on fin-pro, use a find and replace
		* to change 'fin-pro' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'fin-pro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'fin-pro' ),
			'footer-menu' => esc_html__( 'Footer-menu', 'fin-pro' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'fin_pro_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}





add_action( 'after_setup_theme', 'fin_pro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fin_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fin_pro_content_width', 640 );
}
add_action( 'after_setup_theme', 'fin_pro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


/**
 * Enqueue scripts and styles.
 */
function fin_pro_scripts() {
    // styles
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.css', array(), _S_VERSION );
    wp_enqueue_style( 'fin-pro-style', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION );


    //scripts
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/app.min.js', array(), _S_VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'fin_pro_scripts' );





// remove useless wp core
get_template_part('functions/theme-disable-wp-core');

// fonts
get_template_part('functions/fonts');

// casino post type
get_template_part('functions/casino-post-type');

// bonus post type
get_template_part('functions/bonus-post-type');

// comment form
get_template_part('functions/comment-form');

// customizer
get_template_part('functions/customizer');

//security
get_template_part('functions/security');



//Remove WPAUTOP from ACF TinyMCE Editor
function acf_wysiwyg_remove_wpautop() {
    remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');


// blog pagination settings

function custom_pre_get_posts( $query ) {
    if( $query->is_main_query() && !$query->is_feed() && !is_admin() && is_category()) {
        $query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) );  }  }

add_action('pre_get_posts','custom_pre_get_posts');

function custom_request($query_string ) {
    if( isset( $query_string['page'] ) ) {
        if( ''!=$query_string['page'] ) {
            if( isset( $query_string['name'] ) ) { unset( $query_string['name'] ); } } } return $query_string; }

add_filter('request', 'custom_request');




