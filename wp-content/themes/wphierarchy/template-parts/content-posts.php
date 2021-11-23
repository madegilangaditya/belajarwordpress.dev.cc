<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span>

        <h2>
            <a title="<?php the_title_attribute(  ); ?>" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <?php //the_title( '<h2><a href=" '. esc_url( get_permalink() ) .' ">', '</a></h2>' ); ?>

        <div class="byline">
            Date: <?php the_date( 'F j, Y' ); ?>
            <?php esc_html_e( 'Categories : ', 'wphierarchy' ); ?>
            <?php the_category( ', ' ); ?> 
            <?php the_tags( 'Tags: ', ', ' ); ?>
            <?php esc_html_e( 'Author:', 'wphierarchy' ); ?>  <?php the_author(); ?>
            <?php the_shortlink( 'Shortlink' );?>
            <?php echo wp_get_shortlink(  ); ?>
        </div>
    </header>

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>

    <!-- Don't show comments at all -->
    <?php if( comments_open() ): ?>

        <?php comments_template(); ?>

    <?php endif; ?>

</article>