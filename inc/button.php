<?php
function button( $text, $url, $target, $classes = false ) {
    ob_start(); ?>

    <a
        href="<?php echo $url ?>"
        target="<?php echo $target ?>"
        class="<?php echo $classes ?>">
        <?php echo $text ?>
    </a>

    <?php
    $html = ob_get_clean();
    echo $html;
}
?>