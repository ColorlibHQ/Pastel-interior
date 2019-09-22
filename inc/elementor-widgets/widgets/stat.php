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
 * pastelinterior elementor about page section widget.
 *
 * @since 1.0
 */
class Pastelinterior_Stat extends Widget_Base {

    public function get_name() {
        return 'pastelinterior-stat';
    }

    public function get_title() {
        return __( 'Stat', 'pastel-interior' );
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_categories() {
        return [ 'pastelinterior-elements' ];
    }

    protected function _register_controls() {


        // ----------------------------------------  Section Title  ------------------------------
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

	    $this->start_controls_section(
		    'stat_item',
		    [
			    'label' => __( 'Stat Counter', 'pastel-interior' ),
		    ]
	    );
	    $this->add_control(
		    'statistics', [
			    'label' => __( 'Statistics', 'pastel-interior' ),
			    'type'  => Controls_Manager::REPEATER,
			    'title_field' => '{{{ label }}}',
			    'fields' => [
				    [
					    'name'  => 'label',
					    'label' => __( 'Title', 'pastel-interior' ),
					    'type'  => Controls_Manager::TEXT,
					    'label_block' => true,
					    'default' => esc_html__( 'Projects done', 'pastel-interior' )
				    ],
				    [
					    'name'  => 'count_number',
					    'label' => __( 'Counter Number', 'pastel-interior' ),
					    'type'  => Controls_Manager::TEXT,
					    'label_block' => true,
					    'default' => esc_html__( '280', 'pastel-interior' )
				    ],
				    [
				        'name'    => 'icon_type',
                        'label'   => __( 'Select Icon Type', 'pastel-interior' ),
                        'type'    => Controls_Manager::SELECT,
                        'options' => [
                            'img_icon'  => 'Image Icon',
                            'font_icon' => 'Font Icon'
                        ],
                        'default'  => 'img_icon'
                    ],
				    [
					    'name'  => 'img',
					    'label' => __( 'Image Icon', 'pastel-interior' ),
					    'type'  => Controls_Manager::MEDIA,
                        'condition' => [
                            'icon_type' => 'img_icon'
                        ]
				    ],
				    [
					    'name'  => 'icon',
					    'label' => __( 'Font Icon', 'pastel-interior' ),
					    'type'  => Controls_Manager::ICON,
                        'condition' => [
                            'icon_type' => 'font_icon'
                        ]
				    ]
			    ],
		    ]
	    );
	    $this->end_controls_section();

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
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .area-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_tcolor', [
                'label'     => __( 'Sub Title Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#262533',
                'selectors' => [
                    '{{WRAPPER}} .area-heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_border', [
                'label'     => __( 'Item Border Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#eee',
                'selectors' => [
                    '{{WRAPPER}} .single-number' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_hover_border', [
                'label'     => __( 'Item Hover Border Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-number:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


	    $this->start_controls_section(
		    'background_style', [
			    'label' => __( 'Style Content Background', 'pastel-interior' ),
			    'tab' => Controls_Manager::TAB_STYLE,
		    ]
	    );
	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			    'name' => 'sectionbg',
			    'label' => __( 'Background', 'pastel-interior' ),
			    'types' => [ 'classic' ],
			    'selector' => '{{WRAPPER}} .number_area',
		    ]
	    );
        $this->end_controls_section();


    }

    protected function render() {

    $settings  = $this->get_settings();
    $secTitle = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    $statistics = !empty( $settings['statistics'] ) ? $settings['statistics'] : '';

    ?>

        <section class="number_area ">
            <div class="container">
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
                <div class="row">
                    <?php
                    if( is_array( $statistics ) && count( $statistics ) > 0 ){
                        foreach ( $statistics as $statistic ){
                            $image   = !empty( $statistic['img']['id'] ) ? wp_get_attachment_image( $statistic['img']['id'], 'pastelinterior_60x60' ) : '';
                            $cNumber = !empty( $statistic['count_number'] ) ? $statistic['count_number'] : '';
                            $title   = !empty( $statistic['label'] ) ? $statistic['label'] : '';
                            ?>
                            <div class="col-md-6 col-xl-3">
                                <div class="single-number d-flex">
                                    <div class="icon">
                                        <?php
                                        // Image ===============
                                        if( $image ){
                                            echo wp_kses_post( $image );
                                        }
                                        ?>
                                    </div>
                                    <div class="inner-box">
                                        <?php
                                        // Counter Number ========
                                        if( $cNumber ){
                                            echo '<h6><span class="counter">'. esc_html( $cNumber ) .'</span>+</h6>';
                                        }
                                        // Title ================
                                        if( $title ){
                                            echo '<p>'. esc_html( $title ) .'</p>';
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
