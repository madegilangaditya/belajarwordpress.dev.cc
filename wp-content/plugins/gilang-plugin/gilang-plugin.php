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

function wpplugin_custom_admin_footer( $footer ) {

  $new_footer = str_replace( '.</span>', __(' and <a href="https://mdgilangaditya.com">Made Gilang Aditya</a>.</span>', 'gilang' ), $footer);
  return $new_footer;

}
add_filter( 'admin_footer_text', 'wpplugin_custom_admin_footer', 10, 1 );

