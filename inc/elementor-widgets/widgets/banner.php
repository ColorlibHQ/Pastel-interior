<?php
namespace Pastelinteriorelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
//use Elementor\Scheme_Color;
//use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Pastelinterior elementor about us section widget.
 *
 * @since 1.0
 */
class Pastelinterior_Banner extends Widget_Base {

	public function get_name() {
		return 'pastelinterior-banner';
	}

	public function get_title() {
		return __( 'Banner', 'pastel-interior' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'pastelinterior-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'pastel-interior' ),
            ]
        );


		$this->add_control(
			'banner_slider', [
				'label' => __( 'Hero Slider', 'pastel-interior' ),
				'type'  => Controls_Manager::REPEATER,
				'title_field' => '{{{ title }}}',
				'fields' => [
					[
						'name'  => 'title',
						'label' => __( 'Title', 'pastel-interior' ),
						'type'  => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => __( 'Here’s the Preview of<br>
                                Interior Design Conference of 2019', 'pastel-interior' )
					],
					[
						'name'  => 'btn_label',
						'label' => __( 'Button Label', 'pastel-interior' ),
						'type'  => Controls_Manager::TEXT,
                        'default'=> esc_html__( 'Learn More About This', 'pastel-interior' )

					],
                    [
                        'name'  => 'btn_url',
                        'label' => __( 'Button URL', 'pastel-interior' ),
                        'type'  => Controls_Manager::URL,

                    ],
                    [
                        'name'  => 'slide_img',
                        'label' => __( 'Slide Background Image', 'pastel-interior' ),
                        'type'  => Controls_Manager::MEDIA,

                    ]
				],
			]
		);

        $this->end_controls_section(); // End content


        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'pastel-interior' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Button Label Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner-content .main_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Button Hover Label Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner-content .main_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label'       => __( 'Button Background Color', 'pastel-interior' ),
                'type'        => Controls_Manager::COLOR,
                'default'     => '',
                'selectors'   => [
                    '{{WRAPPER}} .banner-content .main_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label'     => __( 'Button Hover Background Color', 'pastel-interior' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner-content .main_btn:hover' => 'background-color: {{VALUE}};',
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
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'pastel-interior' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'pastel-interior' ),
                'label_off' => __( 'Hide', 'pastel-interior' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'pastel-interior' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'pastel-interior' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .banner-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
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
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .home_banner_area .banner_inner .overlay',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
	    $this->load_widget_script();
        $settings = $this->get_settings();
        $slider = !empty( $settings['banner_slider'] ) ? $settings['banner_slider'] : '';

        ?>
        <section class="banner-area owl-carousel" id="home">
            <?php
            if( is_array( $slider ) && count( $slider ) > 0 ) {
	            foreach ( $slider as $slide ) {
	                $title = !empty( $slide['title'] ) ? $slide['title'] : '';
		            $btn_label = !empty( $slide['btn_label'] ) ? $slide['btn_label'] : '';
		            $btn_url   = !empty( $slide['btn_url']['url'] ) ? $slide['btn_url']['url'] : '';
		            $bg_image   = !empty( $slide['slide_img']['id'] ) ? 'style="background-image: url( '. wp_get_attachment_image_url( $slide['slide_img']['id'], 'pastelinterior_1920x800', false ) .' )"' : '';

		            ?>
                    <div class="single_slide_banner slide_bg1 d-flex align-items-center" <?php echo $bg_image; ?>>
                        <div class="container">
                            <div class="row">
                                <div class="banner-content col-lg-12 text-center">
                                    <?php
                                    if( $title ){
                                        echo '<h1>'. wp_kses_post( $title ) .'</h1>';
                                    }

                                    if( $btn_label ){
                                        echo '<a href="'. esc_url( $btn_url ) .'" class="main_btn">'. esc_html( $btn_label ) .'</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
		            <?php
	            }
            } ?>
        </section>
        <?php
    }

	public function load_widget_script(){
		if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
			?>
            <script>
                ( function( $ ){

                    $('.banner-area').owlCarousel({
                        items: 1,
                        autoplay: 2500,
                        autoplayTimeout: 5000,
                        loop: true,
                        nav: true,
                        dots: false,
                        navText : ['<i class="fa fa-play"></i>','<i class="fa fa-play"></i>']
                    });

                })(jQuery);
            </script>
			<?php
		}
	}
}
