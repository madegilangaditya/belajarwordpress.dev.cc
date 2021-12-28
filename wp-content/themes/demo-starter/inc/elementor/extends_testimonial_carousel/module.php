<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



class Extends_Testimonial_Carousel_Widget extends Widget_Base {

    public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );

		wp_register_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', [ 'elementor-frontend' ], '1.8.1', true );
		wp_register_script( 'image-carousel-script', get_stylesheet_directory_uri() . '/inc/elementor/extends_testimonial_carousel/js/script.js', array( 'jquery' ), _S_VERSION, true );

		wp_register_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css' );
		wp_register_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css' );
	}

    public function get_script_depends() {
		return [ 'slick', 'image-carousel-script' ];
	}

	public function get_style_depends() {
		return [ 'slick', 'slick-theme' ];
	}

	public function get_name() {
		return 'extends_testimonial_carousel';
	}

	public function get_title() {
		return __( 'Extends Testimonial Carousel', 'demo-starter' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'extends-widget' ];
	}

    protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'demo-starter' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'testi_content', [
                    'label' => __( 'Content', 'demo-starter' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'default' => esc_html__( 'Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae facere aperiam sequi optio lacinia id ipsum non velit, culpa. voluptate rem ullam dolore nisi est quasi, doloribus tempora.', 'demo-starter' ),
                    'placeholder' => esc_html__( 'Type your content here', 'demo-starter' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'testi_image',
                [
                    'label' => __( 'Image', 'demo-starter' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ]
                ]
            );

            $repeater->add_control(
                'testi_name', [
                    'label' => __( 'Name', 'demo-starter' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'John Doe' , 'demo-starter' ),
                    'label_block' => false,
                ]
            );

            $repeater->add_control(
                'testi_title', [
                    'label' => __( 'Title', 'demo-starter' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'CEO' , 'demo-starter' ),
                    'label_block' => false,
                ]
            );

            $this->add_control(
                'list',
                [
                    'label' => __( 'Slides', 'demo-starter' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'testi_name' => __( 'Title #1', 'demo-starter' ),
                        ],
                        [
                            'testi_name' => __( 'Title #2', 'demo-starter' ),
                        ],
                    ],
                    'title_field' => '{{{ testi_name }}}',
                ]
            );

            $this->add_control(
                'skin',
                [
                    'label' => __( 'Skin', 'demo-starter' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default' => __( 'Default', 'demo-starter' ),
                        'bubble' => __( 'Bubble', 'demo-starter' ),
                    ],
                    'prefix_class' => 'extends-testimonial--skin-',
                    'render_type' => 'template',
                ]
            );

            $this->add_control(
                'layout',
                [
                    'label' => __( 'Layout', 'demo-starter' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'image_inline',
                    'options' => [
                        'image_inline' => __( 'Image Inline', 'demo-starter' ),
                        'image_stacked' => __( 'Image Stacked', 'demo-starter' ),
                        'image_above' => __( 'Image Above', 'demo-starter' ),
                        'image_left' => __( 'Image Left', 'demo-starter' ),
                        'image_right' => __( 'Image Right', 'demo-starter' ),
                    ],
                    'prefix_class' => 'extends-testimonial--layout-',
                    'render_type' => 'template',
                ]
            );

            $this->add_responsive_control(
                'alignment',
                [
                    'label' => __( 'Alignment', 'demo-starter' ),
                    'type' => Controls_Manager::CHOOSE,
                    'default' => 'center',
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'demo-starter' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'demo-starter' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'demo-starter' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'prefix_class' => 'extends-testimonial--align-',
                ]
            );
    

		$this->end_controls_section();

		// Image Style
        $this->start_controls_section(
			'image_style_section',
			[
				'label' => __( 'Image', 'demo-starter' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_responsive_control(
                'image_width',
                [
                    'label' => __( 'Width', 'demo-starter' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 400,
                    ],
                    'selectors' => [
                        
                        '{{WRAPPER}} .zoie-carousel__item' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'image_height',
                [
                    'label' => __( 'Height', 'demo-starter' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 400,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .zoie-image__carousel img' => 'height: {{SIZE}}{{UNIT}}; object-fit: cover;',
                    ],
                ]
            );

			$this->add_responsive_control(
				'image_spacing',
				[
					'label' => __( 'Spacing', 'demo-starter' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .zoie-carousel__item' => 'margin: 0 {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

        // Style Carousel Text
        $this->start_controls_section(
			'text_style_section',
			[
				'label' => __( 'Carousel Text', 'demo-starter' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'text_title_color',
                [
                    'label' => __( 'Text Title Color', 'demo-starter' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .zoie-carousel__text-content' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'carousel_text_typography',
                    'label' => __( 'Typography', 'demo-starter' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .zoie-carousel__text-content',
                ]
            );

            $this->add_control(
                'text_badge_color',
                [
                    'label' => __( 'Text Badge Color', 'demo-starter' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .zoie-carousel__text-content span' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'carousel_badge_typography',
                    'label' => __( 'Typography', 'demo-starter' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .zoie-carousel__text-content span',
                ]
            );

            $this->add_control(
                'text_box_color',
                [
                    'label' => __( 'Background Color', 'demo-starter' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .zoie-carousel__text-content' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'box_padding',
                [
                    'label' => __( 'Text Box Padding', 'demo-starter' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .zoie-carousel__text-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if( $settings['list'] ):

			echo '<div class="extends-testimonial__carousel" data-slide="2">';

				foreach ( $settings['list'] as $item ):?>
                    <div class="extends-testimonial__item elementor-repeater-item-<?php echo $item['_id']; ?> ">
                        <div class="extends-testimonial__content">
                            <div class="extends-testimonial__text">
                                <span class="fa fa-quote-left"></span>
                                <?php echo $item['testi_content']; ?>
                            </div>
                        </div>

                        <div class="extends-testimonial__footer">
                            <?php if ( $item['testi_image']['url'] ) : ?>
                                <div class="extends-testimonial__image">
                                    <img src="<?php echo $item['testi_image']['url']; ?>">
                                </div>
                            <?php endif; ?>
                            <cite class="extends-testimonial__cite">
                                <?php
                                    $html= '';
                                    if ( ! empty( $item['testi_name'] ) ) {
                                        $html .= '<span class="extends-testimonial__name">' . $item['testi_name'] . '</span>';
                                    }
                                    if ( ! empty( $item['testi_title'] ) ) {
                                        $html .= '<span class="extends-testimonial__title">' . $item['testi_title'] . '</span>';
                                    }
                                    echo $html;
                                ?>
                            </cite>
                        </div>
                        
                            
                        
                    </div>
				<?php endforeach;

			echo '</div>';
			
		endif;
	}

}