<?php

function button_shortcode( $atts ) {
    $a = shortcode_atts(array(
        'text' => '',
        'url' => '',
        'target' => '',
        'classes' => 'btn btn-primary'
    ), $atts);

    ob_start(); ?>

    <a href="<?php echo $a['url']; ?>" target="<?php echo $a['target']; ?>" class="<?php echo $a['classes']; ?>"><?php echo $a['text']; ?></a>

    <?php return ob_get_clean();
}
add_shortcode( 'button', 'button_shortcode' );