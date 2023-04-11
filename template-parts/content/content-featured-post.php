<?php
$classes = 'featured-post';
if( is_singular( 'post' ) ) $classes .= ' post-single-header';

$postID = get_the_ID();
$postTitle = get_the_title ( $postID );
$categories = get_the_category();
$permalink = get_the_permalink( $postID );
?>

<?php if ( ! is_singular( 'post' ) ) : ?>
<article id="post-<?php echo $postID ?>" <?php post_class( $classes ); ?>>
<?php else : ?>
<div <?php post_class ( $classes ); ?>>
<?php endif; ?>
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <div class="row">
                <div class="col-md-7 col-lg-5">
                    <?php if ( count($categories) > 1 || $categories[0]->term_id !== 1 ) : ?>
                        <p class="post-categories">
                            <?php foreach ( $categories as $key => $cat ) : ?>
                                <a href="<?php echo get_term_link( $cat->term_id ); ?>"><?php echo $cat->name ?><?php if ( $key !== count($categories) - 1 ){ echo ','; }?></a>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                    <header class="entry-header">
                        <h2 class="h1">
                            <a href="<?php echo $permalink ?>">
                                <?php echo $postTitle ?>
                            </a>
                        </h2>
                    </header>
                    <div class="entry-content">
                        <p class="post-date"><?php echo get_the_date( 'F d, Y', $postID ); ?></p>
                        <?php
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
                </div>
                <div class="col-md-4 offset-md-1 col-lg-6 offset-lg-1">
                    <a href="<?php echo $permalink ?>">
                        <?php heretic_post_thumbnail(); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php if ( ! is_singular( 'post' ) ) : ?>
</article>
<?php else : ?>
</div>
<?php endif; ?>