<?php
/**
 * freenews functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package freenews
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Loader.php' );

$loader = new \WPTRT\Autoload\Loader();

$loader->add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$loader->register();

if ( ! function_exists( 'freenews_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function freenews_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on freenews, use a find and replace
		 * to change 'freenews' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'freenews', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'freenews' ),
			'menu-2' => esc_html__( 'Social Links', 'freenews' ),
			'menu-3' => esc_html__( 'Secondary', 'freenews' ),
			'menu-4' => esc_html__( 'Footer Menu', 'freenews' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'search-form',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'freenews_custom_background_args', array(
			'default-color' => '#f8f8f8',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		  */
		add_editor_style( array( 'css/editor-style.css', freenews_fonts_url() ) );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_image_size( 'freenews-highlighted', 765, 500, true );
		add_image_size( 'freenews-main-banner', 1000, 650, true );

		 /**
		* Making the theme Woocommrece compatible
		*/

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	}

	// Theme Activation Notice
	add_action( 'admin_notices', 'freenews_activation_notice' );

endif;
add_action( 'after_setup_theme', 'freenews_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function freenews_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'freenews_content_width', 1170 );
}
add_action( 'after_setup_theme', 'freenews_content_width', 0 );

/**
 * Sidebar Area
 */
require get_template_directory() . '/inc/widgets/sidebars.php';

/**
 * Widgets Area
 */
require get_template_directory() . '/inc/widgets/post-widgets.php';

/**
 * Widgets List Category Post
 */
require get_template_directory() . '/inc/widgets/list-category-post.php';

/**
 * Widgets Category Slide
 */
require get_template_directory() . '/inc/widgets/category-slide.php';

/**
 * Widgets Blog Category post
 */
require get_template_directory() . '/inc/widgets/blog-category-post.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/style-scripts.php';

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
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Theme Information
 */
require get_template_directory() . '/inc/information.php';

/**
 * Common Functions
 */
require get_template_directory() . '/inc/common-functions.php';

/**
 * Theme Functions
 */
require get_template_directory() . '/inc/theme-functions.php';


if ( !class_exists( 'FreeNews_Pro' ) ) {

	/**
	 * TGM plugin Activation
	 */
	require get_template_directory() . '/inc/tgm/tgm.php';

	/**
	 * Upgrade to Pro
	 */
	require get_template_directory() . '/inc/customizer/upgrade-to-pro.php';

	/**
	 * Home/ Frontpage checkbox
	 */
	require get_template_directory() . '/inc/custom/customizer-custom.php';

	/**
	 * About Page
	 */
	require get_template_directory() . '/inc/about-theme/about-theme.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Theme Ignore
add_action( 'admin_init', 'freenews_notice_ignore' );
function freenews_notice_ignore() {
  global $current_user;
  $user_id   = $current_user->ID;
  $theme_data  = wp_get_theme();

  if ( isset( $_GET[ esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ] ) && '0' == $_GET[ esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ] ) {
    add_user_meta( $user_id, esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore', 'true', true );
  }
}
