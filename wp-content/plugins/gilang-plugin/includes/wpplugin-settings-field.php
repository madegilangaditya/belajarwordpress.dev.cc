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

    // Add setting input field
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

    // Textarea field
    add_settings_field( 
        'gilang_plugin_settings_textarea',
        __( 'TextArea', 'gilang' ),
        'gilang_plugin_settings_textarea_callback',
        'gilang',
        'gilang_plugin_settings_section'
    );

    // CHeckbox field
    add_settings_field( 
        'gilang_plugin_settings_checkbox',
        __( 'Checkbox', 'gilang' ),
        'gilang_plugin_settings_checkbox_callback',
        'gilang',
        'gilang_plugin_settings_section',
        [
            'label' => 'Checkbox Label'
        ]
    );

    // CHeckbox field
    add_settings_field( 
        'gilang_plugin_settings_checkbox',
        __( 'Checkbox', 'gilang' ),
        'gilang_plugin_settings_checkbox_callback',
        'gilang',
        'gilang_plugin_settings_section',
        [
            'label' => 'Checkbox Label'
        ]
    );

    // Radio field
    add_settings_field( 
        'gilang_plugin_settings_radio',
        __( 'Radio', 'gilang' ),
        'gilang_plugin_settings_radio_callback',
        'gilang',
        'gilang_plugin_settings_section',
        [
            'option_one' => 'Radio 1',
            'option_two' => 'Radio 2'
        ]
    );

    // Dropdown select field
    add_settings_field( 
        'gilang_plugin_settings_select',
        __( 'Select', 'gilang' ),
        'gilang_plugin_settings_select_callback',
        'gilang',
        'gilang_plugin_settings_section',
        [
            'option_one' => 'Select 1',
            'option_two' => 'Select 2',
            'option_three' => 'Select 3',
            'option_four' => 'Select 4'
        ]
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

function gilang_plugin_settings_textarea_callback(){

    $options = get_option( 'wpplugin_settings' );

    $textarea = '';
    if(isset($options['textarea'])){
        $textarea = esc_html( $options['textarea'] );
    }

    echo '<textarea id="gilang_plugin_textarea" name="wpplugin_settings[textarea]"
    rows="5" cols="50">'. $textarea .' </textarea>';
}

function gilang_plugin_settings_checkbox_callback( $args ){

    $options = get_option( 'wpplugin_settings' );

    $checkbox = '';
    if(isset($options['checkbox'])){
        $checkbox = esc_html( $options['checkbox'] );
    }

    $html = '<input type="checkbox" id="gilang_plugin_checkbox" 
    name="wpplugin_settings[checkbox]" value="1"'. checked( 1, $checkbox, false ) . '/>';
    $html .= '&nbsp;';
    $html .= '<label for="gilang_plugin_checkbox">'. $args['label'] .'</label>';

    echo $html;
}

function gilang_plugin_settings_radio_callback( $args ){

    $options = get_option( 'wpplugin_settings' );

    $radio = '';
    if(isset($options['radio'])){
        $radio = esc_html( $options['radio'] );
    }

    $html = '<input type="radio" id="gilang_plugin_radio_one" 
    name="wpplugin_settings[radio]" value="1"'. checked( 1, $radio, false ) . '/>';
    $html .= '<label for="gilang_plugin_radio_one">'. $args['option_one'] .'</label>';
    $html .= '&nbsp;';
    $html .= '<input type="radio" id="gilang_plugin_radio_two" 
    name="wpplugin_settings[radio]" value="2"'. checked( 2, $radio, false ) . '/>';
    $html .= '<label for="gilang_plugin_radio_two">'. $args['option_two'] .'</label>';

    echo $html;
}

function gilang_plugin_settings_select_callback( $args ){

    $options = get_option( 'wpplugin_settings' );

    $select = '';
    if(isset($options['select'])){
        $select = esc_html( $options['select'] );
    }

    $html = '<select id="gilang_plugin_select" name="wpplugin_settings[select]" />';

    $html .= '<option value="option_one"'. selected( $select, 'option_one', false ) .'>'. $args['option_one']. '</option>';
    $html .= '<option value="option_two"'. selected( $select, 'option_two', false ) .'>'. $args['option_two']. '</option>';
    $html .= '<option value="option_three"'. selected( $select, 'option_three', false ) .'>'. $args['option_three']. '</option>';
    $html .= '<option value="option_four"'. selected( $select, 'option_four', false ) .'>'. $args['option_four']. '</option>';

    $html .= '</select>';

    echo $html;
}