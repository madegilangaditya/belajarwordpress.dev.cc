<?php
    if( ! is_active_sidebar( 'main-sidebar' )){
        return;
    }
?>

<div id="secondary" class="widget-area" role="complementary">

    <?php if( !is_user_logged_in(  ) ): ?>

        <?php wp_login_form( ); ?>

    <?php else: ?>
        <p>
            <a href="<?php echo wp_logout_url( get_the_permalink() ); ?>" class="button">
                <?php _e( 'Logout','wphierarchy' ); ?>
            </a>
        </p>
    
    <?php endif; ?>

    <h3><?php _e('Calendar', 'wphierarchy'); ?></h3>
    <?php get_calendar( ); ?>

    <?php 
        $args = [
            'type' => 'yearly',
            'limit' => 3,
            'show_post_count' => true,
            'order' => 'DESC'
        ];
        
        wp_get_archives( $args );
    
    ?>

    <?php dynamic_sidebar( 'main-sidebar' ); ?>

</div>