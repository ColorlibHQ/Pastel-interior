<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'PASTELINTERIOR_DIR_URI' ) )
		define( 'PASTELINTERIOR_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'PASTELINTERIOR_DIR_ASSETS_URI' ) )
		define( 'PASTELINTERIOR_DIR_ASSETS_URI', PASTELINTERIOR_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'PASTELINTERIOR_DIR_CSS_URI' ) )
		define( 'PASTELINTERIOR_DIR_CSS_URI', PASTELINTERIOR_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'PASTELINTERIOR_DIR_JS_URI' ) )
		define( 'PASTELINTERIOR_DIR_JS_URI', PASTELINTERIOR_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('PASTELINTERIOR_DIR_IMG') )
		define( 'PASTELINTERIOR_DIR_IMG', PASTELINTERIOR_DIR_URI.'assets/img/' );
	
	//DIR inc
	if( !defined( 'PASTELINTERIOR_DIR_INC' ) )
		define( 'PASTELINTERIOR_DIR_INC', PASTELINTERIOR_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'PASTELINTERIOR_DIR_ELEMENTOR' ) )
		define( 'PASTELINTERIOR_DIR_ELEMENTOR', PASTELINTERIOR_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'PASTELINTERIOR_DIR_PATH' ) )
		define( 'PASTELINTERIOR_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'PASTELINTERIOR_DIR_PATH_INC' ) )
		define( 'PASTELINTERIOR_DIR_PATH_INC', PASTELINTERIOR_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'PASTELINTERIOR_DIR_PATH_LIB' ) )
		define( 'PASTELINTERIOR_DIR_PATH_LIB', PASTELINTERIOR_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'PASTELINTERIOR_DIR_PATH_CLASSES' ) )
		define( 'PASTELINTERIOR_DIR_PATH_CLASSES', PASTELINTERIOR_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'PASTELINTERIOR_DIR_PATH_WIDGET' ) )
		define( 'PASTELINTERIOR_DIR_PATH_WIDGET', PASTELINTERIOR_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'PASTELINTERIOR_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'PASTELINTERIOR_DIR_PATH_ELEMENTOR_WIDGETS', PASTELINTERIOR_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'pastelinterior-breadcrumbs.php' );
	// Sidebar register file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'widgets/pastelinterior-widgets-reg.php' );
	// Post widget file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'widgets/pastelinterior-recent-post-thumb.php' );
	// News letter widget file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'widgets/pastelinterior-newsletter-widget.php' );
	//Social Links
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'widgets/pastelinterior-social-links.php' );
	// Instagram Widget
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'widgets/pastelinterior-instagram.php' );
	// Nav walker file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'pastelinterior-functions.php' );

	// Theme Demo file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'demo/demo-import.php' );

	// Inline css file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'pastelinterior-commoncss.php' );
	// Post Like
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( PASTELINTERIOR_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( PASTELINTERIOR_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( PASTELINTERIOR_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	// Class pastelinterior dashboard


	if( class_exists( 'RW_Meta_Box' ) ){
		// Metabox Function
		require_once( PASTELINTERIOR_DIR_PATH_INC . 'pastelinterior-metabox.php' );
	}
	

	// Admin Enqueue Script
	function pastelinterior_admin_script(){
		wp_enqueue_style( 'pastelinterior-admin', get_template_directory_uri().'/assets/css/pastelinterior_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'pastelinterior_admin', get_template_directory_uri().'/assets/js/pastelinterior_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'pastelinterior_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );




	/**
	 * Instantiate Pastelinterior object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Pastelinterior Dashboard .
	 *
	 */
	
	$Pastelinterior = new Pastelinterior();
	


/**
 * A page by title, without get_page_by_title().
 *
 * WordPress deprecated get_page_by_title() in 6.2; this keeps the same
 * signature and return shape so existing calls behave identically.
 *
 * @param string $title     Page title.
 * @param string $output    OBJECT, ARRAY_A or ARRAY_N.
 * @param string $post_type Post type to search.
 * @return WP_Post|array|null
 */
if ( ! function_exists( 'pastel_interior_get_page_by_title' ) ) {
	function pastel_interior_get_page_by_title( $title, $output = OBJECT, $post_type = 'page' ) {
		$query = new WP_Query(
			array(
				'post_type'              => $post_type,
				'title'                  => $title,
				'post_status'            => 'all',
				'posts_per_page'         => 1,
				'no_found_rows'          => true,
				'ignore_sticky_posts'    => true,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
				'orderby'                => 'post_date ID',
				'order'                  => 'ASC',
			)
		);

		$page = ! empty( $query->posts ) ? $query->posts[0] : null;

		if ( ! $page ) {
			return null;
		}

		if ( ARRAY_A === $output ) {
			return get_object_vars( $page );
		}

		if ( ARRAY_N === $output ) {
			return array_values( get_object_vars( $page ) );
		}

		return $page;
	}
}


/**
 * Editor and markup support this theme predates.
 */
if ( ! function_exists( 'pastel_interior_modern_supports' ) ) {
	function pastel_interior_modern_supports() {
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
	}
	add_action( 'after_setup_theme', 'pastel_interior_modern_supports', 20 );
}

/**
 * The theme's Customizer controls.
 *
 * Replaces the Epsilon framework: same fields and stored values,
 * built on core's Customizer API.
 */
require_once get_template_directory() . '/inc/customizer/colorlib-customizer/colorlib-customizer.php';
