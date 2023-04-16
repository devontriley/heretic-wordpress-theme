<?php get_header(); ?>

<?php
/**
 * Use this documentation to exclude individual pages from search
 * https://searchwp.com/how-to-exclude-pages-from-site-search-results-in-wordpress/#:~:text=To%20exclude%20a%20page%20from,in%20the%20right%2Dhand%20menu.
 */
global $wp_query;
$isSearchTemplate = true;
$totalPosts = $wp_query->found_posts;
$lastPostType = null;
$loopIteration = 0;
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
    /*
     * Only show results or nothing found message when a search term is passed
     * When no search term is passed the posts aren't ordered by post_type so we can't display the different sections properly
     */
    if ( $wp_query->query['s'] ) : ?>

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) :

                the_post();

                $postType = get_post_type();
                $postCount = wp_count_posts( $postType );
//            $postTypeLink = get_post_type_archive_link( $postType );
                $postTypeLink = get_home_url() . '?s=&post_type='.$postType;
                $nextPost = $wp_query->posts[$loopIteration + 1];
                $gridType = '';
                $gridItemClasses = '';
                $sectionHeader = ucwords( str_replace( '-', ' ', $postType ) );
                if( substr( $sectionHeader, -1 ) !== 's' ) {
                    $sectionHeader .= 's';
                }

                switch ( $postType ) :
                    case 'post':
                        $gridType = 'articles';
                        $gridItemClasses = 'grid col-sm-6 col-md-6 col-lg-4';
                        break;
                    case 'page':
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
                    case 'services':
                        $gridType = 'services';
                        $gridItemClasses = 'grid col-sm-6 col-md-6 col-lg-4';
                        break;
                    case 'team-members':
                        $gridType = 'team-members';
                        $gridItemClasses = 'grid col-sm-6 col-lg-3';
                        break;
                endswitch;

                if ( $postType !== $lastPostType ) : ?>

                    <!-- Start <?php echo $postType ?> -->
                    <div class="search-result-type post-type-<?php echo $postType ?>">
                    <div class="layout-grid <?php echo $gridType ?>">

<!--                    <div class="row">-->
<!--                        <div class="col-sm-10 offset-sm-1 col-md-6 col-lg-12 offset-lg-0">-->
<!--                            <div class="search-results-type-header">-->
<!--                                <h2>--><?php //echo $sectionHeader ?><!--</h2>-->
<!--                                <a href="--><?php //echo $postTypeLink ?><!--">View all results</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="row">
                    <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                    <div class="row">

                <?php endif; ?>

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

                <?php
                /* When the next post's type doesn't match the current post's type,
                we close the container divs so we can begin a new section on the next iteration */
                if ( $nextPost->post_type !== $postType ) : ?>
                    </div><!-- .row -->
                    </div><!-- .col -->
                    </div><!-- .row -->
                    </div><!-- .layout-grid -->
                    </div><!-- Close <?php echo $postType ?> -->
                <?php endif; ?>

                <?php
                $lastPostType = $postType;
                $loopIteration++;

            endwhile;

            // Previous/next page navigation.
            heretic_the_posts_navigation();

        else :

            // If no content, include the "No posts found" template.
            get_template_part( 'template-parts/content/content-none' );

        endif; ?>
    <?php else : ?>

        <?php if ( $wp_query->query['post_type'] ) : ?>
            <p><?php esc_html_e( 'Enter a search term to find results', 'heretic' ); ?></p>
        <?php endif; ?>

    <?php endif; ?>
</div>

<?php get_footer(); ?>