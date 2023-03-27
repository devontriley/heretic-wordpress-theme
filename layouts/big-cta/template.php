<?php
global $layoutCounter;

$text = get_sub_field('text');
$textLink = get_sub_field('text_link');
?>

<div class="layout-big-cta <?php if ( $is_preview ) { echo 'is-preview'; } ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                <div class="cta-wrapper">
                    <!-- Text -->
                    <?php if ( $text ) : ?>
                        <p class="text"><?php echo $text ?></p>
                    <?php endif; ?>
                    <!-- Text Link -->
                    <?php if ( $textLink ) : ?>
                        <a class="text-link" href="<?php echo $textLink['url'] ?>" target="<?php echo $textLink['target'] ?>">
                            <?php echo $textLink['title'] ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php unset( $text, $textLink ); ?>

<?php $layoutCounter++; ?>