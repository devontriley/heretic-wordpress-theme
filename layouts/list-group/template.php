<?php
global $layoutCounter;

$header = get_sub_field( 'header' );
$bodyCopy = get_sub_field( 'body_copy' );
$column1 = get_sub_field( 'column_1' );
if ( $column1 ) $column1List = $column1['lists'];
$column2 = get_sub_field( 'column_2' );
if ( $column2 ) $column2List = $column2['lists'];
?>

<div class="layout-list-group layout-vertical-spacing" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">

        <?php if ( $header || $bodyCopy ) : ?>
            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-2 text-center">
                    <div class="header">
                        <?php if ( $header ) : ?>
                            <h2><?php echo $header ?></h2>
                        <?php endif; ?>
                        <?php if ( $bodyCopy ) : ?>
                            <?php echo $bodyCopy ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="row <?php if ( ! $column2List ) { echo 'justify-content-center'; } ?>">
                    <?php if ( $column1List ) : ?>
                        <div class="column1 col-md-6">
                            <div class="column">
                                <?php foreach ( $column1List as $key => $list ) : ?>
                                    <!-- Header -->
                                    <?php if ( $list['header'] ) : ?>
                                        <p class="h4"><?php echo $list['header'] ?></p>
                                    <?php endif; ?>
                                    <!-- List Items -->
                                    <?php if ( $list['list_items'] ) : ?>
                                        <ul>
                                            <?php foreach ( $list['list_items'] as $item ) : ?>
                                                <li><?php echo $item['list_item'] ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ( $column2List ) : ?>
                        <div class="column2 col-md-6">
                            <div class="column">
                                <?php foreach ( $column2List as $key => $list ) : ?>
                                    <!-- Header -->
                                    <?php if ( $list['header'] ) : ?>
                                        <p class="h4"><?php echo $list['header'] ?></p>
                                    <?php endif; ?>
                                    <!-- List Items -->
                                    <?php if ( $list['list_items'] ) : ?>
                                        <ul>
                                            <?php foreach ( $list['list_items'] as $item ) : ?>
                                                <li><?php echo $item['list_item'] ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php unset( $column1, $column2 ); ?>

<?php $layoutCounter++; ?>