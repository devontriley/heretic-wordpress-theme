<?php
global $serviceLayoutCounter;

$header = get_sub_field('header');
$bodyCopy = get_sub_field('body_copy');
$button = get_sub_field('button');
?>

<div id="service-layout-rte-<?php echo $serviceLayoutCounter ?>" class="layout-rte <?php if ( $is_preview ){ echo 'is-preview '; } ?>" data-layout-count="<?php echo $serviceLayoutCounter ?>">

    <!-- Header -->
    <?php if ( $header ) : ?>
        <h2><?php echo $header ?></h2>
    <?php endif; ?>
    <!-- Body copy -->
    <?php if ( $bodyCopy ) : ?>
        <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
    <?php endif; ?>

</div>

<?php $serviceLayoutCounter++; ?>
<?php unset( $eyebrowText, $header, $bodyCopy, $button ); ?>