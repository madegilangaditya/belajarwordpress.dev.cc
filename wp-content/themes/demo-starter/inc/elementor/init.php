<?php 
/**
 * Register New Category Widget for Elementor
 */
function add_elementor_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
        'extends-widget',
        [
            'title' => __( 'Extends Custom Widget', 'demo-starter' ),
            'icon' => 'fa fa-plug'
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

class Extends_Custom_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
		require_once( 'extends_testimonial_carousel/module.php' );
		
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Extends_Testimonial_Carousel_Widget());
	}

}

add_action( 'init', 'extends_elementor_init' );
function extends_elementor_init() {
	Extends_Custom_Elementor_Widgets::get_instance();
}
