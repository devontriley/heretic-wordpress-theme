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

    <?php include( get_template_directory() . '/layouts/modules.php' ); ?>

</div>

<?php get_footer(); ?>
