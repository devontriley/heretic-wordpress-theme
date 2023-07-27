<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<?php
$navItems = wp_get_nav_menu_items( 'primary-menu' );
$nav = array();

if( $navItems ) :
    $currentSubNav = 0;
    foreach ( $navItems as $navItem ) :
        $id = $navItem->ID;
        $title = $navItem->title;
        $url = $navItem->url;
        $parent = $navItem->menu_item_parent;
        $target = $navItem->target;

        if ( $parent === "0" ) {
            $nav[$id] = array(
                'title' => $title,
                'url' => $url,
                'target' => $target,
                'parent' => $parent,
                'children' => array()
            );
        } else {
            if ( isset($nav[$parent]) ) {
                $currentSubNav = $parent;
                $nav[$parent]['children'][$id] = array(
                    'object' => $navItem,
                    'id' => $id,
                    'title' => $title,
                    'url' => $url,
                    'target' => $target,
                    'parent' => $parent,
                    'children' => array()
                );
            } else {
                $nav[$currentSubNav]['children'][$parent]['children'][$id] = array(
                    'object' => $navItem,
                    'id' => $id,
                    'title' => $title,
                    'url' => $url,
                    'target' => $target,
                    'parent' => $parent,
                );
            }
        }
    endforeach;
endif; ?>

<?php if( $nav ) : ?>

    <ul class="primary-nav menu-top">
        <?php foreach( $nav as $key => $value ) : ?>
            <li class="<?php if ( $value['children'] ) { echo 'has-children'; } ?>">
                <?php if ( $value['url'] !== '#' ) { ?>
                <a href="<?php echo $value['url'] ?>" target="<?php echo $value['target'] ?>">
                <?php } else { ?>
                <span>
                <?php } ?>

                    <?php echo $value['title'] ?>
                    <?php if ( $value['children'] ) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    <?php endif; ?>

                <?php if ( $value['url'] !== '#' ) { ?>
                </a>
                <?php } else { ?>
                </span>
                <?php } ?>

                <?php if ( $value['children'] ) : ?>
                    <ul class="sub-menu">
                        <div class="sub-menu-inner">
                            <?php foreach ( $value['children'] as $child ) :
                                $icon = get_field('menu_item_icon', $child['id']); ?>
                                <li>
                                    <?php if ( $child['url'] !== '#' ) : ?>
                                    <a href="<?php echo $child['url'] ?>" class="<?php if ($child['children']){ echo 'has-children'; }?>" target="<?php echo $child['target'] ?>">
                                    <?php else : ?>
                                    <div>
                                    <?php endif; ?>
                                        <?php if ( $icon ) : ?>
                                            <?php echo wp_get_attachment_image( $icon['ID'], array(25,25), '', array( 'class' => 'sub-menu-icon' ) ) ?>
                                        <?php else : ?>
                                            <span class="sub-menu-icon bullet"></span>
                                        <?php endif; ?>

                                        <?php echo $child['title'] ?>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    <?php if ( $child['url'] !== '#' ) : ?>
                                    </a>
                                    <?php else : ?>
                                    </div>
                                    <?php endif;?>

                                    <?php if ( $child['children'] ) : ?>
                                        <ul class="sub-sub-menu">
                                            <?php foreach ( $child['children'] as $subChild ) : ?>
                                                <li>
                                                    <a href="<?php echo $subChild['url']; ?>">
                                                        <?php echo $subChild['title']; ?>

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </div>
                    </ul>
                <?php endif; ?>

            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<?php unset( $navItems, $navItem, $nav ); ?>
