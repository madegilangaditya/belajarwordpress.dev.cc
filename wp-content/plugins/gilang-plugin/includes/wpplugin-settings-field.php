<?php

function wpplugin_settings(){

    // If plugin settings doesn't exist
    if( !get_option('wpplugin_settings') ){
        add_option( 'wpplugin_settings' );
    }

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

    // Add setting field
    add_settings_field( 
        // Unique identifier for the section
        'gilang_plugin_settings_custom_text', 

        // Field Title
        __( 'Custom Text', 'gilang' ), 

        // Callback for Field Markup
        'gilang_plugin_settings_custom_text_callback',
        
        // Page to go on
        'gilang',

        // Section to go in
        'gilang_plugin_settings_section'
    );

    register_setting( 
        'wpplugin_settings', 
        'wpplugin_settings',  
    );
}

add_action( 'admin_init', 'wpplugin_settings' );

function gilang_plugin_settings_section_callback(){
    esc_html_e( 'Plugin settings section description', 'gilang' );
}

function gilang_plugin_settings_custom_text_callback(){

    $options = get_option( 'wpplugin_settings' );

    $custom_text = '';
    if(isset($options['custom_text'])){
        $custom_text = esc_html( $options['custom_text'] );
    }

    echo '<input type="text" id="gilang_plugin_customtext" name="wpplugin_settings[custom_text]"
    value="'. $custom_text .'" />';
}