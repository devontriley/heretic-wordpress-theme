<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>

		<?php heretic_post_thumbnail(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content(
			heretic_continue_reading_text()
		);

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'heretic' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'heretic' ),
			)
		);

		?>
	</div><!-- .entry-content -->

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
</article><!-- #post-<?php the_ID(); ?> -->
