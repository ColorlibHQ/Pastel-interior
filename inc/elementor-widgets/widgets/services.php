<?php
namespace Pastelinteriorelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
//use Elementor\Scheme_Color;
//use Elementor\Scheme_Typography;
//use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Pastelinterior elementor Team Member section widget.
 *
 * @since 1.0
 */
class Pastelinterior_Services extends Widget_Base {

	public function get_name() {
		return 'pastelinterior-services';
	}

	public function get_title() {
		return __( 'Services', 'pastel-interior' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'pastelinterior-elements' ];
	}

	protected function _register_controls() {

	    // Section Heading ==============================
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
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__( 'About Our Company', 'pastel-interior' )
			]
		);
		$this->add_control(
			'sec_subtitle', [
				'label'         => esc_html__( 'Sub Title', 'pastel-interior' ),
				'description'   => __( "Use < br> tag for line brake", "pastelinterior" ),
				'type'          => Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'default'       => __( 'Some statistics that we want <br>to show our viewers.', 'pastel-interior' )

			]
		);

		$this->end_controls_section();

		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'pastel-interior' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Training', 'pastel-interior' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'pastel-interior' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Nature Photography', 'pastel-interior' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Descriptions', 'pastel-interior' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'You\'re which creepeth were yielding kind, divide sixten po gatherin all first fill Seed wherein life. Years one fifth', 'pastel-interior' )
                    ],
                    [
                        'name'  => 'select_type',
                        'label' => __( 'Image/Icon', 'pastel-interior' ),
                        'type'  => Controls_Manager::SELECT,
                        'options'=> [
                            'style1' => 'Image Icon',
                            'style2' => 'Font Icon',
                        ],
                        'default'   => 'style2'
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'pastel-interior' ),
                        'type'  => Controls_Manager::MEDIA,
                        'condition' => [
                                'select_type' => 'style1'
                        ]
                    ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Icon', 'pastel-interior' ),
                        'type'  => Controls_Manager::ICON,
                        'options'   => pastelinterior_flaticon_list(),
                        'condition' => [
                                'select_type' => 'style2'
                        ]
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End Services content



        //------------------------------ Style services Box ------------------------------
        $this->start_controls_section(
            'style_trainingbox', [
                'label' => __( 'Style Services Content', 'pastel-interior' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_servicestitle', [
                'label' => __( 'Title Color', 'pastel-interior' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_serviceshovertitle', [
                'label' => __( 'Title Hover Color', 'pastel-interior' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-content:hover h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_servicesdescription', [
                'label' => __( 'Description Color', 'pastel-interior' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_border', [
                'label' => __( 'Service Hover Border Color', 'pastel-interior' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'pastel-interior' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_type',
            [
                'label'     => __( 'Background Type', 'pastel-interior' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'light' => esc_html__( 'Light', 'pastel-interior' ),
                    'dark'  => esc_html__( 'Dark', 'pastel-interior' )
                ],
                'default'   => 'dark'
            ]
        );
		$this->add_control(
			'background_color', [
				'label' => __( 'Background Color', 'pastel-interior' ),
				'type'  => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-area' => 'background: {{VALUE}};',
				],
                'condition' => [
                    'bg_type' => 'dark'
                ]
			]
		);
        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $services = !empty( $settings['services_content'] ) ? $settings['services_content'] : '';
    $secTitle   = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle   = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';

    $bg_color_class = $settings['bg_type'] == 'light' ? 'light-version' : '';
    ?>

    <section class="service-area area-padding <?php echo esc_attr( $bg_color_class ) ?>">
        <div class="container">
            <?php
            if( $secTitle || $subTitle ) {
	            ?>
                <div class="area-heading">
		            <?php
		            // Section Title==============
		            if ( $secTitle ) {
			            echo '<p>' . esc_html( $secTitle ) . '</p>';
		            }

		            //Section Sub Title =====================
		            if ( $subTitle ) {
			            echo '<h3>' . wp_kses_post( $subTitle ) . '</h3>';
		            }
		            ?>
                </div>
	            <?php
            } ?>
            <div class="row">
                <?php
                if( is_array( $services ) && count( $services ) > 0 ){
                    foreach ( $services as $service ) {
                        $service_title = !empty( $service['label'] ) ? $service['label'] : '';
                        $service_desc  = !empty( $service['desc'] ) ? $service['desc'] : '';
                        $service_img   = !empty( $service['img']['url'] ) ? $service['img']['url'] : '';
                        $iconType      = $service['select_type'];
                        $fontIcon      = !empty( $service['icon'] ) ? $service['icon'] : '';
                        ?>
                        <div class="col-md-6 col-lg-4 col-xl-4">
                            <div class="single-service">
                                <div class="service-icon">
                                    <?php
                                    if( $iconType == 'style1' && $service_img ){
                                        echo '<img src="'. esc_url( $service_img ) .'" alt="'. esc_html__( 'Service image', 'pastel-interior' ) .'">';
                                    }
                                    elseif ( $iconType == 'style2' && $fontIcon ){
                                        echo '<span class="'. esc_attr( $fontIcon ) .'"></span>';
                                    }
                                    ?>
                                </div>
                                <div class="service-content">
                                    <?php
                                    //Service Title
                                    if( $service_title ){
                                        echo '<h5>'. esc_html( $service_title ) .'</h5>';
                                    }
                                    
                                    // Service Desc
                                    if( $service_desc ){
                                        echo '<p>'. esc_html( $service_desc ) .'</p>';
                                    }
                                    ?>
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
