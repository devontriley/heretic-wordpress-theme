<?php get_header(); ?>

<?php
$serviceLayoutCounter = 0;
$serviceModules = get_field( 'service_modules' );
?>

<div class="container-xl">
    <div class="service-container">
        <div class="row">
            <div class="content-column col-lg-7">
                <h1><?php the_title() ?></h1>
                <nav class="service-nav">
                    <ul>
                        <?php if ( $serviceModules ) : ?>
                            <?php foreach( $serviceModules as $key => $module)  : ?>
                                <li>
                                    <a href="#service-layout-<?php echo $key ?>" data-anchor="<?php echo $key ?>" class="<?php if ( $key === 0 ) { echo 'active'; } ?>">
                                        <?php echo $module['acfe_flexible_layout_title'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
                <div class="service-content">
                    <?php if(has_flexible('service_modules')): ?>
                        <?php the_flexible('service_modules'); ?>
                        <?php $serviceLayoutCounter++; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="sidebar-column col-lg-5">
                <section class="service-sidebar">
                    <div class="row">
                        <div class="col-12">
                            <div class="service-sidebar-box">
                                <span class="service-sidebar-box-header service-name">Service Name</span>
                                <h2><?php the_title() ?></h2>
                            </div>
                        </div>
                        <?php
                        $categories = get_terms(array(
                            'taxonomy' => 'services-categories',
                            'hide_empty' => false,
                            'parent' => 0
                        ));
                        foreach ( $categories as $cat ) :
                            $terms = wp_get_post_terms( get_the_ID(), 'services-categories', array(
                                'parent' => $cat->term_id
                            ));
                            if ( ! empty( $terms ) ) : ?>

                                <div class="col-12 col-md-6">
                                    <div class="service-sidebar-box">
                                        <span class="service-sidebar-box-header"><?php echo $cat->name ?></span>
                                        <ul class="service-category-pills">
                                            <?php foreach ( $terms as $term ) : ?>
                                                <li><?php echo $term->name ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>

        <!-- ACF Modules -->
        <?php
        if(has_flexible('Modules')):
            the_flexible('Modules');
        endif;
        ?>

        <!-- Related Services -->
        <!--
        <div class="col-12">
            <div class="layout-grid articles">
                <div class="related-services">
                    <h2 class="h1">Related Services:</h2>
                    <?php
                    $services = new WP_Query(array(
                        'post_type' => 'services',
                        'posts_per_page' => 4
                    ));

                    if ( $services->found_posts ) : ?>

                        <div class="row">
                            <?php foreach ( $services->posts as $key => $service ) :
                                $serviceExcerpt = get_field( 'service_excerpt', $service->ID );
                                $fImage = wp_get_attachment_image( get_post_thumbnail_id( $service->ID ), 'medium' );
                                $serviceCats = wp_get_post_terms( $service->ID, array(
                                    'taxonomy' => 'services-categories'
                                )); ?>

                                <div class="grid col-sm-6 col-md-6 col-lg-3">
                                    <div class="card">
                                        <?php if ( $service ) : ?>
                                            <a href="<?php echo get_permalink( $service->ID ); ?>" target="" class="cover-link"></a>
                                        <?php endif; ?>
                                        <div class="image">
                                            <?php if ( $fImage ) : ?>
                                                <?php echo $fImage ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-body">
                                            <?php if( $service->post_title ) : ?>
                                                <h3 class="card-title"><?php echo $service->post_title ?></h3>
                                            <?php endif; ?>
                                            <?php if ( $serviceExcerpt ) : ?>
                                                <p class="excerpt"><?php echo $serviceExcerpt ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        -->
    </div>
</div>

<?php get_footer(); ?>