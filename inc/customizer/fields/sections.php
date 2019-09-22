<?php 
/**
 * @Packge     : Pastelinterior
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'pastelinterior_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'pastel-interior' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'pastelinterior_general_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'pastel-interior' ),
            'panel'    => 'pastelinterior_theme_options_panel',
            'priority' => 1,
        ),
    ),

    /**
     * Header Section
     */
    array(
        'id'   => 'pastelinterior_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'pastel-interior' ),
            'panel'    => 'pastelinterior_theme_options_panel',
            'priority' => 2,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'pastelinterior_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'pastel-interior' ),
            'panel'    => 'pastelinterior_theme_options_panel',
            'priority' => 3,
        ),
    ),



    /**
     * 404 Page Section
     */
    array(
        'id'   => 'pastelinterior_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'pastel-interior' ),
            'panel'    => 'pastelinterior_theme_options_panel',
            'priority' => 6,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'pastelinterior_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'pastel-interior' ),
            'panel'    => 'pastelinterior_theme_options_panel',
            'priority' => 7,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>