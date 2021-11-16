    <?php wp_footer(); ?>
    
        </div> <!-- #content close -->

        <footer id="colophon" class="site-footer" role="contentinfo">
            <?php
                $args = [
                    'theme_location'  => 'footer-menu',

                    // Main Wrapper around the ul of posts
                    'container'       => 'nav',
                    'container_id'    => 'footer-menu',
                    'container_class'    => 'main-navigation',

                    // Add text before link text (outside a tag)
                    'before'          => '<',
                    'after'           => '>',
                    // Menu child to show
                    'depth'           => 1,
                    // Callback function if menu is not available
                    'fallback_cb'     => false, 

                ];

                wp_nav_menu( $args );
            ?>

            &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
            <a href="<?php echo esc_url( __( 'https://wordpress.org' , 'wphierarchy' ) ); ?>">
                <?php
                    printf( esc_html__( 'Proudly Powered by %s', 'wphierarchy' ), 'Wordpress' );
                ?>
            </a>

        </footer>
    </div> <!-- .Page close -->
</body>
</html>