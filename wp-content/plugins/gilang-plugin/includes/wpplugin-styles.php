<?php

// // Load CSS on all admin Pages
// function wpplugin_admin_styles(){
//     wp_enqueue_style( 
//         'gilang_plugin_admin',
//         GILANG_PLUGIN_URL . 'css/wpplugin-admin-style.css',
//         [],
//         time() 
//     );
// }
// add_action( 'admin_enqueue_scripts', 'wpplugin_admin_styles' );

// // Load CSS on front style
// function wpplugin_frontend_styles(){
//     wp_enqueue_style( 
//         'gilang_plugin_frontend',
//         GILANG_PLUGIN_URL . 'css/wpplugin-frontend-style.css',
//         [],
//         time() 
//     );
// }
// add_action( 'wp_enqueue_scripts', 'wpplugin_frontend_styles', 100 );

// Load CSS conditionally on only plugin admin Pages
function wpplugin_admin_styles( $hook ){
    wp_register_style( 
        'gilang_plugin_admin',
        GILANG_PLUGIN_URL . 'css/wpplugin-admin-style.css',
        [],
        time() 
    );

    if('toplevel_page_gilang' == $hook){
        wp_enqueue_style( 'gilang_plugin_admin' );
    }
}
add_action( 'admin_enqueue_scripts', 'wpplugin_admin_styles' );

// Load CSS conditionally on single page front style
function wpplugin_frontend_styles(){
    wp_register_style( 
        'gilang_plugin_frontend',
        GILANG_PLUGIN_URL . 'css/wpplugin-frontend-style.css',
        [],
        time() 
    );

    if(is_single(  )){
        wp_enqueue_style( 'gilang_plugin_frontend' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpplugin_frontend_styles', 100 );