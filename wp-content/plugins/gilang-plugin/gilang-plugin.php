<?php
/*
Plugin Name: Gilang Simple Plugin
Description: Just another testing plugin for study
Version: 1.0.0
Author: Made Gilang Aditya
Author URI: https://mdgilangaditya.com
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: gilang
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// add custom footer text
function wpplugin_custom_admin_footer( $footer ) {

  $new_footer = esc_html( get_option('gilang_plugin_option') );
  return $new_footer;

}
add_filter( 'admin_footer_text', 'wpplugin_custom_admin_footer', 10, 1 );

// Add a link to your settings page in your plugin
function wpplugin_add_settings_link( $links ){
    $settings_link = '<a href="admin.php?page=gilang">' . __( 'Settings', 'gilang' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}

$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'wpplugin_add_settings_link' );

// enque CSS file for plugin
define ( 'GILANG_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// define plugin directory
define ( 'GILANG_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Create Settings fields
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-settings-field.php' );

// Include Plugin Options
// include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-options.php' );

// Include CSS filepath
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-styles.php' );

// Include Menus settings file path
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-menus.php' );

// Include JS filepath
include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-scripts.php' );





