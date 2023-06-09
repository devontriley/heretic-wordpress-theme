<?php
global $layoutCounter;

$format = get_sub_field('format');
$columns = get_sub_field('columns');
$backgroundColor = get_sub_field('background_color');
$headerAlignment = get_sub_field('header_alignment');
$content = get_sub_field('content');
$autoCrossfadeImages = get_sub_field( 'auto_crossfade_images' );

if ( $format !== 'Carousel' ) {
    $headerSize = $content[0]['header_size'];
    $header = $content[0]['header'];
    $eyebrow = $content[0]['eyebrow_text'];
    $body = $content[0]['body_copy'];
    $button = $content[0]['button'];
    $image = $content[0]['image'];
    $video = $content[0]['video'];
    $circularImage = $content[0]['circular_overlap_image'];
}
?>

<div class="layout-hero layout-vertical-spacing
    <?php if ( $is_preview ){ echo 'is-preview'; } ?>
    <?php echo strtolower( $format ) ?>
    <?php if ( $format === 'Primary' ){ echo $columns === 'One' ? 'one-column' : 'two-columns'; } ?>
    <?php if ( $format === 'Secondary' ){ echo 'header-'.strtolower( $headerAlignment ); } ?>
    <?php if ( $format === 'Carousel' ){ echo 'background-'.strtolower( $backgroundColor ); } ?>
    <?php if ( $format === 'Carousel' && count ( $content ) > 1 ){ echo 'carousel-active'; } ?>
" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-md position-relative">

            <!-- Primary -->
            <?php if ($format === 'Primary') : ?>

            <div class="row align-items-center">
                <!-- Column one -->
                <div class="column1 col-sm-10 offset-sm-1 <?php echo ( $columns === 'One' ) ? 'col-md-8 offset-md-2' : 'col-md-6 offset-md-0'; ?>">
                    <!-- Eyebrow -->
                    <?php if ($eyebrow) : ?>
                        <p class="eyebrow"><?php echo $eyebrow ?></p>
                    <?php endif; ?>
                    <!-- Header -->
                    <?php if ($header) : ?>
                        <<?php echo $headerSize ?>>
                            <?php echo $header ?>
                        </<?php echo $headerSize ?>>
                    <?php endif; ?>
                    <!-- Body copy -->
                    <?php if ( $body ) : ?>
                        <?php echo apply_filters( 'the_content', $body ) ?>
                    <?php endif; ?>
                    <!-- Button -->
                    <?php if ( $button ) : ?>
                        <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                    <?php endif; ?>
                    <!-- Image/video -->
                    <?php if ( $columns === 'One' ) : ?>
                        <?php if ( $autoCrossfadeImages ) : ?>
                            <div class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
                                <div class="carousel-inner">
                                    <?php foreach ( $autoCrossfadeImages as $k => $crossfadeImage ) : ?>
                                        <div class="carousel-item <?php if ( $k === 0 ) { echo 'active'; } ?>">
                                            <?php echo wp_get_attachment_image( $crossfadeImage['crossfade_image']['ID'], 'full' ) ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php elseif ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image['ID'], 'full', '', array( 'class' => 'single-image' ) ) ?>
                        <?php elseif ( $video ) : ?>
                            <?php echo $video ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php if ( $columns === 'Two' ) : ?>
                    <div class="column2 col-sm-10 offset-sm-1 col-md-6 offset-md-0">
                        <?php if ( $autoCrossfadeImages ) : ?>
                            <div class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
                                <div class="carousel-inner">
                                    <?php foreach ( $autoCrossfadeImages as $k => $crossfadeImage ) : ?>
                                        <div class="carousel-item <?php if ( $k === 0 ) { echo 'active'; } ?>">
                                            <?php echo wp_get_attachment_image( $crossfadeImage['crossfade_image']['ID'], 'full' ) ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php elseif ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image['ID'], 'full' ) ?>
                        <?php elseif ( $video ) : ?>
                            <?php echo $video ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Carousel -->
            <?php elseif ( $format === 'Carousel' ) : ?>

            <?php if ( count( $content ) > 1 ) : ?>
                <div class="controls">
                    <button class="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                    </button>
                    <button class="next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

            <div class="row align-items-center">
                <div class="copy <?php echo $backgroundColor === 'None' ? 'col-12' : 'col-lg-8' ?>">
                    <div class="glide content">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <?php foreach ( $content as $key => $value ) :
                                $headerSize = $value['header_size'];
                                $header = $value['header'];
                                $eyebrow = $value['eyebrow_text'];
                                $body = $value['body_copy'];
                                $button = $value['button'];
                                $loading = $key === 0 ? false : 'lazy';
                                ?>
                                <div class="glide__slide">
                                    <div class="content-wrapper">
                                        <div class="content-wrapper-inner">
                                            <!-- Header -->
                                            <?php if ($header) : ?>
                                                <<?php echo $headerSize ?>>
                                                    <?php echo $header ?>
                                                </<?php echo $headerSize ?>>
                                            <?php endif; ?>
                                            <!-- Body copy -->
                                            <?php if ( $body ) : ?>
                                                <?php echo apply_filters( 'the_content', $body ) ?>
                                            <?php endif; ?>
                                            <!-- Button -->
                                            <?php if ( $button ) : ?>
                                                <?php button( $button['title'], $button['url'], $button['target'], 'btn btn-primary' ); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if ( $backgroundColor === 'None' ) : ?>
                                        <?php echo wp_get_attachment_image( $value['image']['ID'], 'full', '', array( 'loading' => $loading ) ) ?>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if ( $backgroundColor !== 'None' ) : ?>
                    <div class="image col-lg-4 align-self-stretch">
                        <div class="glide images">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    <?php foreach( $content as $key => $value ) : ?>
                                        <div class="glide__slide">
                                            <?php echo wp_get_attachment_image( $value['image']['ID'], 'full', '', array() ) ?>
                                        </div>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Secondary -->
            <?php elseif ( $format === 'Secondary' ) : ?>

            <div class="row align-items-center">
                <div class="col-12">
                    <div class="inner">
                        <?php if ($header) : ?>
                            <h1 class="h2">
                                <?php echo $header ?>
                            </h1>
                        <?php endif; ?>
                        <?php if ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image['ID'], 'full', '', array() ) ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Profile -->
            <?php elseif ( $format === 'Profile' ) : ?>

            <div class="row align-items-center">
                <div class="col-12">
                    <div class="inner">
                        <?php if ( $circularImage ) : ?>
                            <?php echo wp_get_attachment_image( $circularImage['ID'], 'full', '', array( 'class' => 'circular-overlap-image' ) ) ?>
                        <?php endif; ?>
                        <?php if ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image['ID'], 'full', '', array( 'class' => 'banner-image' ) ) ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php endif; ?>
    </div>
</div>

<?php unset( $format, $columns, $backgroundColor, $headerAlignment, $content, $header, $headerSize, $eyebrow, $body, $button, $image, $video, $loading ); ?>

<?php $layoutCounter++; ?>