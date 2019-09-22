<?php
namespace Pastelinteriorelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Pastelinterior elementor few words section widget.
 *
 * @since 1.0
 */

class Pastelinterior_Blog extends Widget_Base {

	public function get_name() {
		return 'pastelinterior-blog';
	}

	public function get_title() {
		return __( 'Blog', 'pastel-interior' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'pastelinterior-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Latest Blog Post', 'pastel-interior' ),
            ]
        );
		$this->add_control(
			'sec_title',
			[
				'label'         => esc_html__( 'Title', 'pastel-interior' ),
				'description'   => __( "Use < span> tag for color and italic word", "pastelinterior" ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__( 'Our Recent News', 'pastel-interior' )
			]
		);
		$this->add_control(
			'sec_subtitle', [
				'label'         => esc_html__( 'Sub Title', 'pastel-interior' ),
				'type'          => Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'default'       => __( 'Some statistics that we want <br>to show our viewers.', 'pastel-interior' )

			]
		);
        $this->add_control(
            'blog_limit',
            [
                'label'     => esc_html__( 'Post Limit', 'pastel-interior' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 10,
                'step'      => 1,
                'default'   => 3
            ]
        );

        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'pastel-interior' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .area-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#262533',
                'selectors' => [
                    '{{WRAPPER}} .area-heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style text ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'pastel-interior' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_blogtitle', [
                'label'     => __( 'Blog Title Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-blog h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtitlehov', [
                'label'     => __( 'Blog Title Hover Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-blog:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'blog_meta_color', [
                'label'     => __( 'Blog Meta Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-blog .meta-top a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings  = $this->get_settings();
    $post_num  = !empty( $settings['blog_limit'] ) ? $settings['blog_limit'] : '3';
    $title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    ?>

    <section class="blog-area area-padding-bottom">
        <div class="container">
            <div class="area-heading">
	            <?php
	            if( $title ){
		            echo '<p>'. esc_html( $title ) .'</p>';
	            }
	            if( $subTitle ){
		            echo '<h3>'. wp_kses_post( $subTitle ) .'</h3>';
	            }
	            ?>
            </div>

            <div class="row">
                <?php
                if( function_exists( 'pastelinterior_latest_blog' ) ) {
	                pastelinterior_latest_blog( $post_num );
                }
                ?>
            </div>
        </div>
    </section>
    <?php
	}
}
