<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span>
        <p><?php esc_html_e( 'Enjoy this gallery post', 'wphierarchy' ); ?></p>

        <?php the_title( '<h2><a href=" '. esc_url( get_permalink() ) .' ">', '</a></h2>' ); ?>

        <div class="byline">
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