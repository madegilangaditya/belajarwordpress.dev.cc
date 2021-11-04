<?php
    if( ! is_active_sidebar( 'main-sidebar' )){
        return;
    }
?>

<div id="secondary" class="widget-area" role="complementary">

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