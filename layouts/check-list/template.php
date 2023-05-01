<?php
global $layoutCounter;

$header = get_sub_field( 'header' );
$listItems = get_sub_field( 'list_items' );
?>

<div id="layout-check-list-<?php echo $layoutCounter ?>" class="layout-check-list layout-vertical-spacing <?php if ( $is_preview ){ echo 'is-preview'; } ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-2">

                <!-- Header -->
                <?php if ( $header ) : ?>
                    <h2><?php echo $header ?></h2>
                <?php endif; ?>
                <!-- List Items -->
                <?php if ( $listItems ) : ?>
                    <ul>
                    <?php foreach ( $listItems as $key => $item ) : ?>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            <?php echo $item['text'] ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<?php $layoutCounter++; ?>
<?php unset( $header, $listItems, $item ); ?>
