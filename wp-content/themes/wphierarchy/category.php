<?php get_header(  ); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <h1><?php the_archive_title( '' ); ?></h1>
            <p><?php echo category_description(); ?></p>

            <hr>

        <!-- Post Loop -->
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content-posts', get_post_format(  ) ); ?>
            

        <?php endwhile; else :  ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>

        <?php echo paginate_links( ); ?>
        </main>
        <p>Template: Category.php</p>
    </div>

    <?php get_sidebar(); ?>

   

<?php get_footer(  ); ?>