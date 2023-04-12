<?php
$postsPage = is_home();
$centerHeader = get_sub_field( 'center_header' );
$showArticlesButton = get_sub_field( 'show_articles_button' );
$articleCount = get_sub_field( 'article_count' );
?>

<div class="container-lg">
    <?php if ( !$postsPage ) : ?>
        <div class="row">
            <div class="header col-sm-10 offset-sm-1 <?php if ( $centerHeader ) { echo 'text-center'; } else { echo 'col-md-6'; } ?> col-lg-12 offset-lg-0">
                <<?php echo $headerSize ?>>
                    <?php echo $header ?>
                </<?php echo $headerSize ?>>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="header text-center col-md-8 offset-md-2">
                <h1><?php echo get_the_title( get_option( 'page_for_posts' ) ) ?></h1>
            </div>
        </div>
    <?php endif; ?>

    <?php
    if ( ! isset( $posts ) ) {
        $posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $articleCount ?: 3,
            'offset' => is_page_template( 'page-blog-home.php' ) ? 3 : 0
        ));
        $posts = $posts->posts;
    }

    if ( $posts ) : ?>

        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                <div class="row">
                    <?php foreach ( $posts as $key => $p ) : ?>
                        <div class="grid col-sm-6 col-md-6 col-lg-4">
                            <?php include('articles-card.php') ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php if ( !$postsPage ) : ?>
            <?php if ( $showArticlesButton ) : ?>
                <div class="text-center">
                    <a href="<?php echo get_the_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-primary">See all posts</a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    <?php endif; ?>
</div>