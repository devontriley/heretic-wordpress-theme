<?php get_header(); ?>

<?php
while ( have_posts() ) :
    the_post();

    include( get_template_directory() . '/layouts/modules.php' );
endwhile;
?>

<?php get_footer(); ?>
