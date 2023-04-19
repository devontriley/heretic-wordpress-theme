<?php
global $layoutCounter;

if ( ! $format ) $format = get_sub_field('format');
if ( ! $columns ) $columns = get_sub_field('columns');
if ( ! $imageType ) $imageType = get_sub_field('image_type');
if ( ! $header ) $header = get_sub_field('header');
if ( ! $headerSize ) $headerSize = get_sub_field('header_size');
if ( ! $cards ) $cards = get_sub_field('cards');
?>

<div class="layout-grid layout-vertical-spacing <?php if ( $is_preview ){ echo 'is-preview'; } ?> <?php echo strtolower(str_replace(' ', '-', $format)) ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <?php
    if ( $format === 'Icon and Blurb' ) :
        include( 'icon-and-blurb.php' );
    elseif ( $format === 'Info Boxes' ) :
        include( 'info-boxes.php' );
    elseif ( $format === 'Articles' ) :
        include( 'articles.php' );
    elseif ( $format === 'Services' ) :
        include( 'services.php' );
    elseif ( $format === 'Team Members' ) :
        include( 'team-members.php' );
    elseif ( $format === 'Artist Profiles' ) :
        include( 'artist-profiles.php' );
    elseif ( $format === 'Product Categories' ) :
        include( 'product-categories.php' );
    elseif ( $format === 'Products' ) :
        include( 'products.php' );
    elseif ( $format === 'External Links' ) :
        include( 'external-links.php' );
    elseif ( $format === 'Logos' ) :
        include( 'logos.php' );
    endif;
    ?>
</div>

<?php unset(
    $format,
    $columns,
    $imageType,
    $header,
    $headerSize,
    $cards
);
?>

<?php $layoutCounter++; ?>
