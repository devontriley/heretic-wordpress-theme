<?php get_header(); ?>

<div class="container-lg">

    <?php if ( have_posts() ) : ?>
        <div class="layout-grid articles">
            <?php include( get_template_directory().'/layouts/grid/articles.php' ); ?>
        </div>
    <?php endif; ?>

    <?php heretic_the_posts_navigation(); ?>

</div>

<?php get_footer(); ?>
