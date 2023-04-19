<?php
global $layoutCounter;

$tabs = get_sub_field( 'tabs' );
?>

<div id="tabChanger-<?php echo $layoutCounter ?>" class="layout-tab-changer layout-vertical-spacing <?php if ( $is_preview ) { echo 'is-preview'; } ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="row">
                    <div class="col-md-4 col-xl-4">
                        <div class="list-select">
                            <select class="form-select" aria-label="Tab changer layout select">
                                <?php foreach ( $tabs as $key => $tab ) : ?>
                                    <option value="<?php echo $key ?>">
                                        <?php echo $tab['title'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="list-group">
                            <?php foreach ( $tabs as $key => $tab ) : ?>
                                <button type="button"
                                    data-bs-toggle=""
                                    data-bs-target="#tabChanger-<?php echo $layoutCounter ?>-<?php echo $key ?>"
                                    aria-expanded="<?php echo ( $key === 0 ) ? 'true' : 'false'; ?>"
                                    aria-controls="tabChanger-<?php echo $layoutCounter ?>-<?php echo $key ?>"
                                    aria-current="<?php echo ( $key === 0 ) ? 'true' : 'false'; ?>"
                                    class="collapse-button list-group-item list-group-item-action">
                                    <?php echo $tab['title'] ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-md-7 offset-md-1 col-xl-7 offset-xl-1">
                        <?php foreach ( $tabs as $key => $tab ) : ?>
                            <div class="collapse"
                                 id="tabChanger-<?php echo $layoutCounter ?>-<?php echo $key ?>"
                                 data-bs-parent="#tabChanger-<?php echo $layoutCounter ?>">
                                <!-- Header -->
                                <?php if ( $tab['header'] ) : ?>
                                    <h3><?php echo $tab['header'] ?></h3>
                                <?php endif; ?>
                                <!-- Body Copy -->
                                <?php if ( $tab['body_copy'] ) : ?>
                                    <?php echo apply_filters( 'the_content', $tab['body_copy'] ) ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php unset( $tabs, $tab ); ?>

<?php $layoutCounter++; ?>