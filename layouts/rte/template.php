<?php
global $layoutCounter;

$size = get_sub_field('size');
$fullBleedBG = get_sub_field( 'full_bleed_background' );
$centeredText = get_sub_field('centered_text');
$eyebrowText = get_sub_field('eyebrow_text');
$header = get_sub_field('header');
$headerSize = get_sub_field('header_size') ?? 'h2';
$bodyCopy = get_sub_field('body_copy');
$bodyCopy2 = get_sub_field( 'body_copy_2' );
$sidebar = get_sub_field('sidebar');
$imageVideo = get_sub_field('image_or_video');
$image = get_sub_field('image');
$imageTopAligned = get_sub_field( 'image_top_aligned' );
$video = get_sub_field('video');
$imageVideoAlignment = get_sub_field('image_video_alignment');
$button = get_sub_field('button');
?>

<div id="layout-rte-<?php echo $layoutCounter ?>"
     class="layout-rte layout-vertical-spacing <?php echo 'size-'.strtolower($size); ?> <?php if ( $fullBleedBG ) { echo 'full-bleed-bg'; }?>"
     data-layout-count="<?php echo $layoutCounter ?>"
>

    <div class="container-lg">
    <div class="row <?php if ( $imageTopAligned && $size === 'Medium' ) { echo 'image-top-aligned'; }?>">

        <?php if ( $size === 'Full' ) : ?>

            <div class="<?php echo 'col-12' ?>">
                <?php if ( $eyebrowText ) : ?>
                    <p class="eyebrow"><?php echo $eyebrowText ?></p>
                <?php endif; ?>
                <?php if ( $header ) : ?>
                    <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                <?php endif; ?>
                <?php if ( $bodyCopy ) : ?>
                    <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                <?php endif; ?>
                <?php if ( $button ) : ?>
                    <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                <?php endif; ?>
            </div>

        <?php elseif ( $size === 'Large' ) : ?>

            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2">
                <?php if ( $eyebrowText ) : ?>
                    <p class="eyebrow"><?php echo $eyebrowText ?></p>
                <?php endif; ?>
                <?php if ( $header ) : ?>
                    <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                <?php endif; ?>
                <?php if ( $bodyCopy ) : ?>
                    <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                <?php endif; ?>
                <?php if ( $button ) : ?>
                    <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                <?php endif; ?>
            </div>

        <?php elseif ( $size === 'Medium' ) : ?>

            <?php
            if ( !$image && !$video ) :
            $colClasses = 'col-sm-10 offset-sm-1';
            $colClasses .= $centeredText ? ' text-center col-md-6 offset-md-3' : ' col-md-8 offset-md-2';
            ?>

                <div class="<?php echo $colClasses ?>">
                    <?php if ( $eyebrowText ) : ?>
                        <p class="eyebrow"><?php echo $eyebrowText ?></p>
                    <?php endif; ?>
                    <?php if ( $header ) : ?>
                        <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                    <?php endif; ?>
                    <?php if ( $bodyCopy ) : ?>
                        <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                    <?php endif; ?>
                    <?php if ( $button ) : ?>
                        <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                    <?php endif; ?>
                </div>

            <?php else : ?>

                <?php /* Medium: Two columns with image/video */ ?>

                <?php if ( $imageVideoAlignment === 'Left' ) : ?>
                    <div class="<?php echo 'col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-5 offset-lg-0 image'; ?>">
                        <?php if ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image['ID'], 'full', '', false ) ?>
                        <?php elseif ( $video ) : ?>
                            <?php echo $video; ?>
                        <?php endif; ?>
                    </div>
                    <div class="<?php echo 'col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-1 copy'; ?>">
                        <?php if ( $eyebrowText ) : ?>
                            <p class="eyebrow"><?php echo $eyebrowText ?></p>
                        <?php endif; ?>
                        <?php if ( $header ) : ?>
                            <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                        <?php endif; ?>
                        <?php if ( $bodyCopy ) : ?>
                            <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                        <?php endif; ?>
                        <?php if ( $button ) : ?>
                            <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <div class="<?php echo 'col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-0 copy'; ?>">
                        <?php if ( $eyebrowText ) : ?>
                            <p class="eyebrow"><?php echo $eyebrowText ?></p>
                        <?php endif; ?>
                        <?php if ( $header ) : ?>
                            <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                        <?php endif; ?>
                        <?php if ( $bodyCopy ) : ?>
                            <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                        <?php endif; ?>
                        <?php if ( $button ) : ?>
                            <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                        <?php endif; ?>
                    </div>
                    <div class="<?php echo 'col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-5 offset-lg-1 image'; ?>">
                        <?php if ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image['ID'], 'full', '', false ) ?>
                        <?php elseif ( $video ) : ?>
                            <?php echo $video; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

        <?php elseif ( $size === 'Small' ) : ?>

            <?php if ( $imageVideoAlignment === 'Left' ) : ?>
                <div class="<?php echo 'col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-1 image'; ?>">
                    <?php if ( $image ) : ?>
                        <?php echo wp_get_attachment_image( $image['ID'], 'full', '', false ) ?>
                    <?php elseif ( $video ) : ?>
                        <?php echo $video; ?>
                    <?php endif; ?>
                </div>
                <div class="<?php echo 'col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-5 offset-lg-1 copy'; ?>">
                    <?php if ( $eyebrowText ) : ?>
                        <p class="eyebrow"><?php echo $eyebrowText ?></p>
                    <?php endif; ?>
                    <?php if ( $header ) : ?>
                        <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                    <?php endif; ?>
                    <?php if ( $bodyCopy ) : ?>
                        <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                    <?php endif; ?>
                    <?php if ( $button ) : ?>
                        <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                    <?php endif; ?>
                </div>
            <?php else : ?>
                <div class="<?php echo 'col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-5 offset-lg-1 copy'; ?>">
                    <?php if ( $eyebrowText ) : ?>
                        <p class="eyebrow"><?php echo $eyebrowText ?></p>
                    <?php endif; ?>
                    <?php if ( $header ) : ?>
                        <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                    <?php endif; ?>
                    <?php if ( $bodyCopy ) : ?>
                        <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                    <?php endif; ?>
                    <?php if ( $button ) : ?>
                        <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                    <?php endif; ?>
                </div>
                <div class="<?php echo 'col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-1 image'; ?>">
                    <?php if ( $image ) : ?>
                        <?php echo wp_get_attachment_image( $image['ID'], 'full', '', false ) ?>
                    <?php elseif ( $video ) : ?>
                        <?php echo $video; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        <?php elseif ( $size === 'Sidebar' ) : ?>

            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-10 offset-lg-1 col-xl-7 offset-xl-1">
                <?php if ( $eyebrowText ) : ?>
                    <p class="eyebrow"><?php echo $eyebrowText ?></p>
                <?php endif; ?>
                <?php if ( $header ) : ?>
                    <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                <?php endif; ?>
                <?php if ( $bodyCopy ) : ?>
                    <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                <?php endif; ?>
                <?php if ( $button ) : ?>
                    <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-10 offset-lg-1 col-xl-2 offset-xl-1">
                <?php if ( $sidebar ) : ?>
                    <?php echo apply_filters( 'the_content', $sidebar ) ?>
                <?php endif; ?>
            </div>

        <?php elseif ( $size === 'FiftyFifty' ) : ?>

            <?php if ( $imageVideoAlignment === 'Left' ) : ?>

                <div class="d-none d-lg-block col-lg-6 image">
                    <?php if ( $image ) : ?>
                        <?php echo wp_get_attachment_image( $image['ID'], 'full', '', false ) ?>
                    <?php elseif ( $video ) : ?>
                        <?php echo $video; ?>
                    <?php endif; ?>
                </div>
                <div class="col-sm-10 offset-sm-1 col-lg-6 offset-lg-0 copy">
                    <div class="copy-inner">
                        <div class="copy-wrapper">
                            <?php if ( $eyebrowText ) : ?>
                                <p class="eyebrow"><?php echo $eyebrowText ?></p>
                            <?php endif; ?>
                            <?php if ( $header ) : ?>
                                <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                            <?php endif; ?>
                            <?php if ( $bodyCopy ) : ?>
                                <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                            <?php endif; ?>
                            <?php if ( $button ) : ?>
                                <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php else : ?>

                <div class="col-sm-10 offset-sm-1 col-lg-6 offset-lg-0 copy">
                    <div class="copy-inner">
                        <div class="copy-wrapper">
                            <?php if ( $eyebrowText ) : ?>
                                <p class="eyebrow"><?php echo $eyebrowText ?></p>
                            <?php endif; ?>
                            <?php if ( $header ) : ?>
                                <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                            <?php endif; ?>
                            <?php if ( $bodyCopy ) : ?>
                                <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                            <?php endif; ?>
                            <?php if ( $button ) : ?>
                                <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-6 image">
                    <?php if ( $image ) : ?>
                        <?php echo wp_get_attachment_image( $image['ID'], 'full', '', false ) ?>
                    <?php elseif ( $video ) : ?>
                        <?php echo $video; ?>
                    <?php endif; ?>
                </div>

            <?php endif; ?>

        <?php elseif ( $size === 'TwoColumn' ) : ?>

            <div class="col-sm-10 offset-sm-1">

                <div class="header">
                    <?php if ( $eyebrowText ) : ?>
                        <p class="eyebrow"><?php echo $eyebrowText ?></p>
                    <?php endif; ?>
                    <?php if ( $header ) : ?>
                        <<?php echo $headerSize ?>><?php echo $header ?></<?php echo $headerSize ?>>
                    <?php endif; ?>
                </div>

                <div class="row align-items-start">
                    <div class="col-md-6">
                        <?php if ( $bodyCopy ) : ?>
                            <?php echo apply_filters( 'the_content', $bodyCopy ) ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <?php if ( $bodyCopy2 ) : ?>
                            <?php echo apply_filters( 'the_content', $bodyCopy2 ) ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div><!-- .row -->
    </div><!-- .container -->

</div>

<?php
unset(
    $size,
    $centeredText,
    $eyebrowText,
    $header,
    $bodyCopy,
    $bodyCopy2,
    $sidebar,
    $imageVideo,
    $image,
    $video,
    $imageVideoAlignment,
    $button
);
?>