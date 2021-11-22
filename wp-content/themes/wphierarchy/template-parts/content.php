<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span>

        <?php the_title( '<h1>', '</h1>' ); ?>

        <div class="byline">
            <?php esc_html_e( 'Categories : ', 'wphierarchy' ); ?>
            <?php the_category( ', ' ); ?> 
            <?php the_tags( 'Tags: ', ', ' ); ?>
            <?php esc_html_e( 'Author:', 'wphierarchy' ); ?>  <?php the_author(); ?>
        </div>
    </header>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>

    <!-- Don't show comments at all -->
    <?php if( comments_open() ): ?>

        <?php comments_template(); ?>

    <?php endif; ?>

</article>