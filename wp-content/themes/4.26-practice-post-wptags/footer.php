
  </div><!-- #content -->

  <footer id="colophon" class="site-footer" role="contentinfo">
    <?php do_action( 'wphooks_before_footer' ); ?>

    <?php
      $args = [
        // Location pickable in Customizer
        'theme_location'  =>  'footer-menu',
        // Main wrapper around the ul of posts
        'container'       =>  'nav',
        'container_id'    =>  'footer-menu',
        // Add text before link text (outside a tag)
        'before'          =>  '<',
        'after'           =>  '>',
        // Depth of child nav items to show
        'depth'           =>  1,
        // Callback function if menu is not available
        'fallback_cb'     =>  false,
      ];
      wp_nav_menu( $args );
    ?>

    <?php 
      $footer_message = '&copy;' . date( 'Y' ) . ' ' .get_bloginfo( 'name' );
    ?>

    <p><?php echo apply_filters( 'wphooks_footer_message', $footer_message ); ?></p>

    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wptags' ) ); ?>">
      <?php printf( esc_html__( 'Proudly powered by %s', 'wptags' ), 'WordPress' ); ?>
    </a>

  </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
