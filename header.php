<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> <?php heretic_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php
    $faviconPrefix = get_field( 'favicon_prefix', 'options' );
    $faviconPath = get_stylesheet_directory_uri() . '/favicon/' . $faviconPrefix . '_';
    ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $faviconPath ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $faviconPath ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $faviconPath ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo $faviconPath ?>site.webmanifest">

	<?php wp_head(); ?>
</head>

<?php
$notificationBar = get_field( 'notification_bar', 'option' );
$enableNotificationBar = $notificationBar['enable_notification_bar'];
$notificationBodyClass = $enableNotificationBar ? 'notification-bar-enabled' : '';
?>

<body <?php body_class(array($notificationBodyClass)); ?>>

    <?php wp_body_open(); ?>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>