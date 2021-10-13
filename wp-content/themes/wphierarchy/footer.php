    <?php wp_footer(); ?>
    
        </div> <!-- #content close -->

        <footer id="colophon" class="site-footer" role="contentinfo">
            <a href="<?php echo esc_url( __( 'https://wordpress.org' , 'wphierarchy' ) ); ?>">
                <?php
                    printf( esc_html__( 'Proudly Powered by %s', 'wphierarchy' ), 'Wordpress' );
                ?>
            </a>
        </footer>
    </div> <!-- .Page close -->
</body>
</html>