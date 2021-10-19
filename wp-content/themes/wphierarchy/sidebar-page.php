<?php
    if( ! is_active_sidebar( 'page-sidebar' )){
        return;
    }
?>

<div id="secondary" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'page-sidebar' ); ?>

</div>