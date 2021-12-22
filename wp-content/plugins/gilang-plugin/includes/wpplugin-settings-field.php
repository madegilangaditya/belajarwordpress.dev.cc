<?php

function wpplugin_settings(){

    // Define at least 1 section
    add_settings_section( 
        // Unique identifier for the section
        'gilang_plugin_settings_section', 

        // Section Title
        __( 'A Plugin Settings Section', 'gilang' ), 

        // Callback for an optional description
        'gilang_plugin_settings_section_callback',
        
        // Admin page to add section into
        'gilang' 
    );
}

add_action( 'admin_init', 'wpplugin_settings' );

function gilang_plugin_settings_section_callback(){
    esc_html_e( 'Plugin settings section description', 'gilang' );
}