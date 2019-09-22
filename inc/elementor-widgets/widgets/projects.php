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
 * elementor projects section widget.
 *
 * @since 1.0
 */
class Pastelinterior_projects extends Widget_Base {

	public function get_name() {
		return 'pastelinterior-projects';
	}

	public function get_title() {
		return __( 'Projects', 'pastel-interior' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'pastelinterior-elements' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'pastel-interior' ),
			]
		);
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Title', 'pastel-interior' ),
                'description'   => __( "Use < span> tag for color italic word", "pastelinterior" ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'ABOUT OUR COMPANY', 'pastel-interior' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'pastel-interior' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Some statistics that we want <br>to show our viewers.', 'pastel-interior' )
                                
            ]
        );
		$this->end_controls_section(); 


        // ----------------------------------------  Projects Content ------------------------------
        $this->start_controls_section(
            'project_sec',
            [
                'label' => __( 'Projects', 'pastel-interior' ),
            ]
        );
		$this->add_control(
			'projects', [
				'label' => __( 'Create Project Item', 'pastel-interior' ) ,
				'type'  => Controls_Manager::REPEATER,
				'title_field' => '{{{ title }}}',
				'fields' => [
					[
						'name'  => 'title',
						'label' => __( 'Title', 'pastel-interior' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Name', 'pastel-interior' )
					],
					[
						'name'  => 'tag',
						'label' => __( 'Tag', 'pastel-interior' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Interior Structure', 'pastel-interior' )
					],
					[
						'name'      => 'video_url',
						'label'     => __( 'YouTube Video URL', 'pastel-interior' ),
						'type'      => Controls_Manager::URL,
						'default'   => [
						    'url'   => 'https://www.youtube.com/watch?v=MrRvX5I8PyY'
                        ]
					],
					[
						'name'  => 'img',
						'label' => __( 'Feature Image', 'pastel-interior' ),
						'type'  => Controls_Manager::MEDIA,
					],
					[
						'name'  => 'pro_url',
						'label' => __( 'Project URL', 'pastel-interior' ),
						'type'  => Controls_Manager::URL,
                        'default' => ''
					]
				],
			]
		);
        $this->end_controls_section(); // End projects content

        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Category', 'pastel-interior' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sec_title_color', [
                'label'     => __( 'Section Title Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .area-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_subtitle_color', [
                'label'     => __( 'Section Sub Title Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .area-heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Tag Title Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#262533',
                'selectors' => [
                    '{{WRAPPER}} .portfolio_area .filters ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cat_title_hover', [
                'label'     => __( 'Category Item Hover Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .portfolio_area .filters ul li:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'active_cat_title_color', [
                'label'     => __( 'Active Category Title Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .portfolio_area .filters ul li.active' => 'color: {{VALUE}};',
                ],
            ]
        );
        

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    $secTitle = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    $projects = !empty( $settings['projects'] ) ? $settings['projects'] : '';
    ?>
        <section class="portfolio_area">
            <div class="container-fluid">
                <div class="area-heading">
                    <?php
                    if( $secTitle ){
                        echo '<p>'. esc_html( $secTitle ) .'</p>';
                    }
                    if( $subTitle ){
                        echo '<h3>'. wp_kses_post( $subTitle ) .'</h3>';
                    }
                    ?>
                </div>
                <div class="row no-gutters">
                    <?php
                    if( is_array( $projects ) && count( $projects ) > 0 ){
                        foreach ( $projects as $project ){
                            $pro_title = !empty( $project['title'] ) ? $project['title'] : '';
                            $pro_tag   = !empty( $project['tag'] ) ? $project['tag'] : '';
                            $video_url = !empty( $project['video_url']['url'] ) ? $project['video_url']['url'] : '';
                            $pro_url   = !empty( $project['pro_url']['url'] ) ? $project['pro_url']['url'] : '';
                            $feature_img = !empty( $project['img']['id'] ) ? wp_get_attachment_image( $project['img']['id'], 'project_430x580' ) : '';
                            ?>
                            <div class="col-md-6 col-xl-3">
                                <div class="single-portfolio">
                                    <?php
                                    if( $feature_img ){
                                        echo wp_kses_post( $feature_img );
                                    }
                                    ?>
                                    <div class="short_info">
                                        <?php
                                        if( $pro_tag ){
                                            echo '<h4>'. esc_html( $pro_tag ) .'</h4>';
                                        }
                                        ?>
                                        <div class="video-icon">
                                            <?php
                                            if( $video_url ){
                                                echo '<a class="play-video video-play-button animate" href="'. esc_url( $video_url ) .'" style="background-image: url('. PASTELINTERIOR_DIR_IMG .'pattern_bg_3.png)" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s"><img src="'.PASTELINTERIOR_DIR_IMG.'arrow.png" alt=""></a>';
                                            }

                                            if( $pro_title ){
                                                echo '<p><a href="'. esc_url( $pro_url ) .'">'. wp_kses_post( $pro_title ) .'</a></p>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </section>

    <?php

    }
}
