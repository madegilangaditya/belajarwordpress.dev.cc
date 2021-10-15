<?php get_header(  ); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <h1><?php the_archive_title( '' ); ?></h1>

        <!-- Post Loop -->
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">

                <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span>

                <?php the_title( '<h1>', '</h1>' ); ?>

                <div class="byline">
                    <?php esc_html_e( 'Author:', 'wphierarchy' ); ?>  <?php the_author(); ?>
                </div>
            </header>

            <div class="entry-content">
                <pre><?php var_export( $post ); ?></pre>
                <?php the_content(); ?>
            </div>

            <!-- Don't show comments at all -->
            <?php if( comments_open() ): ?>

                <?php comments_template(); ?>

            <?php endif; ?>

        </article>

        <?php endwhile; else :  ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>

        <?php echo paginate_links( ); ?>
        </main>
        <p>Template: Attachment.php</p>
    </div>

    <?php get_sidebar(); ?>

   

<?php get_footer(  ); ?>