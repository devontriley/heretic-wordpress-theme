<?php
$centerHeader = get_sub_field( 'center_header' );
$pages = get_sub_field( 'pages' );
?>

<div class="container-lg">
    <div class="row">
        <div class="header col-sm-10 offset-sm-1 <?php if ( $centerHeader ) { echo 'text-center'; } else { echo 'col-md-6'; } ?> col-lg-12 offset-lg-0">
            <<?php echo $headerSize ?>>
                <?php echo $header ?>
            </<?php echo $headerSize ?>>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
            <div class="row">
                <?php foreach ( $pages as $key => $page ) : ?>
                    <div class="grid col-sm-6 col-md-6 col-lg-4">
                        <?php include('pages-card.php') ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php unset( $centerHeader, $pages, $headerSize, $header ); ?>