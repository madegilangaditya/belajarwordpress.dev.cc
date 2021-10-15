<?php get_header(  ); ?>

    <style>
        .author-img img{
            float:none;
        }
    </style>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="author-bio">
                <h1><?php the_archive_title( '' ); ?></h1>
                <p>
                    <?php echo the_author_meta( 'description', $post->post_author ); ?>
                </p>
                <div class="author-img">
                    
                    <?php echo get_avatar(get_the_author_meta('ID')); ?>

                </div> </br>
            </div>

        <!-- Post Loop -->
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content-posts', get_post_format(  ) ); ?>
            

        <?php endwhile; else :  ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>

        <?php echo paginate_links( ); ?>
        </main>
        <p>Template: Archive.php</p>
    </div>

    <?php get_sidebar(); ?>

   

<?php get_footer(  ); ?>