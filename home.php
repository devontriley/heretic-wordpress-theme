<?php get_header(); ?>

<div class="container-lg">


    <?php if ( is_home() ) : ?>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center"><?php echo get_the_title( get_option( 'page_for_posts' ) ) ?></h1>
            </div>
        </div>
    <?php endif; ?>

    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content/content-page' );

        // If comments are open or there is at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    endwhile;
    ?>
</div>

<?php get_footer(); ?>
