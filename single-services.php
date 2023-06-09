<?php get_header(); ?>

<!-- ACF Modules -->
<?php
if(has_flexible('Modules')):
    the_flexible('Modules');
endif;
?>

<?php get_footer(); ?>