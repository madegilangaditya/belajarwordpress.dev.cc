<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="page">

        <a href="#content" class="skip-link screen-reader-text">
            <?php esc_html_e( 'Skip to content', 'wphierarchy' ); ?>
        </a>

        <header id="masthead" class="site-header" role="banner">

            <div class="site-branding">
                <p class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </p>

                <p class="site-description">
                    <?php bloginfo( 'description' ); ?>
                </p>
            </div>

            <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php
                    // Menu config example
                    // $args = [
                    //     'theme_location'  => 'main-menu',
                    //     // Assign default menu to location
                    //     'menu'            => 'Main Menu',
                    //     // Main Wrapper around the ul of posts
                    //     'container'       => 'div',
                    //     'container_class' => 'container-class',
                    //     'container_id'    => 'container-id',
                    //     // Wrapper menu items - default to ul
                    //     'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    //     'menu_class'      => 'items-wrap-class',
                    //     'menu_id'         => 'items-wrap-id',
                    //     // Add text before link text (outside a tag)
                    //     'before'          => '<',
                    //     'after'           => '>',
                    //     // Add text to link text (inside a tag)
                    //     'link_before'     => '{',
                    //     'link_after'      => '}',
                    //     // Menu child to show
                    //     'depth'           => 5,
                    //     // Callback function if menu is not available
                    //     'fallback_cb'     => 'wp_page_menu'  

                    // ];

                    $args = [
                        'theme_location'  => 'main-menu',
                        // Assign default menu to location
                        'menu'            => 'Main Menu'
                    ];
                    wp_nav_menu( $args );
                    ?>
            </nav>

        </header>

        <div id="content" class="site-content">

        

                    