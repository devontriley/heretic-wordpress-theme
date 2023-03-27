<?php
$notificationBar = get_field( 'notification_bar', 'option' );
$enableNotificationBar = $notificationBar['enable_notification_bar'];

$logo = get_field( 'logo', 'option' );
?>

<?php if ( $enableNotificationBar ) :
    $notificationBarText = $notificationBar['notification_bar_text'];
    $notificationBarLink = $notificationBar['notification_bar_link']; ?>
<div class="notification-bar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col text-center">
                <!-- Text -->
                <?php if ( $notificationBarText ) : ?>
                    <?php echo $notificationBarText ?>
                <?php endif; ?>
                <!-- Link -->
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
                <a href="" class="header-donate btn btn-primary">
                    Donate
                </a>
            </div>
        </div>
    </div>

    <!-- Nav drawer -->
    <div id="nav-drawer" class="nav-drawer">
        <a href="" class="btn btn-primary d-block">Donate</a>
        <?php get_template_part( 'template-parts/header/site-nav' ); ?>
    </div>
</header>
