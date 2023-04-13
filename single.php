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

    <div class="row">
        <div class="col">
            <div class="layout-grid articles">
                <?php include( get_template_directory().'/layouts/grid/articles.php' ); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>