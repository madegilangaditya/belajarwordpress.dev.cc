<?php

// Load CSS on all admin Pages
function wpplugin_admin_styles(){
    wp_enqueue_style( 
        'gilang_plugin_admin',
        GILANG_PLUGIN_URL . 'css/wpplugin-admin-style.css',
        [],
        time() 
    );
}
add_action( 'admin_enqueue_scripts', 'wpplugin_admin_styles' );

// Load CSS on front style
function wpplugin_frontend_styles(){
    wp_enqueue_style( 
        'gilang_plugin_frontend',
        GILANG_PLUGIN_URL . 'css/wpplugin-frontend-style.css',
        [],
        time() 
    );
}
add_action( 'wp_enqueue_scripts', 'wpplugin_frontend_styles', 100 );