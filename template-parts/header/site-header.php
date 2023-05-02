<?php
$notificationBar = get_field( 'notification_bar', 'option' );
$enableNotificationBar = $notificationBar['enable_notification_bar'];
$donateURL = get_field( 'donate_url', 'option' );
$logo = get_field( 'logo', 'option' );
?>

<?php if ( $enableNotificationBar ) :
    $notificationBarText = $notificationBar['notification_bar_text'];
    $notificationBarLink = $notificationBar['notification_bar_link']; ?>
<div class="notification-bar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col text-center">
                <?php if ( $notificationBarText ) : ?>
                    <span><?php echo $notificationBarText ?></span>
                <?php endif; ?>
                <?php if ( $notificationBarLink ) : ?>
                    <a href="<?php echo $notificationBarLink['url'] ?>" target="<?php echo $notificationBarLink['target'] ?>"><?php echo $notificationBarLink['title'] ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<header id="masthead" class="primary-header <?php if ( $enableNotificationBar ) { echo 'enable-notification-bar'; } ?>">
    <div class="primary-header-inner">
        <div class="container-xl">
            <div class="hamburger-container">
                <button class="hamburger hamburger--squeeze" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
                </button>
            </div>
            <div class="logo">
                <a href="<?php echo get_home_url() ?>">
                    <?php echo wp_get_attachment_image( $logo['ID'], 'full' ) ?>
                </a>
            </div>
            <div class="primary-nav-container">
                <?php get_template_part( 'template-parts/header/site-nav' ); ?>
            </div>
            <div class="header-buttons">
                <a href="<?php echo get_site_url().'?s='; ?>" class="header-search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
                <?php if ( is_plugin_active ( 'woocommerce/woocommerce.php' ) ) : ?>
                    <a href="<?php echo wc_get_cart_url(); ?>" class="header-cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                        </svg>
                    </a>
                <?php endif; ?>
                <a href="<?php echo $donateURL ?>" class="header-donate btn btn-primary">
                    Donate
                </a>
            </div>
        </div>
    </div>

    <!-- Nav drawer -->
    <div id="nav-drawer" class="nav-drawer">
        <a href="<?php echo $donateURL ?>" class="btn btn-primary d-block">Donate</a>
        <?php get_template_part( 'template-parts/header/site-nav' ); ?>
    </div>
</header>
