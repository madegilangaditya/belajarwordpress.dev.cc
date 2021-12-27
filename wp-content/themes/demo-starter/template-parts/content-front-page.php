<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Demo_Starter_Theme
 */

?>

<section class="demo-home-banner py-5">
    <div class="container py-lg-5 py-md-4 mt-lg-0 mt-md-4 HomePageHeroHeader">
        <div class="demo-home-banner-content py-lg-5 py-4 mt-md-4">
            <div class="pt-md-5 pt-lg-4 mt-4 align-items-lg-center">
                <div class="bannerhny-info">
                    <h6 class="title-subhny mb-3">Digital Agency.</h6>
                    <h2 class="banner-title">Why wait ? start your own business.</h3>
                    <a class="btn btn-style btn-primary btn-outline-light mt-sm-5 mt-4" href="about">Read More &nbsp; <i class="bi bi-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </div>
</section>

<?php demo_starter_post_thumbnail(); ?>

<div class="entry-content">
    <div class="container py-lg-5 py-md-4 mt-lg-0 mt-md-4">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'demo-starter' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div>
</div><!-- .entry-content -->

<?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
        <?php
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'demo-starter' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
<?php endif; ?>

