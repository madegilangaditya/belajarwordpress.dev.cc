<?php
namespace Elementor;



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



class Extends_Testimonial_Carousel_Widget extends Widget_Base {

    public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );

        // Load JS swiper
        wp_register_script( 'swiper', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', [ 'elementor-frontend' ], _S_VERSION, true );
		wp_register_script( 'image-carousel-script', get_stylesheet_directory_uri() . '/inc/elementor/extends_testimonial_carousel/js/script.js', array( 'jquery' ), _S_VERSION, true );

        // load style CSS
        wp_enqueue_style( 'carousel-style', get_stylesheet_directory_uri(  ) . '/inc/elementor/extends_testimonial_carousel/css/style.css', array(), _S_VERSION );
	}

    public function get_script_depends() {
		return [ 'swiper', 'image-carousel-script' ];
	}

	public function get_style_depends() {
		return [ 'carousel-style' ];
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

            $slides_per_view = range( 1, 10 );
		    $slides_per_view = array_combine( $slides_per_view, $slides_per_view );

            $this->add_control(
                'slides_per_view',
                [
                    'type' => Controls_Manager::SELECT,
                    'label' => __( 'Slides Per View', 'demo-starter' ),
                    'options' => [  ] + $slides_per_view,
                    'default' => 2,
                    'frontend_available' => true,
                ]
                
            );

            $this->add_control(
                
                'slides_to_scroll',
                [
                    'type' => Controls_Manager::SELECT,
                    'label' => __( 'Slides to Scroll', 'demo-starter' ),
                    'description' => __( 'Set how many slides are scrolled per swipe.', 'demo-starter' ),
                    'options' => [ ] + $slides_per_view,
                    'default' => 2,
                    'frontend_available' => true,
                ]
            );
    

		$this->end_controls_section();

        // add additional settings
        $this->start_controls_section(
			'section_additional_options',
			[
				'label' => __( 'Additional Options', 'demo-starter' ),
			]
		);

		$this->add_control(
			'show_arrows',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Arrows', 'demo-starter' ),
				'default' => 'yes',
				'label_off' => __( 'Hide', 'demo-starter' ),
				'label_on' => __( 'Show', 'demo-starter' ),
				'prefix_class' => 'elementor-arrows-',
				'render_type' => 'template',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'pagination',
			[
				'label' => __( 'Pagination', 'demo-starter' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bullets',
				'options' => [
					'' => __( 'None', 'demo-starter' ),
					'bullets' => __( 'Dots', 'demo-starter' ),
					'fraction' => __( 'Fraction', 'demo-starter' ),
					'progressbar' => __( 'Progress', 'demo-starter' ),
				],
				'prefix_class' => 'elementor-pagination-type-',
				'render_type' => 'template',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => __( 'Transition Duration', 'demo-starter' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 500,
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'demo-starter' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
				'render_type' => 'template',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label' => __( 'Autoplay Speed', 'demo-starter' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => __( 'Infinite Loop', 'demo-starter' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label' => __( 'Pause on Hover', 'demo-starter' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'autoplay' => 'yes',
				],
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'pause_on_interaction',
			[
				'label' => __( 'Pause on Interaction', 'demo-starter' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'autoplay' => 'yes',
				],
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->end_controls_section();

        // Style section
        $this->start_controls_section(
			'section_slides_style',
			[
				'label' => __( 'Slides', 'demo-starter' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$space_between_config = [
			'label' => __( 'Space Between', 'demo-starter' ),
			'type' => Controls_Manager::SLIDER,
			'range' => [
				'px' => [
					'max' => 50,
				],
			],
			'render_type' => 'template',
			'frontend_available' => true,
		];

		// TODO: Once Core 3.4.0 is out, get the active devices using Breakpoints/Manager::get_active_devices_list().
		$active_breakpoint_instances = \Elementor\Core\Breakpoints\Manager::get_active_devices_list();
		// Devices need to be ordered from largest to smallest.
		$active_devices = array_reverse( array_keys( $active_breakpoint_instances ) );

		// Add desktop in the correct position.
		if ( in_array( 'widescreen', $active_devices, true ) ) {
			$active_devices = array_merge( array_slice( $active_devices, 0, 1 ), [ 'desktop' ], array_slice( $active_devices, 1 ) );
		} else {
			$active_devices = array_merge( [ 'desktop' ], $active_devices );
		}

		foreach ( $active_devices as $active_device ) {
			$space_between_config[ $active_device . '_default' ] = [
				'size' => 10,
			];
		}

		$this->add_responsive_control(
			'space_between',
			$space_between_config
		);

		$this->add_control(
			'slide_background_color',
			[
				'label' => __( 'Background Color', 'demo-starter' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-main-swiper .swiper-slide' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'slide_border_size',
			[
				'label' => __( 'Border Size', 'demo-starter' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .elementor-main-swiper .swiper-slide' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'slide_border_radius',
			[
				'label' => __( 'Border Radius', 'demo-starter' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'%' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-main-swiper .swiper-slide' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'slide_border_color',
			[
				'label' => __( 'Border Color', 'demo-starter' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-main-swiper .swiper-slide' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'slide_padding',
			[
				'label' => __( 'Padding', 'demo-starter' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-main-swiper .swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_navigation',
			[
				'label' => __( 'Navigation', 'demo-starter' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_arrows',
			[
				'label' => __( 'Arrows', 'demo-starter' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);

		$this->add_control(
			'arrows_size',
			[
				'label' => __( 'Size', 'demo-starter' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-swiper-button' => 'font-size: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'arrows_color',
			[
				'label' => __( 'Color', 'demo-starter' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-swiper-button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .elementor-swiper-button svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'heading_pagination',
			[
				'label' => __( 'Pagination', 'demo-starter' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'pagination!' => '',
				],
			]
		);

		$this->add_control(
			'pagination_position',
			[
				'label' => __( 'Position', 'demo-starter' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'outside',
				'options' => [
					'outside' => __( 'Outside', 'demo-starter' ),
					'inside' => __( 'Inside', 'demo-starter' ),
				],
				'prefix_class' => 'elementor-pagination-position-',
				'condition' => [
					'pagination!' => '',
				],
			]
		);

		$this->add_control(
			'pagination_size',
			[
				'label' => __( 'Size', 'demo-starter' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .swiper-container-horizontal .swiper-pagination-progressbar' => 'height: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .swiper-pagination-fraction' => 'font-size: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'pagination!' => '',
				],
			]
		);

		$this->add_control(
			'pagination_color',
			[
				'label' => __( 'Color', 'demo-starter' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet-active, {{WRAPPER}} .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .swiper-pagination-fraction' => 'color: {{VALUE}}',
				],
				'condition' => [
					'pagination!' => '',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        
        echo '<input type="hidden" id="slide-per-view" value="'.$settings['slides_per_view'].'">';
        echo '<input type="hidden" id="slide-scroll" value="'.$settings['slides_to_scroll'].'">';
        
		if( $settings['list'] ):
            
			//echo '<div class="extends-testimonial__carousel">';
            ?>
            <!-- Slider main container -->
            <div class="extends-testimonial__carousel elementor-swiper" data-slides="<?php echo $settings['slides_per_view']; ?>" data-scroll="<?php echo $settings['slides_to_scroll'] ?>" data-arrows="<?php echo $settings['show_arrows']; ?>" data-pagination="<?php echo $settings['pagination'];?>" data-speed="<?php echo $settings['speed']; ?>" data-autoplay="<?php echo $settings['autoplay']; ?>" data-pausehover="<?php echo $settings['pause_on_hover']; ?>" data-pauseinteraction="<?php echo $settings['pause_on_interaction']; ?>" data-loop="<?php echo $settings['loop']; ?>" data-space="<?php echo $settings['space_between']['size']; ?>">
                <!-- Additional required wrapper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                <?php

				foreach ( $settings['list'] as $item ):?>
                
                
                
                    <!-- Slides -->
                    <div class="swiper-slide" data-swiper-autoplay="<?php echo $settings['autoplay_speed']; ?>">
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
                    </div>
                
                
                
				<?php endforeach;

			echo '</div>';?>
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            <?php
			
		endif;
	}

}