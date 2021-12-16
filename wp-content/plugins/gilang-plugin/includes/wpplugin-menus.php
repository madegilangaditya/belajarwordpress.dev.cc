<?php
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

    include ( GILANG_PLUGIN_DIR . 'templates/admin/settings-page.php' );
    ?>
    
    <?php

}

function gilang_settings_subpage_markup(){
    // Double check user capabilities
    if( !current_user_can( 'manage_options' ) ){
        return;
    }

    include ( GILANG_PLUGIN_DIR . 'templates/admin/settings-page.php' );

    ?>
    
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