<?php 
/**
 * @Packge     : Pastelinterior
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/
// Header top background color
Epsilon_Customizer::add_field(
    'pastelinterior_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_general_section',
        'default'     => '#f9cc41',
    )
);

/***********************************
 * Header Section Fields =====================================
 ***********************************/
//Header Top
Epsilon_Customizer::add_field(
    'header_top_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Top', 'pastel-interior' ),
        'section'     => 'pastelinterior_header_section',
        
    )
);

// Header search form toggle field
Epsilon_Customizer::add_field(
	'pastelinterior_phonenumber_toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Show header Phone Number', 'pastel-interior' ),
		'description' => esc_html__( 'Toggle to show header phone number.', 'pastel-interior' ),
		'section'     => 'pastelinterior_header_section',
		'default'     => false,
	)
);
// Header top phone number
Epsilon_Customizer::add_field(
    'pastelinterior_top_phone',
    array(
        'type'        => 'number',
        'label'       => esc_html__( 'Phone Number', 'pastel-interior' ),
        'description' => esc_html__( 'Empty field would be display none', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_header_section',
        'default'     => __( '01723 664 041', 'pastel-interior' ),
    )
);



Epsilon_Customizer::add_field(
    'social_pro_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Social Profile', 'pastel-interior' ),
        'section'     => 'pastelinterior_header_section',

    )
);

// Social Profile Show/Hide
Epsilon_Customizer::add_field(
    'pastelinterior_social_profile_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Social Profile Show/Hide', 'pastel-interior' ),
        'section'     => 'pastelinterior_header_section',
        'default'     => false,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'pastelinterior_social_pofile',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'pastelinterior_header_section',
		'label'        => esc_html__( 'Social Profile Links', 'pastel-interior' ),
		'button_label' => esc_html__( 'Add new social link', 'pastel-interior' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'profile_name',
		),
		'fields'       => array(
			'profile_name'       => array(
				'label'             => esc_html__( 'Title', 'pastel-interior' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'pastel-interior' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			)
			
		),
	)
);



// Header navbar============================================
Epsilon_Customizer::add_field(
    'header_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Navbar', 'pastel-interior' ),
        'section'     => 'pastelinterior_header_section',
        
    )
);

// Header background color field
Epsilon_Customizer::add_field(
    'pastelinterior_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'pastel-interior' ),
        'description' => esc_html__( 'Select the header background color.', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_header_section',
        'default'     => '#262533',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'pastelinterior_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_header_section',
        'default'     => '#fff',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'pastelinterior_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_header_section',
        'default'     => '',
    )
);
// Header menu dropdown background color field
Epsilon_Customizer::add_field(
    'pastelinterior_header_menu_dropbg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu dropdown background color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_header_section',
        'default'     => '#fff',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'pastelinterior_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_header_section',
        'default'     => '#262533',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'pastelinterior_drop_menu_item_hover_bg',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu item hover background', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_header_section',
        'default'     => '',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'pastelinterior_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_header_section',
        'default'     => '#ffffff',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'pastelinterior_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'pastel-interior' ),
        'description' => esc_html__( 'Set post excerpt length.', 'pastel-interior' ),
        'section'     => 'pastelinterior_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);



// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'pastelinterior_blog_layout',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'pastel-interior' ),
        'section'  => 'pastelinterior_blog_section',
        'description' => esc_html__( 'Select the option to set blog page layout.', 'pastel-interior' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 2,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'pastelinterior_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'pastel-interior' ),
        'section'     => 'pastelinterior_blog_section',
        'default'     => false
    )
);
Epsilon_Customizer::add_field(
    'pastelinterior_blog_single_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog single post meta show/hide', 'pastel-interior' ),
        'section'     => 'pastelinterior_blog_section',
        'default'     => false
    )
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'pastelinterior_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'pastel-interior' ),
        'section'           => 'pastelinterior_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'pastelinterior_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'pastel-interior' ),
        'section'           => 'pastelinterior_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'pastelinterior_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'pastelinterior_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'pastelinterior_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'pastelinterior_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'pastel-interior' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'pastel-interior' ),
        'section'     => 'pastelinterior_footer_section',
        'default'     => false,
    )
);

// Footer Widget Background Color
Epsilon_Customizer::add_field(
	'pastelinterior_footer_widget_bgimg',
	array(
		'type'        => 'epsilon-image',
		'label'       => esc_html__( 'Footer Widget Background Image', 'pastel-interior' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'     => 'pastelinterior_footer_section',
	)
);

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'pastel-interior' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'pastelinterior_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'pastel-interior' ),
        'section'     => 'pastelinterior_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'pastelinterior_social_pofile_footer',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'pastelinterior_footer_section',
		'label'        => esc_html__( 'Footer Social Profile Links', 'pastel-interior' ),
		'button_label' => esc_html__( 'Add new social link', 'pastel-interior' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_url',
		),
		'fields'    => array(

			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'pastel-interior' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'pentax' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),

		),
	)
);



// Footer widget background color field
Epsilon_Customizer::add_field(
    'pastelinterior_footer_widget_bdcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_footer_section',
        'default'     => '#19191b',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'pastelinterior_footer_widget_textcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'pastelinterior_footer_widget_titlecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_footer_section',
        'default'     => '#FFFFFF',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'pastelinterior_footer_widget_anchorcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'pastelinterior_footer_widget_anchorhovcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'pastel-interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'pastelinterior_footer_section',
        'default'     => '',
    )
);



