<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
} 
/**
 * @Packge     : Pastelinterior
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
// enqueue css
function pastelinterior_common_custom_css(){
    
    wp_enqueue_style( 'pastelinterior-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = pastelinterior_opt( 'pastelinterior_theme_color', '#f9cc41' );

		$headerTop_bg     		  = pastelinterior_opt( 'pastelinterior_top_header_bg_color' );
		$headerTop_col     		  = pastelinterior_opt( 'pastelinterior_top_header_color' );

		$headerBg          		  = pastelinterior_opt( 'pastelinterior_header_bg_color', '#262533' );
		$menuColor          	  = pastelinterior_opt( 'pastelinterior_header_menu_color', '#fff' );
		$menuHoverColor           = pastelinterior_opt( 'pastelinterior_header_menu_hover_color' );

		$dropMenuBgColor          = pastelinterior_opt( 'pastelinterior_header_menu_dropbg_color' );
		$dropMenuColor            = pastelinterior_opt( 'pastelinterior_header_drop_menu_color' );
		$dropMenuHovColor         = pastelinterior_opt( 'pastelinterior_header_drop_menu_hover_color' );
		$dropMenuHovItemBg        = pastelinterior_opt( 'pastelinterior_drop_menu_item_hover_bg' );

		$footerwbgColor     	  = pastelinterior_opt('pastelinterior_footer_widget_bdcolor');
		$footerwbgImage     	  = pastelinterior_opt('pastelinterior_footer_widget_bgimg');
		$footerwTextColor   	  = pastelinterior_opt('pastelinterior_footer_widget_textcolor');
		$footerwanchorcolor 	  = pastelinterior_opt('pastelinterior_footer_widget_anchorcolor');
		$footerwanchorhovcolor    = pastelinterior_opt('pastelinterior_footer_widget_anchorhovcolor');
		$widgettitlecolor  		  = pastelinterior_opt('pastelinterior_footer_widget_titlecolor');


		$fofbg  	  		  = pastelinterior_opt('pastelinterior_fof_bg_color');
		$foftonecolor  	  	  = pastelinterior_opt('pastelinterior_fof_textone_color');
		$fofttwocolor  	  	  = pastelinterior_opt('pastelinterior_fof_texttwo_color');


		$footerbgImg = json_decode( $footerwbgImage );

		$footerbgImgAttr = '';

		if( ! empty( $footerbgImg->url ) ) {
			$footerbgImgAttr = 'background-image:url( ' .esc_url( $footerbgImg->url ). ' );';
		}

		$dirImg = get_template_directory_uri().'/assets/img/pattern_bg.png';


		$customcss ="
			.banner-area .owl-nav div:hover{
				background-image: url( {$dirImg} )
			}
		
			.banner_area{
				{$header_bg_img}
			}
			.header_area {
				background: {$headerBg}
			}

			.area-heading p,
			.header_area .navbar .nav > .nav-item:hover > .nav-link, 
			.header_area .navbar .nav > .nav-item.active > .nav-link,
			.header_area .navbar .nav.navbar-nav.navbar-right .call-us a i,
			.top_menu .float-left a:hover,
			.banner-area .owl-nav div:hover,
			.home_banner_area .banner_inner .banner_content h1 .basecolor,
			.banner-breadcrumb .breadcrumb-item a:hover,
			.single-blog .short_details a:hover,
			.l_blog_item .l_blog_text h4:hover,
			.blog_details a:hover,
			.blog_right_sidebar .post_category_widget .cat-list li:hover a,
			.blog_right_sidebar .widget_pastelinterior_recent_widget .post_item .media-body a:hover,
			.blog_right_sidebar .widget_categories ul li:hover a,
			.blog_right_sidebar .widget_rss ul li:hover a, 
			.blog_right_sidebar .widget_recent_entries ul li:hover a, 
			.blog_right_sidebar .widget_recent_comments ul li:hover a, 
			.blog_right_sidebar .widget_archive ul li:hover a, 
			.blog_right_sidebar .widget_meta ul li:hover a,			
			.single-post-area .navigation-top .social-icons li:hover i, .single-post-area .navigation-top .social-icons li:hover span,
			.single-post-area .blog-author a:hover,
			.contact-info .media-body h3 a:hover,
			.form-contact label,
			.modal-message .modal-dialog .modal-content .modal-header h2,
			.play-icon a i,
			.sample-text-area p b ,
			.sample-text-area p i,
			.sample-text-area p sup,
			.sample-text-area p del,
			.sample-text-area p u,
			.link-border,
			.main_btn:hover,
			.main_btn_2:hover,
			.submit_btn:hover,
			.black_btn,
			.team_item .team_img .hover a:hover,
			.team_item:hover .team_name h4,
			.portfolio_details_inner .portfolio_right_text .list li i,
			.about-area .about-content span,
			.img-styleBox .styleBox-2 p strong,
			.footer-area .single-footer-widget ul li a:hover,
			.footer-area .single-footer-widget .form-wrap .info,
			.footer-bottom p a,
			.single-footer-widget ul li:hover a
			
			{
				color: {$themeColor}
			}			

			.top_menu .float-right .pur_btn,
			.right_fix_bar .social_area h4 a:hover,
			.banner-content .primary-btn,
			.banner-content .main_btn,
			.home_banner_area .social_area .round,
			.banner_area .banner_inner .banner_content .page_link,
			.single-blog .meta-top,
			.causes_slider .owl-dots .owl-dot.active,
			.blog_item_img .blog_item_date,
			.blog_right_sidebar .tag_cloud_widget ul li a:hover,
			.blog-pagination .page-link:hover,
			.video_area_inner::before,
			.submit_btn,
			.white_bg_btn:hover,
			.black_btn:hover,
			.button,
			.button:hover,
			.button-header,
			.button-contactForm,
			.testimonial .testimonial-item:after,
			.single-portfolio .short_info:after,
			.footer-area .single-footer-widget .click-btn
			
			{
				background: {$themeColor}
			}

			.right_fix_bar .social_area h4 a:hover,
			.banner-content .primary-btn:hover,
			.banner-content .main_btn,
			.single-post-area .quotes,
			.single-number:hover,
			.link-border,
			.link-border:before,
			.submit_btn,
			.white_bg_btn:hover,
			.button,
			.button-header,
			.button-contactForm,
			blockquote p
			
			{
				border-color: {$themeColor}
			}



			.top_menu{
				background: {$headerTop_bg}
			}
			.top_menu .dn_btn,
			.top_menu .header_social li a,
			.top_menu .follow_us
			{
				color: {$headerTop_col}
			}

			
			
			.header_area .navbar .nav .nav-item .nav-link {
			   color: {$menuColor};
			}
			.header_area .navbar .nav .nav-item:hover .nav-link,
			.header_area .navbar .nav > .nav-item.active > .nav-link{
			   color: {$menuHoverColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul {
			   background: {$dropMenuBgColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul .nav-item .nav-link {
			   color: {$dropMenuColor};
			}
			
			.header_area .navbar .nav .nav-item.submenu > ul > .nav-item:hover > .nav-link{
				background: {$dropMenuHovItemBg};
				color: {$dropMenuHovColor}
			}
	
			.footer-area .footer-top{
				{$footerbgImgAttr}
			}
			
			.footer-area {
				background-color: {$footerwbgColor};
			}
			footer.footer-area p{
				color: {$footerwTextColor}
			}
			.footer-area .single-footer-widget h4{
				color: {$widgettitlecolor}
			}
			footer a,
			.footer-area .single-footer-widget ul li a{
			   color: {$footerwanchorcolor};
			}
			footer a:hover,
			.footer-area .single-footer-widget ul li a:hover{
			   color: {$footerwanchorhovcolor};
			}
			#f0f {
			   background-color: {$fofbg};
			}
			.f0f-content .h1 {
			   color: {$foftonecolor};
			}
			.f0f-content p {
			   color: {$fofttwocolor};
			}

        ";
       
    wp_add_inline_style( 'pastelinterior-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'pastelinterior_common_custom_css', 50 );