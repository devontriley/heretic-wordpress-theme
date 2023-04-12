<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>

<div class="container-lg">
    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content/content-single' );

//	if ( is_attachment() ) {
//		// Parent post navigation.
//		the_post_navigation(
//			array(
//				/* translators: %s: Parent post link. */
//				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
//			)
//		);
//	}

        // If comments are open or there is at least one comment, load up the comment template.
//	if ( comments_open() || get_comments_number() ) {
//		comments_template();
//	}
//
	// Previous/next post navigation.
	$heretic_next = is_rtl() ? heretic_get_icon_svg( 'ui', 'arrow_left' ) : heretic_get_icon_svg( 'ui', 'arrow_right' );
	$heretic_prev = is_rtl() ? heretic_get_icon_svg( 'ui', 'arrow_right' ) : heretic_get_icon_svg( 'ui', 'arrow_left' );

	the_post_navigation(
		array(
			'next_text' => '<p class="post-title">%title</p><p class="meta-nav">' . $heretic_next . '</p>',
			'prev_text' => '<p class="meta-nav">' . $heretic_prev . '</p><p class="post-title">%title</p>',
		)
	);
    endwhile;
    ?>
</div>

<?php get_footer(); ?>