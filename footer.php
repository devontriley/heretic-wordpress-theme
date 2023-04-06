<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<?php
$logo = get_field( 'logo', 'option' );
$footerMenu1 = wp_get_nav_menu_items( 'footer-menu-1' );
$footerMenuHeader1 = get_field( 'footer_menu_header', wp_get_nav_menu_object( 'footer-menu-1' ) );
$footerMenu2 = wp_get_nav_menu_items( 'footer-menu-2' );
$footerMenuHeader2 = get_field( 'footer_menu_header', wp_get_nav_menu_object( 'footer-menu-2' ) );
$footerMenu3 = wp_get_nav_menu_items( 'footer-menu-3' );
$footerMenuHeader3 = get_field( 'footer_menu_header', wp_get_nav_menu_object( 'footer-menu-3' ) );
$footerMenu4 = wp_get_nav_menu_items( 'footer-menu-4' );
$footerMenuHeader4 = get_field( 'footer_menu_header', wp_get_nav_menu_object( 'footer-menu-4' ) );
$newsletterFormEmbed = get_field( 'newsletter_form_embed', 'option' );
$socialLinks = get_field( 'social_media_links', 'option' );
?>

<div class="primary-footer">
    <div class="container-lg">
        <div class="row footer-top">
            <?php if ( $footerMenu1 ) : ?>
                <div class="col-6 col-md-3 col-xl-2">
                    <?php if ( $footerMenuHeader1 ) : ?>
                        <h4><?php echo $footerMenuHeader1 ?></h4>
                    <?php endif; ?>
                    <ul>
                        <?php foreach ( $footerMenu1 as $key => $menuItem ) : ?>
                            <li>
                                <a href="<?php echo $menuItem->url ?>" target="<?php echo $menuItem->target ?>"><?php echo $menuItem->post_title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if ( $footerMenu2 ) : ?>
                <div class="col-6 col-md-3 col-xl-2">
                    <?php if ( $footerMenuHeader2 ) : ?>
                        <h4><?php echo $footerMenuHeader2 ?></h4>
                    <?php endif; ?>
                    <ul>
                        <?php foreach ( $footerMenu2 as $key => $menuItem ) : ?>
                            <li>
                                <a href="<?php echo $menuItem->url ?>" target="<?php echo $menuItem->target ?>"><?php echo $menuItem->post_title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if ( $footerMenu3 ) : ?>
                <div class="col-6 col-md-3 col-xl-2">
                    <?php if ( $footerMenuHeader3 ) : ?>
                        <h4><?php echo $footerMenuHeader3 ?></h4>
                    <?php endif; ?>
                    <ul>
                        <?php foreach ( $footerMenu3 as $key => $menuItem ) : ?>
                            <li>
                                <a href="<?php echo $menuItem->url ?>" target="<?php echo $menuItem->target ?>"><?php echo $menuItem->post_title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if ( $footerMenu4 ) : ?>
                <div class="col-6 col-md-3 col-xl-2">
                    <?php if ( $footerMenuHeader4 ) : ?>
                        <h4><?php echo $footerMenuHeader4 ?></h4>
                    <?php endif; ?>
                    <ul>
                        <?php foreach ( $footerMenu4 as $key => $menuItem ) : ?>
                            <li>
                                <a href="<?php echo $menuItem->url ?>" target="<?php echo $menuItem->target ?>"><?php echo $menuItem->post_title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="col-12 col-xl-4">
                <!-- Newsletter -->
                <div class="newsletter-form">
                    <h4>SUBSCRIBE TO OUR NEWSLETTER</h4>
                    <?php echo $newsletterFormEmbed ?>
<!--                    <form>-->
<!--                        <div class="position-relative">-->
<!--                            <input class="form-control" type="text" placeholder="Email" />-->
<!--                            <button type="submit">Sign Up</button>-->
<!--                        </div>-->
<!--                    </form>-->
                </div>
                <!-- Address -->
                <h4>Gateway Arts</h4>
                <p>
                    60-62 Harvard St.<br />
                    Brookline, MA 02445
                </p>
                <p>
                    Phone: 617.734.1577<br />
                    Email: gatewayarts@vinfen.org
                </p>
            </div>
        </div>

        <div class="row footer-bottom">
            <div class="logo col-auto">
                <a href="<?php echo get_home_url() ?>" class="footer-logo">
                    <?php echo wp_get_attachment_image( $logo['ID'], 'full' ) ?>
                </a>
            </div>
            <div class="copyright-column col-12 col-xl-auto">
                <p class="copyright">
                    © <?php echo date('Y') ?> Gateway Arts, All Rights Reserved.
                    <a href="#" class="privacy-policy">Privacy Policy</a>
                </p>
            </div>
            <?php if ( $socialLinks ) : ?>
            <div class="social col-auto">
                <ul class="social-links">
                    <?php foreach ( $socialLinks as $link ) : ?>
                        <li>
                            <a href="<?php echo $link['url'] ?>">
                                <div class="icon"><?php echo $link['icon'] ?></div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Team Members Bio Drawer -->
<?php
global $allGridTeamMembers;
if ( $allGridTeamMembers ) : ?>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="team-members-bio-drawer" aria-labelledby="offcanvasLabel">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

        <div class="offcanvas-body">
            <?php foreach ( $allGridTeamMembers as $key => $teamMember ) : ?>
                <div class="team-member" data-id="<?php echo $key ?>">
                    <h3><?php echo $teamMember['name'] ?></h3>
                    <?php echo $teamMember['bio'] ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>