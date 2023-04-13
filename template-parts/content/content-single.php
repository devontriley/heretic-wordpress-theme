<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single' ); ?>>

    <?php get_template_part( 'template-parts/content/content-featured-post' ); ?>

	<div class="entry-content">
		<div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="row">
                    <div class="col-lg-8">
                        <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'heretic' ) . '">',
                                'after'    => '</nav>',
                                /* translators: %: Page number. */
                                'pagelink' => esc_html__( 'Page %', 'heretic' ),
                            )
                        );
                        ?>

                    </div>

                    <?php
                    $recentPosts = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post__not_in' => array( $post->ID ),
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));

                    if ( $recentPosts->have_posts() ) :
                    ?>
                    <div class="col-lg-3 offset-lg-1 recent-posts-sidebar">
                        <p class="sidebar-header">Recent</p>

                        <?php foreach ( $recentPosts->posts as $p ) : ?>
                        <div class="recent-post">
                            <a href="<?php echo get_permalink( $p->ID ) ?>" class="cover-link"></a>
                            <h3><?php echo $p->post_title ?></h3>
                            <p class="date mb-0"><?php echo get_the_date( 'F d, Y', $p->ID ) ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
	</div>

</article>
