<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<?php global $isSearchTemplate; ?>

<?php if ( $isSearchTemplate ) : ?>

    <?php
    switch ( get_post_type() ) :
        case 'post':
            $p = get_post();
            include( get_template_directory().'/layouts/grid/articles-card.php' );
            break;
        case 'page':
            $p = get_post();
            include( get_template_directory().'/layouts/grid/articles-card.php' );
            break;
        case 'product':
            $product = wc_get_product( get_the_ID() );
            include( get_template_directory().'/layouts/grid/products-card.php' );
            break;
        case 'artists':
            $artist = get_post();
            include( get_template_directory().'/layouts/grid/artist-profiles-card.php' );
            break;
        case 'team-members':
            $teamMember = get_post();
            include( get_template_directory().'/layouts/grid/team-members-card.php' );
            break;
        case 'services':
            $p = get_post();
            include( get_template_directory().'/layouts/grid/services-card.php' );
    endswitch;
    ?>

<?php else : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <h1><?php the_title(); ?></h1>

        <!--	--><?php //get_template_part( 'template-parts/header/excerpt-header', get_post_format() ); ?>

        <!--	<div class="entry-content">-->
        <!--		--><?php //get_template_part( 'template-parts/excerpt/excerpt', get_post_format() ); ?>
        <!--	</div>-->
        <!---->
        <!--	<footer class="entry-footer default-max-width">-->
        <!--		--><?php //heretic_entry_meta_footer(); ?>
        <!--	</footer>-->
    </article>

<?php endif; ?>
