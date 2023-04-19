<?php
global $serviceLayoutCounter;

$linkItems = get_sub_field( 'link_items' );
?>

<div id="service-layout-icon-links-<?php echo $serviceLayoutCounter ?>" class="layout-icon-links layout-vertical-spacing" data-layout-count="<?php echo $serviceLayoutCounter ?>">
    <ul>
        <?php foreach ( $linkItems as $key => $item ) : ?>
            <li>
                <?php if ( $item['icon'] ) : ?>
                <a href="<?php echo $item['link']['url'] ?>" target="<?php echo $item['link']['target'] ?>">
                    <div class="icon"><?php echo $item['icon'] ?></div>
                    <?php echo $item['link']['title'] ?>
                </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php $serviceLayoutCounter++; ?>
<?php unset( $linkItems ); ?>
