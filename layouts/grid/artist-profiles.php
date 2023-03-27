<?php
$artists = new WP_Query(array(
    'post_type' => 'artists',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
));
?>

<div class="container-lg">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-12 offset-lg-0 text-center">
            <<?php echo $headerSize ?>>
                <?php echo $header ?>
            </<?php echo $headerSize ?>>
        </div>
    </div>

    <?php if( $artists->found_posts ) : ?>
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                <div class="row">
                    <?php foreach ( $artists->posts as $key => $artist ) : ?>
                        <div class="grid col-6 col-sm-4 col-md-3">
                            <?php include( 'artist-profiles-card.php' ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>