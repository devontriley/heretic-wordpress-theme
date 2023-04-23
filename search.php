<?php get_header(); ?>

<?php
/**
 * Use this documentation to exclude individual pages from search
 * https://searchwp.com/how-to-exclude-pages-from-site-search-results-in-wordpress/#:~:text=To%20exclude%20a%20page%20from,in%20the%20right%2Dhand%20menu.
 */
global $wp_query;
$isSearchTemplate = true;
$totalPosts = $wp_query->found_posts;
$postType = $_GET['source'];
$gridType = '';
$gridItemClasses = '';
switch ( $postType ) :
    case 'post':
    case 'page':
    case 'tribe_events':
        $gridType = 'articles';
        $gridItemClasses = 'grid col-sm-6 col-md-6 col-lg-4';
        break;
    case 'product':
        $gridType = 'products';
        $gridItemClasses = 'grid col-6 col-md-4 col-lg-3';
        break;
    case 'services':
        $gridType = 'services';
        $gridItemClasses = 'grid col-sm-6 col-md-6 col-lg-4';
        break;
    case 'artists':
        $gridType = 'artist-profiles';
        $gridItemClasses = 'grid col-6 col-sm-4 col-md-3';
        break;
    case 'team-members':
        $gridType = 'team-members';
        $gridItemClasses = 'grid col-sm-6 col-lg-3';
        break;
endswitch;
?>

<div class="container-xl">

    <div class="search-form-container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <?php get_template_part( 'searchform' ); ?>
            </div>
        </div>
    </div>

    <?php
    if ( $wp_query->query['s'] === '' ) :

        // If no search term is passed, include the "No posts found" template.
        get_template_part( 'template-parts/content/content-none' );

    elseif ( have_posts() ) : ?>

        <div class="search-result-type post-type-<?php echo $postType ?>">
        <div class="layout-grid <?php echo $gridType ?>">
        <div class="row">
        <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
        <div class="row">

        <?php while ( have_posts() ) :

            the_post(); ?>

                <div class="<?php echo $gridItemClasses ?>">
                    <?php
                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content/content-excerpt', get_post_format() );
                    ?>
                </div>

        <?php endwhile; ?>

        </div><!-- .row -->
        </div><!-- .col -->
        </div><!-- .row -->
        </div><!-- .layout-grid -->
        </div><!-- Close <?php echo $postType ?> -->

        <?php
        // Previous/next page navigation.
        heretic_the_posts_navigation();

    endif; ?>
</div>

<?php get_footer(); ?>