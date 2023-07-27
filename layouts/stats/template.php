<?php
global $layoutCounter;

$header = get_sub_field('header');
$stats = get_sub_field( 'stats' );
$columns = get_sub_field( 'columns' );
$columnWidth = '6';
switch( $columns ) :
    case 'Two':
        $columnWidth = '6';
        break;
    case 'Three':
        $columnWidth = '4';
        break;
    case 'Four':
        $columnWidth = '3';
        break;
    case 'Six':
        $columnWidth = '2';
        break;
endswitch;
?>

<div class="layout-stats layout-vertical-spacing" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">

        <?php if ( $header ) : ?>
            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0 text-center">
                    <h2><?php echo $header ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( $stats ) : ?>
            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                    <div class="row justify-content-center">
                        <?php foreach ( $stats as $key => $stat ) : ?>
                            <div class="grid col-sm-6 col-lg-4 col-xl-<?php echo $columnWidth ?> text-center">
                                <div class="stat-wrapper">
                                    <!-- Image -->
                                    <?php if ( $stat['icon'] ) : ?>
                                        <?php echo wp_get_attachment_image( $stat['icon']['ID'], 'thumbnail', false ); ?>
                                    <?php endif; ?>
                                    <!-- Header -->
                                    <?php if ( $stat['header'] ) :?>
                                        <p class="h2 header"><?php echo $stat['header'] ?></p>
                                    <?php endif; ?>
                                    <!-- Subheader -->
                                    <?php if ( $stat['subheader'] ) : ?>
                                        <p class="subheader mb-0"><?php echo $stat['subheader'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php unset( $header, $stats, $stat, $columns, $columnWidth ); ?>

<?php $layoutCounter++; ?>