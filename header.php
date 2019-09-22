<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <div class="site-main">

        <!--================ Left Area =================-->
    <?php
    // Social Profile
    $socialProfile = pastelinterior_opt( 'pastelinterior_social_profile_toggle' );
    if( function_exists( 'pastelinterior_social_profile' ) && $socialProfile == 1 ){
	    pastelinterior_social_profile();
    }
    ?>

    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="header_logo">
		                <?php
		                echo pastelinterior_theme_logo( 'navbar-brand logo_h' );
		                ?>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <?php
                    if(has_nav_menu('primary-menu')) {
                        wp_nav_menu(array(
                            'menu'           => 'primary-menu',
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'menu-main-menu',
                            'container_class'=> 'collapse navbar-collapse offset',
                            'container_id'   => 'navbarSupportedContent',
                            'menu_class'     => 'nav navbar-nav menu_nav justify-content-center',
                            'walker'         => new pastelinterior_bootstrap_navwalker,
                            'depth'          => 3
                        ));
                    }

                    // Search Icon
                    $numberToggle = pastelinterior_opt( 'pastelinterior_phonenumber_toggle' );
                    $phoneNumber  = pastelinterior_opt( 'pastelinterior_top_phone' );
                    if( $numberToggle == 1 ) {
	                    ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="call-us"><a href="tel:<?php echo esc_html( $phoneNumber ) ?>"><i class="ti-headphone-alt"></i>+<?php echo esc_html( $phoneNumber ) ?></a></li>
                        </ul>
	                    <?php
                    }
                    ?>
                </div>
            </nav>
        </div>
    </header>


    <?php
    //Page Title Bar
    if( function_exists( 'pastelinterior_page_titlebar' ) ){
	    pastelinterior_page_titlebar();
    }

