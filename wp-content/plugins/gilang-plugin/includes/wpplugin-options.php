<?php

// Function to learning how to add options
// SQL Query : SELECT * FROM wp_options WHERE option_name = "gilang_plugin_option";
function gilang_plugin_options(){

    if( !get_option( 'gilang_plugin_option' ) ){
        add_option( 'gilang_plugin_option', 'My plugins options' );
    }
    
    update_option( 'gilang_plugin_option', 'My Updated plugins options' );
    //delete_option( 'gilang_plugin_option' );

}
add_action( 'admin_init', 'gilang_plugin_options' );