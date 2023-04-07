<?php get_header(); ?>

<?php
while ( have_posts() ) :
    the_post();

    /* ACF Modules */
    if(has_flexible('Modules')):
        the_flexible('Modules');
    endif;
endwhile;
?>

<?php get_footer(); ?>
