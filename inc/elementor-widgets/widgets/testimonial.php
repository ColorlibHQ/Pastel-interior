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
 * Pastelinterior elementor section widget.
 *
 * @since 1.0
 */
class Pastelinterior_Testimonial extends Widget_Base {

	public function get_name() {
		return 'pastelinterior-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'pastel-interior' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'pastelinterior-elements' ];
	}

	protected function _register_controls() {

        // Testimonial Heading
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
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'ABOUT OUR COMPANY', 'pastel-interior' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'pastel-interior' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Some statistics that we want <br> to show our viewers', 'pastel-interior' )

            ]
        );
		$this->end_controls_section();


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'pastel-interior' ),
			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'pastel-interior' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'pastel-interior' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Name', 'pastel-interior' )
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'pastel-interior' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Chief Customer', 'pastel-interior' )
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'pastel-interior' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Also made from. Give may saying meat there from heaven it lights face had is gathered god earth light for life may itself shall whales made they\'re blessed whales also made from give may saying meat. There from heaven it lights face had', 'pastel-interior')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'pastel-interior' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
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


		$this->start_controls_section(
			'style_item',
			[
				'label' => __( 'Style Item', 'pastel-interior' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'testimonial_name_color', [
                'label'     => __( 'Testimonial Name Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1a1d24',
                'selectors' => [
                    '{{WRAPPER}} .testimonial .testimonial-item h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_desc_color', [
                'label'     => __( 'Testimonial Description Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#8f8f8f',
                'selectors' => [
                    '{{WRAPPER}} .testimonial .testimonial-item p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_border_color', [
                'label'     => __( 'Item Border Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#dfdfe1',
                'selectors' => [
                    '{{WRAPPER}} .testimonial .testimonial-item' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_hover_border_color', [
                'label'     => __( 'Item Hover Border Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonial .testimonial-item:after' => 'background: {{VALUE}};',
                ],
            ]
        );
		$this->end_controls_section();


        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'pastel-interior' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'pastel-interior' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'pastel-interior' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial_sec',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
	$title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
	$reviews = !empty( $settings['review_slider'] ) ? $settings['review_slider'] : '';

    ?>
        <section class="testimonial-area">
            <div class="container">
                <div class="area-heading">
                    <?php
                    // Title ==============
                    if( $title ){
                        echo '<p>'. esc_html( $title ) .'</p>';
                    }

                    // Sub Title =============
                    if( $subTitle ){
                        echo '<h3>'. wp_kses_post( $subTitle ) .'</h3>';
                    }
                    ?>
                </div>

                <div class="owl-carousel owl-theme testimonial">
	                <?php
	                if( is_array( $reviews ) && count( $reviews ) > 0 ){
                        foreach ($reviews as $review ) {
                            $aName = !empty( $review['label'] ) ? $review['label'] : '';
                            $desig = !empty( $review['designation'] ) ? $review['designation'] : '';
                            $desc  = !empty( $review['desc'] ) ? $review['desc'] : '';
                            $image = !empty( $review['img']['id'] ) ? wp_get_attachment_image( $review['img']['id'], 'thumbnail', '', array( 'class' => 'testimonial-img' ) ) : '';
                            ?>
                            <div class="testimonial-item">
                                <div class="media">
                                    <div class="media-body">
	                                    <?php
                                        // Description ============
                                        if( $desc ){
                                            echo '<p>'.esc_html( $desc ).'</p>';
                                        }
	                                    // Image ============
	                                    if( $image ){
		                                    echo wp_kses_post( $image );
	                                    }
	                                    // Name ============
	                                    if( $aName ){
		                                    echo '<h4>'.esc_html( $aName ).'</h4>';
	                                    }
	                                    // Designation ============
	                                    if( $desig ){
		                                    echo '<p class="testi-intro">'.esc_html( $desig ).'</p>';
	                                    }
	                                    ?>
                                    </div>
                                </div>
                            </div>
	                        <?php
                        }
	                } ?>
                </div>
            </div>
        </section>
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.testimonial').owlCarousel({
                items: 2,
                loop: true,
                margin: 30,
                autoplayHoverPause: true,
                smartSpeed:500,
                dots: false,
                responsive: {
                    768: {
                        items: 2
                    },
                    320: {
                        items: 1
                    }
                }
            });
            
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
