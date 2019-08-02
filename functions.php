<?php
/**
 * Doody functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Doody
 */

if ( ! function_exists( 'doody_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function doody_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'doody', get_template_directory() . '/languages' );

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

        add_image_size('doody-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','doody' ),
	        'footer'=>esc_html__( 'Footer Menu','doody' ),
	        'social'=>esc_html__( 'Social Menu','doody' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'doody_custom_background_args', array(
			'default-color' => 'f7f7f7',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 40,
			'width'       => 40,
			'flex-width'  => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'doody_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function doody_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'doody_content_width', 1170 );
}
add_action( 'after_setup_theme', 'doody_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function doody_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'doody' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'doody' ),
        'before_widget' => '<section id="%1$s" class="widget card shadow-sm mb-4 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title card-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'doody_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function doody_scripts() {
    // load bootstrap css
    wp_enqueue_style( 'doody-bootstrap-css', get_template_directory_uri() . '/assets/css/flatly.min.css');

    //load hovercss
    wp_enqueue_style( 'doody-hovercss', get_template_directory_uri() . '/assets/css/hovercss/hover-min.css');

	// fontawesome
	wp_enqueue_style( 'doody-fontawesome', get_template_directory_uri().'/assets/css/fontawesome/css/all.min.css' );

    wp_enqueue_style( 'doody-style', get_stylesheet_uri() );

    //JQuery
    wp_enqueue_script('jquery');

    // load bootstrap js
    wp_enqueue_script('doody-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '', true );
    wp_enqueue_script('doody-bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '', true );

    wp_enqueue_script('doody-themejs', get_template_directory_uri() . '/assets/js/theme-script.js', array(), '', true );

    wp_enqueue_script('doody-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'doody_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}

