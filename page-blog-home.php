<?php
/* Template Name: Blog Home */
get_header(); ?>

<div class="container-lg">

    <?php
    $blogHomeHeader = get_field( 'blog_home_header' );
    $blogHomeSubheader = get_field( 'blog_home_subheader' );
    ?>

    <?php if ( $blogHomeHeader ) : ?>
        <div class="blog-home-header">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <!-- Header -->
                    <h1><?php echo $blogHomeHeader ?></h1>
                    <!-- Subheader -->
                    <?php if ( $blogHomeSubheader ) : ?>
                        <p class="mb-0"><?php echo $blogHomeSubheader ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Featured Posts -->
    <div class="featured-posts">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                <?php
                $recentPosts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                while ( $recentPosts->have_posts() ) :
                    $recentPosts->the_post();

                    get_template_part( 'template-parts/content/content-featured-post' );

                    // If comments are open or there is at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>

    <!-- ACF Modules -->
    <?php
    if(has_flexible('Modules')):
        the_flexible('Modules');
    endif;
    ?>
</div>

<?php get_footer(); ?>
