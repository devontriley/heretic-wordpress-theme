<?php
global $layoutCounter;

if ( ! $rows ) {
    $rows = get_sub_field( 'rows' );
}
$defaultCardColor = get_sub_field( 'default_card_color' ) ?: 'primary';
?>

<div class="layout-colored-icon-cards">
    <div class="container-lg">
        <?php if ( $rows ) : ?>
            <?php foreach ( $rows as $key => $row ) :
                $cards = $row['cards'];
                $columns = $row['columns'];
                $columnWidth = '6';
                $tabletColumnWidth = '6';
                $cardCount = 2;
                switch( $columns ) :
                    case 'Two':
                        $tabletColumnWidth = '6';
                        $columnWidth = '6';
                        $cardCount = 2;
                        break;
                    case 'Three':
                        $tabletColumnWidth = '4';
                        $columnWidth = '4';
                        $cardCount = 3;
                        break;
                    case 'Four':
                        $tabletColumnWidth = '4';
                        $columnWidth = '3';
                        $cardCount = 4;
                        break;
                endswitch;
                ?>
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                        <div class="row justify-content-center">
                            <?php for ( $i = 0; $i < $cardCount; $i++ ) :
                                $cardColor = $cards[$i]['color'] ?: $defaultCardColor; ?>
                                <div class="grid col-sm-6 col-md-<?php echo $tabletColumnWidth ?> col-lg-<?php echo $columnWidth ?>">
                                    <div class="card" data-color="<?php echo $cardColor ?>">
                                        <?php if ( $cards[$i]['url'] ) : ?>
                                            <a href="<?php echo $cards[$i]['url'] ?>" class="cover-link"></a>
                                        <?php endif; ?>
                                        <div class="card-body text-center">
                                            <!-- Image -->
                                            <?php if ( $cards[$i]['icon'] ) : ?>
                                                <?php echo wp_get_attachment_image( $cards[$i]['icon']['ID'], '30x30' ); ?>
                                            <?php endif; ?>
                                            <!-- Text -->
                                            <?php if ( $cards[$i]['text'] ) : ?>
                                                <p class="h4 mb-0"><?php echo $cards[$i]['text'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php unset( $rows, $cards, $columns, $columnWidth, $cardCount ); ?>

<?php $layoutCounter++; ?>