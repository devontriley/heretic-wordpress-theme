<?php

// Variable to store all team members from all grid modules on a page that have bios
// which lets me echo them all out into a single drawer in footer.php
$allGridTeamMembers = array();

// Variable to keep count of all the layouts on a page
$layoutCounter = 0;

// Load Composer’s autoloader
// require_once (__DIR__.'/vendor/autoload.php');

// Theme support
if (function_exists('add_theme_support')) {
    add_theme_support( 'post-thumbnails' );
}

// Woocommerce support
function heretic_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'heretic_add_woocommerce_support' );

// Remove default content editor
add_action('admin_init', 'remove_textarea');
function remove_textarea() {
    remove_post_type_support( 'page', 'editor' );
}

// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);
add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );
    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );
    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );

// Allow SVG uploads
function heretic_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'heretic_mime_types');

// Register admin styles and scripts
function heretic_enqueue_admin_script( $hook ) {
    global $pagenow;

    if( $pagenow === 'post.php' ) {
        // Bootstrap
        wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', array(), '5.2.3' );
        // Bootstrap Icons
        wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css', array(), '1.10.3' );
    }
}
add_action( 'admin_enqueue_scripts', 'heretic_enqueue_admin_script' );

// Register styles
if (!function_exists('register_heretic_styles')) :
    function register_heretic_styles() {
        $postType = get_post_type();

        // Heretic theme styles
        wp_enqueue_style( 'heretic-style', get_stylesheet_uri(), array(), time() );

        // Woocommerce product archive
        if ( is_page( 'shop' ) || is_tax( 'product_cat') || is_singular( 'product' ) ) {
            wp_enqueue_style( 'heretic-layout-rte', get_template_directory_uri().'/layouts/rte/style.css', array() );
            wp_enqueue_style( 'heretic-layout-grid', get_template_directory_uri().'/layouts/grid/style.css', array() );
            wp_enqueue_style( 'heretic-layout-big-cta', get_template_directory_uri().'/layouts/big-cta/style.css', array() );
            wp_enqueue_style( 'heretic-layout-colored-icon-boxes', get_template_directory_uri().'/layouts/colored-icon-cards/style.css', array() );
        }

        // Services Landing Page
        if ( is_page_template( 'page-services.php' ) ) {
            wp_enqueue_style( 'heretic-layout-grid', get_template_directory_uri().'/layouts/grid/style.css', array() );
        }

        // Service single
        if ( $postType === 'services' ) {
            wp_enqueue_style( 'heretic-layout-grid', get_template_directory_uri().'/layouts/grid/style.css', array() );
        }

        // Search
        if ( is_search() ) {
            wp_enqueue_style( 'heretic-layout-grid', get_template_directory_uri().'/layouts/grid/style.css', array() );
        }
    }
endif;
add_action( 'wp_enqueue_scripts', 'register_heretic_styles' );

// Register scripts
if (!function_exists('heretic_scripts')) :
    function heretic_scripts() {
        $postType = get_post_type();

        // Bootstrap
        wp_enqueue_script( 'bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array(), '5.2.3', true );
        //  Reframe.js
        wp_enqueue_script( 'reframejs', get_template_directory_uri().'/node_modules/reframe.js/dist/reframe.min.js', array(), '4.0.1', true );
        // Glide.js
        wp_enqueue_script( 'glidejs', get_template_directory_uri().'/node_modules/@glidejs/glide/dist/glide.js', array(), '3.6', true);
        // Simple Lightbox
        wp_enqueue_script( 'simplelightboxjs', get_template_directory_uri().'/node_modules/simplelightbox/dist/simple-lightbox.js', array('jquery'), '2.12.1', true );
        // Heretic theme scripts
        wp_enqueue_script( 'heretic-script', get_template_directory_uri().'/main.js', array('jquery'), '1.0', true );
        // Password strength for registration form
        // wp_enqueue_script( 'password-strength-meter' );

        // Search page
        if ( is_search() ) {
            wp_enqueue_script( 'layout-grid', get_template_directory_uri().'/layouts/grid/script.min.js', array(), '1.0', true );
        }
    }
endif;
add_action( 'wp_enqueue_scripts', 'heretic_scripts' );

// Remove product has_archive
function heretic_custom_post_type_args( $args, $post_type ) {
    if ( $post_type === 'product' ) {
        $args['has_archive'] = false;
    }
    return $args;
}
add_filter( 'register_post_type_args', 'heretic_custom_post_type_args', 20, 2 );

// Register menus
register_nav_menus(
    array(
        'primary-menu' => __( 'Primary Menu', 'heretic' ),
        'footer-menu-1' => __( 'Footer Menu 1', 'heretic' ),
        'footer-menu-2' => __( 'Footer Menu 2', 'heretic' ),
        'footer-menu-3' => __( 'Footer Menu 3', 'heretic' ),
        'footer-menu-4' => __( 'Footer Menu 4', 'heretic' )
    )
);

// Create ACF options pages
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

// Include shortcodes
//include('includes/shortcodes.php');

// Hide admin toolbar when logged in
function heretic_remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
//add_action('after_setup_theme', 'heretic_remove_admin_bar');

// Register custom post types
function heretic_register_custom_post_types() {
    register_post_type('team-members',
        array(
            'labels'      => array(
                'name'          => 'Team Members',
                'singular_name' => 'Team Member'
            ),
            'menu_icon' => 'dashicons-admin-users',
            'public'      => true,
            'publicly_queryable' => true,
            'has_archive' => false,
            'taxonomies' => array(),
            'hierarchical' => true,
            'supports' => array( 'title', 'thumbnail', 'slug' )
        )
    );

    register_post_type('artists',
        array(
            'labels' => array(
                'name'          => 'Artists',
                'singular_name' => 'Artist'
            ),
            'menu_icon' => 'dashicons-admin-customizer',
            'public' => true,
            'publicly_queryable' => true,
            'has_archive' => false,
            'taxonomies' => array(),
            'hierarchical' => true,
            'supports' => array( 'title', 'thumbnail', 'slug' )
        )
    );

    register_post_type('services',
        array(
            'labels' => array(
                'name'          => 'Services',
                'singular_name' => 'Service'
            ),
            'menu_icon' => 'dashicons-list-view',
            'public' => true,
            'publicly_queryable' => true,
            'has_archive' => false,
            'taxonomies' => array(),
            'hierarchical' => true,
            'supports' => array( 'title', 'thumbnail', 'slug' )
        )
    );
}
add_action('init', 'heretic_register_custom_post_types');

// Register custom taxonomies
function register_custom_taxonomies() {
    $labels = array(
        'name'              => 'Services Categories',
        'singular_name'     => 'Services Category',
        'search_items'      => 'Search Services Categories',
        'all_items'         => 'All Services Categories',
        'parent_item'       => 'Parent Services Category',
        'parent_item_colon' => 'Parent Services Category:',
        'edit_item'         => 'Edit Services Category',
        'update_item'       => 'Update Services Category',
        'add_new_item'      => 'Add New Services Category',
        'new_item_name'     => 'New Services Category Name',
        'menu_name'         => 'Services Categories',
    );
    $args   = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'services-category' ],
    );
    register_taxonomy( 'services-categories', [ 'services' ], $args );

    $labels = array(
        'name'              => 'Services Tags',
        'singular_name'     => 'Services Tag',
        'search_items'      => 'Search Services Tags',
        'all_items'         => 'All Services Tags',
        'parent_item'       => 'Parent Services Tag',
        'parent_item_colon' => 'Parent Services Tag:',
        'edit_item'         => 'Edit Services Tag',
        'update_item'       => 'Update Services Tag',
        'add_new_item'      => 'Add New Services Tag',
        'new_item_name'     => 'New Services Tag Name',
        'menu_name'         => 'Services Tags',
    );
    $args   = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'services-tag' ],
    );
    register_taxonomy( 'services-tags', [ 'services' ], $args );
}
add_action( 'init', 'register_custom_taxonomies' );

// Add Admin Product Types filter
function products_taxonomy_filter($post_type) {
    if( $post_type == 'products' ) {
        $taxonomy_names = array('product-type');
        foreach ($taxonomy_names as $single_taxonomy) {
            $current_taxonomy = isset( $_GET[$single_taxonomy] ) ? $_GET[$single_taxonomy] : '';
            $taxonomy_object = get_taxonomy( $single_taxonomy );
            $taxonomy_name = strtolower( $taxonomy_object->labels->name );
            $taxonomy_terms = get_terms( $single_taxonomy );
            if(count($taxonomy_terms) > 0) {
                echo "<select name='$single_taxonomy' id='$single_taxonomy'>";
                echo "<option value=''>All $taxonomy_name</option>";
                foreach ($taxonomy_terms as $single_term) {
                    echo '<option value='. $single_term->slug, $current_taxonomy == $single_term->slug ? ' selected="selected"' : '','>' . $single_term->name .' (' . $single_term->count .')</option>';
                }
                echo "</select>";
            }
        }
    }
}
//add_action( 'restrict_manage_posts', 'products_taxonomy_filter' );

// Add headers above facets
function fwp_add_facet_labels() {
    ?>
    <script>
        (function($) {
            $(document).on('facetwp-loaded', function() {
                $('.facetwp-facet').each(function() {
                    let facet = $(this);
                    let facet_name = facet.attr('data-name');
                    let facet_type = facet.attr('data-type');
                    let facet_label = FWP.settings.labels[facet_name];
                    if (facet_type !== 'pager' && facet_type !== 'sort') {
                        if (facet.closest('.facet-wrap').length < 1 && facet.closest('.facetwp-flyout').length < 1) {
                            facet.wrap('<div class="facet-wrap"></div>');
                            facet.before('<p class="facet-label"><strong>' + facet_label + '</strong></p>');
                        }
                    }
                });
            });
        })(jQuery);
    </script>
    <?php
}
add_action( 'wp_head', 'fwp_add_facet_labels', 100 );

// Alter frontend search query
function heretic_filter_search( $query ) {
    if ( $query->is_search && !is_admin() ) {
        $postsPerPage = '4';

        switch ( $query->query['post_type'] ) :
            case 'post':
                $postsPerPage = '6';
                break;
            case 'page':
                $postsPerPage = '8';
                break;
        endswitch;

        $query->set( 'posts_per_page', 1 );
    }
    return $query;
}
add_filter( 'pre_get_posts','heretic_filter_search' );


// ACF Layout Thumbnails

// Hero thumbnail
function hero_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/hero/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=hero', 'hero_layout_thumbnail', 10, 3);
// RTE thumbnail
function rte_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/rte/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=rte', 'rte_layout_thumbnail', 10, 3);
// Grid thumbnail
function grid_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/grid/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=grid', 'grid_layout_thumbnail', 10, 3);
// Testimonials thumbnail
function testimonials_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/testimonials/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=testimonials', 'testimonials_layout_thumbnail', 10, 3);
// Stats thumbnail
function stats_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/stats/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=stats', 'stats_layout_thumbnail', 10, 3);
// Image Gallery thumbnail
function image_gallery_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/image-gallery/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=image_gallery', 'image_gallery_layout_thumbnail', 10, 3);
// Video thumbnail
function video_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/video/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=video', 'video_layout_thumbnail', 10, 3);
// Big CTA thumbnail
function big_cta_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/big-cta/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=big_cta', 'big_cta_layout_thumbnail', 10, 3);
// Colored Icon Boxes thumbnail
function colored_icon_cards_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/colored-icon-cards/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=colored_icon_cards', 'colored_icon_cards_layout_thumbnail', 10, 3);
// Colored Icon Boxes thumbnail
function accordion_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/accordion/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=accordion', 'accordion_layout_thumbnail', 10, 3);
// Tab Changer thumbnail
function tab_changer_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/tab-changer/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=tab_changer', 'tab_changer_layout_thumbnail', 10, 3);
// List Group thumbnail
function list_group_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/list-group/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=list_group', 'list_group_layout_thumbnail', 10, 3);
// Form thumbnail
function form_layout_thumbnail($thumbnail, $field, $layout){ return get_template_directory_uri().'/layouts/form/thumbnail.jpg'; }
add_filter('acfe/flexible/thumbnail/layout=form', 'form_layout_thumbnail', 10, 3);

include('inc/button.php');

include( 'inc/wc-template-hooks.php' );




////////////////////////////////////////////////////////////
// FROM TWENTY TWENTY ONE THEME
////////////////////////////////////////////////////////////

// SVG Icons class.
require get_template_directory() . '/classes/class-heretic-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-heretic-custom-colors.php';
new Heretic_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-heretic-customize.php';
new Heretic_Customize();

// Dark Mode.
require_once get_template_directory() . '/classes/class-heretic-dark-mode.php';
new Heretic_Dark_Mode();

/**
 * Calculate classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function heretic_the_html_classes() {
    /**
     * Filters the classes for the main <html> element.
     *
     * @since Twenty Twenty-One 1.0
     *
     * @param string The list of classes. Default empty string.
     */
    $classes = apply_filters( 'heretic_html_classes', '' );
    if ( ! $classes ) {
        return;
    }
    echo 'class="' . esc_attr( $classes ) . '"';
}