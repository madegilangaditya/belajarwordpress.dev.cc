<?php get_header(  ); ?>

    <div id="primary" class="content-area extended">
        <main id="main" class="site-main" role="main">

        <!-- Post Loop -->
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content','page' ); ?>
            

        <?php endwhile; else :  ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
        </main>
        <p>Template: Page-1062.php</p>
    </div>


    

<?php get_footer(  ); ?>