<?php

// // Load JS on all admin Pages
// function wpplugin_admin_scripts(){
//     wp_enqueue_script( 
//         'gilang_plugin_admin_js',
//         GILANG_PLUGIN_URL . 'js/wpplugin-admin.js',
//         ['jquery'],
//         time() 
//     );
// }
// add_action( 'admin_enqueue_scripts', 'wpplugin_admin_scripts', 100 );

// // Load JS on front style
// function wpplugin_frontend_scripts(){
//     wp_enqueue_script( 
//         'gilang_plugin_frontend_js',
//         GILANG_PLUGIN_URL . 'js/wpplugin-frontend.js',
//         [],
//         time() 
//     );
// }
// add_action( 'wp_enqueue_scripts', 'wpplugin_frontend_scripts', 100 );

// Load JS conditionally on plugin admin Pages
function wpplugin_admin_scripts($hook){
    wp_register_script( 
        'gilang_plugin_admin_js',
        GILANG_PLUGIN_URL . 'js/wpplugin-admin.js',
        ['jquery'],
        time() 
    );

    wp_localize_script( 'gilang_plugin_admin_js', 'gilang', [
        'hook' => $hook
    ] );

    if( 'toplevel_page_gilang' == $hook ){
        wp_enqueue_script('gilang_plugin_admin_js');
    }
}
add_action( 'admin_enqueue_scripts', 'wpplugin_admin_scripts', 100 );

// Load JS on front style
function wpplugin_frontend_scripts(){
    wp_register_script( 
        'gilang_plugin_frontend_js',
        GILANG_PLUGIN_URL . 'js/wpplugin-frontend.js',
        [],
        time() 
    );

    if(is_single(  )){
        wp_enqueue_script( 'gilang_plugin_frontend_js' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpplugin_frontend_scripts', 100 );