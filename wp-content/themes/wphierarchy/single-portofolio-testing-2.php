<?php get_header( 'splash' ); ?>

    <div id="primary" class="content-area extended">
        <main id="main" class="site-main" role="main">

        <!-- Post Loop -->
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title( '<h1>', '</h1>' ); ?>

                
            </header>

            <div class="entry-content">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'full' ); ?>
                </a>

                <?php the_content(); ?>

                <p>
                    Skills:
                    <?php the_terms( $post -> ID, 'skills' ) ?>
                </p>

                <p>
                    <a class="button" href="<?php the_field('url'); ?>">
                        <?php esc_html_e( 'Visit The Project', 'wphierarchy' ); ?>
                    </a>
                </p>

            </div>
        </article>
            

        <?php endwhile; endif; ?>

        </main>
        <p>Template: single-portofolio-testing-2.php</p>
    </div>

    

<?php get_footer( 'splash' ); ?>