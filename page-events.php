<?php
// Template Name: Events
get_header(); ?>

    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content/content-page' );

        echo do_shortcode( '[tribe_events]' );

        // If comments are open or there is at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    endwhile;
    ?>

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer default-max-width">
            <div class="container-lg">
                <div class="row">
                    <?php
                    edit_post_link(
                        sprintf(
                        /* translators: %s: Post title. Only visible to screen readers. */
                            esc_html__( 'Edit %s', 'heretic' ),
                            '<span class="screen-reader-text">' . get_the_title() . '</span>'
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </div>
            </div>
        </footer><!-- .entry-footer -->
    <?php endif; ?>

<?php get_footer(); ?>
