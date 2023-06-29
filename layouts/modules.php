<?php

$modules = get_field('Modules');

if(have_rows('Modules', get_the_ID())):
    while( have_rows('Modules', get_the_ID()) ) :
        the_row();

        $rowLayout = get_row_layout();

        switch($rowLayout):
            case 'hero':
                include('hero/template.php' );
                break;
            case 'rte':
                include('rte/template.php' );
                break;
            case 'grid':
                include('grid/template.php' );
                break;
            case 'testimonials':
                include('testimonials/template.php' );
                break;
            case 'stats':
                include('stats/template.php' );
                break;
            case 'image_gallery':
                include('image-gallery/template.php' );
                break;
            case 'video':
                include('video/template.php' );
                break;
            case 'big_cta':
                include('big-cta/template.php' );
                break;
            case 'colored_icon_cards':
                include('colored-icon-cards/template.php' );
                break;
            case 'accordion':
                include('accordion/template.php' );
                break;
            case 'tab_changer':
                include('tab-changer/template.php' );
                break;
            case 'check_list':
                include('check-list/template.php' );
                break;
            case 'list_group':
                include('list-group/template.php' );
                break;
            case 'form':
                include('form/template.php' );
                break;
            case 'code_block':
                include('code-block/template.php' );
                break;
        endswitch;

    endwhile;
endif;

?>