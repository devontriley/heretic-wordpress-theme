<?php
global $layoutCounter;

$testimonials = get_sub_field('testimonials');
?>

<div class="layout-testimonials layout-vertical-spacing <?php if ( $is_preview ){ echo 'is-preview'; } ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-2">
                <div class="testimonials-wrapper">
                    <img src="<?php echo get_template_directory_uri().'/images/chat-left-quote.svg'; ?>" class="quote-icon" />

                    <div class="testimonials-glide">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <?php foreach ( $testimonials as $key => $testimonial ) : ?>
                                    <div class="glide__slide testimonial">
                                        <?php echo $testimonial['quote'] ?>
                                        <div class="byline">
                                            <!-- Thumbnail -->
                                            <?php if ( $testimonial['thumbnail'] ) : ?>
                                                <?php echo wp_get_attachment_image( $testimonial['thumbnail']['ID'], array(88, 88) ) ?>
                                            <?php endif; ?>
                                            <!-- Name & Title -->
                                            <?php if ( $testimonial['name_title'] ) : ?>
                                                <p class="name-title"><?php echo $testimonial['name_title'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php if ( count( $testimonials ) > 1 ) : ?>
                    <div class="testimonials-controls">
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

            </div>
        </div>
    </div>
</div>

<?php unset( $testimonials, $testimonial ); ?>

<?php $layoutCounter++; ?>
