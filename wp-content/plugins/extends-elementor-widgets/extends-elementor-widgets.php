<?php
/**
 * Plugin Name: Extends Elementor Widgets
 * Description: List widget for Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Made Gilang Aditya
 * Author URI:  https://mdgilangaditya.com
 * Text Domain: extends-elementor-widgets
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'EXTENDS_ELE_WIDGETS__FILE__', __FILE__ );
define( 'EXTENDS_ELE_WIDGETS_PLUGIN_BASE', plugin_basename( EXTENDS_ELE_WIDGETS__FILE__ ) );
define( 'EXTENDS_ELE_WIDGETS_PATH', plugin_dir_path( EXTENDS_ELE_WIDGETS__FILE__ ) );
// define( 'EXTENDS_ELE_WIDGETS_ASSETS_PATH', EXTENDS_ELE_WIDGETS_PATH . 'assets/' );
define( 'EXTENDS_ELE_WIDGETS_MODULES_PATH', EXTENDS_ELE_WIDGETS_PATH . 'widgets/' );
define( 'EXTENDS_ELE_WIDGETS_URL', plugins_url( '/', EXTENDS_ELE_WIDGETS__FILE__ ) );
// define( 'EXTENDS_ELE_WIDGETS_ASSETS_URL', EXTENDS_ELE_WIDGETS_URL . 'assets/' );
define( 'EXTENDS_ELE_WIDGETS_MODULES_URL', EXTENDS_ELE_WIDGETS_URL . 'widgets/' );

/**
 * Register New Category Widget for Elementor
 */
function add_extends_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
        'extends-widgets',
        [
            'title' => __( 'Extends Widgets', 'extends-elementor-widgets' ),
            'icon' => 'fa fa-plug'
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'add_extends_widget_categories' );

/**
 * Register List Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_list_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/posts/blog-posts.php' );

	$widgets_manager->register( new \Extends_Posts_Widget() );

}
add_action( 'elementor/widgets/register', 'register_list_widget' );