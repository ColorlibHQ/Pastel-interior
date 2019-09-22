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
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class pastelinterior dashboard
	require_once( PASTELINTERIOR_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


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
	
