<?php
namespace Pastelinteriorelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;




// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 *
 * pastelinterior elementor about page section widget.
 *
 * @since 1.0
 */
class Pastelinterior_Video extends Widget_Base {

    public function get_name() {
        return 'pastelinterior-video';
    }

    public function get_title() {
        return __( 'Video', 'pastel-interior' );
    }

    public function get_icon() {
        return 'eicon-play';
    }

    public function get_categories() {
        return [ 'pastelinterior-elements' ];
    }

    protected function _register_controls() {


        // ----------------------------------------  Video  ------------------------------
        
        $this->start_controls_section(
            'video_sec',
            [
                'label' => __( 'Video ', 'pastel-interior' ),
            ]
        );
	    $this->add_control(
		    'video_title',
		    [
			    'label'     => esc_html__( 'Video Title', 'pastel-interior' ),
			    'type'      => Controls_Manager::TEXTAREA,
			    'label_block' => true,
			    'default'   => __('Here’s the Preview of Interior Design Conference of 2019', 'pastel-interior')
		    ]
	    );
	    $this->add_control(
		    'video_url',
		    [
			    'label'     => esc_html__( 'Video URL', 'pastel-interior' ),
			    'type'      => Controls_Manager::URL,
			    'label_block' => true,
			    'default'   => [
			        'url'   => esc_url( 'https://www.youtube.com/watch?v=MrRvX5I8PyY' )
                ]
		    ]
	    );
        $this->end_controls_section(); // End Video Info


        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'pastel-interior' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color', [
                'label'     => __( 'Title Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f9cc41',
                'selectors' => [
                    '{{WRAPPER}} .call_to_action_inner .area-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'bg_overlay_color', [
                'label'     => __( 'Background Overlay Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .video_area_inner::before' => 'background: {{VALUE}};',
                ],
            ]
        );
	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			    'name' => 'video_sec_bg',
			    'label' => __( 'Video Section Background', 'pastel-interior' ),
			    'types' => [ 'classic' ],
			    'selector' => '{{WRAPPER}} .video_area_inner',
		    ]
	    );
        $this->end_controls_section();


    }

    protected function render() {

    $settings  = $this->get_settings();
    $title     = !empty( $settings['video_title'] ) ? $settings['video_title'] : '';
    $video_url = !empty( $settings['video_url']['url'] ) ? $settings['video_url']['url'] : '';

    ?>

        <section class="video_area">
            <div class="video_area_inner">
                <div class="play-icon">
                    <?php
                    // Video URL
                    if( !empty( $video_url ) ){
                        echo '<a '.button_bg() .' class="play-video video-play-button animate" href="'. esc_url( $video_url ) .'" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s"><i class="fa fa-play"></i>
                    </a>';
                    }

                    // Title ============
                    if( $title ){
                        echo '<h5>'. wp_kses_post( $title ) .'</h5>';
                    }
                    ?>
                </div>
            </div>
        </section>

    <?php
    }
}
