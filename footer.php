<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'pastel-interior' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( pastelinterior_opt( 'pastelinterior_footer_copyright_text' ) ) ? pastelinterior_opt( 'pastelinterior_footer_copyright_text' ) : $copyText;
    $footer_class = pastelinterior_opt( 'pastelinterior_footer_widget_toggle' ) == 1 ? 'footer-area' : 'no_widget';

    ?>
    <!--================ start footer Area =================-->
        <footer class="<?php echo esc_attr( $footer_class ) ?>">
            <div class="footer-top">
                <?php
                if( pastelinterior_opt( 'pastelinterior_footer_widget_toggle' ) == 1 ) {
                    ?>
                    <div class="container">
                        <div class="row">
                            <?php
                            // Footer Widget 1
                            if ( is_active_sidebar( 'footer-1' ) ) {
                                echo '<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">';
                                dynamic_sidebar( 'footer-1' );
                                echo '</div>';
                            }

                            // Footer Widget 2
                            if ( is_active_sidebar( 'footer-2' ) ) {
                                echo '<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">';
                                dynamic_sidebar( 'footer-2' );
                                echo '</div>';
                            }

                            // Footer Widget 1
                            if ( is_active_sidebar( 'footer-3' ) ) {
                                echo '<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">';
                                dynamic_sidebar( 'footer-3' );
                                echo '</div>';
                            }

                            // Footer Widget 1
                            if ( is_active_sidebar( 'footer-4' ) ) {
                                echo '<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">';
                                dynamic_sidebar( 'footer-4' );
                                echo '</div>';
                            }

                            // Footer Widget 1
                            if ( is_active_sidebar( 'footer-5' ) ) {
                                echo '<div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">';
                                dynamic_sidebar( 'footer-5' );
                                echo '</div>';
                            }

                            ?>
                        </div>
                    </div>
                    <?php
                } ?>
            </div>
            <div class="container">
                <div class="footer-bottom row align-items-center text-center text-lg-left">
                    <p class="footer-text m-0 col-lg-8 col-md-12"><?php echo wp_kses_post( $copyRight ); ?></p>

                    <?php
                    $footer_social_links = pastelinterior_opt( 'pastelinterior_social_pofile_footer' );
                    if( is_array( $footer_social_links ) && count( $footer_social_links ) > 0 ){
                        echo '<div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">';
                        foreach ( $footer_social_links as $link ){
                            echo '<a href="'. esc_url( $link['social_url'] ) .'"><i class="'. esc_attr( $link['social_icon'] ) .'"></i></a>';
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </footer>
    </div>
    <?php wp_footer(); ?>
    </body>
</html>