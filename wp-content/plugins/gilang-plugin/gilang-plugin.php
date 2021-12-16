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

function gilang_settings_page(){
    add_menu_page( 
        'Gilang Simple Plugin',
        'Gilang Plugin',
        'manage_options',
        'gilang',
        'gilang_settings_page_markup',
        'dashicons-wordpress-alt',
        100
    );

    add_submenu_page( 
        'gilang',
        __( 'Plugin Feature 1', 'gilang' ),
        __( 'Feature 1', 'gilang' ),
        'manage_options',
        'gilang-feature-1',
        'gilang_settings_subpage_markup'
    );

    add_submenu_page( 
        'gilang',
        __( 'Plugin Feature 2', 'gilang' ),
        __( 'Feature 2', 'gilang' ),
        'manage_options',
        'gilang-feature-2',
        'gilang_settings_subpage_markup'
    );
}
add_action( 'admin_menu', 'gilang_settings_page' );

function gilang_settings_page_markup(){
    // Double check user capabilities
    if( !current_user_can( 'manage_options' ) ){
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( get_admin_page_title(  ) ); ?></h1>
        <p><?php esc_html_e( 'Some Content' ); ?></p>
    </div>
    <?php

}

function gilang_settings_subpage_markup(){
    // Double check user capabilities
    if( !current_user_can( 'manage_options' ) ){
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( get_admin_page_title(  ) ); ?></h1>
        <p><?php esc_html_e( 'Some Content' ); ?></p>
    </div>
    <?php

}

function default_function_sub_pages(){
    /** 
     * Can add page as submenu using the following:
     * add_dashboard_page()
     * add_posts_page()
     * add_media_page()
     * add_pages_page()
     * add_comments_page()
     * add_theme_page()
     * add_plugins_page()
     * add_users_page()
     * add_management_page()
     * add_option_page()
    */

    add_dashboard_page( 
        __( 'Custom Feature', 'gilang' ),
        __( 'Custom Feature Menu', 'gilang' ),
        'manage_options',
        'gilang-custom-feature',
        'gilang_settings_subpage_markup'
    );

    add_submenu_page( 
        'tools.php',
        __( 'Plugin Feature into tools', 'gilang' ),
        __( 'Tools Feature', 'gilang' ),
        'manage_options',
        'gilang-feature-tools',
        'gilang_settings_subpage_markup'
    );
}
add_action( 'admin_menu', 'default_function_sub_pages' );

// add custom footer text
function wpplugin_custom_admin_footer( $footer ) {

  $new_footer = str_replace( '.</span>', __(' and <a href="https://mdgilangaditya.com">Made Gilang Aditya</a>.</span>', 'gilang' ), $footer);
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

include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-styles.php' );

include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-menus.php' );

