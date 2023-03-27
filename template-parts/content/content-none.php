<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<section class="no-results not-found">
	<header class="page-header alignwide">
		<?php if ( ! is_search() ) : ?>
            <h1 class="page-title"><?php esc_html_e( 'Nothing here', 'heretic' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div class="page-content default-max-width">

		<?php if ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'heretic' ); ?></p>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'heretic' ); ?></p>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <?php get_search_form(); ?>
                </div>
            </div>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
