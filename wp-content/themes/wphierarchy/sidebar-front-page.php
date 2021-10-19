<?php
    if( ! is_active_sidebar( 'front-page' )){
        return;
    }
?>

<div id="secondary" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'front-page' ); ?>

</div>