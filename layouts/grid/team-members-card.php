<?php
$id = $teamMember->ID;
$featuredImage = get_the_post_thumbnail( $id );
$title = get_field('title', $id );
$textLink = get_field( 'thumbnail_text_link' , $id );

// Add team member bio to array if exists
global $allGridTeamMembers;

$bio = get_field('bio', $teamMember->ID);
if ( $bio && !$allGridTeamMembers[$id] ) {
    $allGridTeamMembers[$id]['name'] = $teamMember->post_title;
    $allGridTeamMembers[$id]['bio'] = $bio;
}
?>

<div class="card text-center">
    <!-- Image -->
    <?php if ( $featuredImage && $imageType !== 'No Image' ) : ?>
        <?php echo $featuredImage ?>
    <?php endif; ?>
    <div class="card-body">
        <!-- Header -->
        <?php if( $teamMember->post_title ) : ?>
            <h3 class="card-title"><?php echo $teamMember->post_title ?></h3>
        <?php endif; ?>
        <!-- Title -->
        <?php if ( $title ) : ?>
            <p class="mb-0"><?php echo $title ?></p>
        <?php endif; ?>
        <!-- Link -->
        <?php
        if ( $textLink ) : ?>
            <p class="mb-0">
                <?php if( $bio ) : ?>
                    <a href="#" class="team-member-open-drawer" data-id="<?php echo $id ?>">
                        <?php echo $textLink['title'] ?>
                    </a>
                <?php else : ?>
                    <a href="<?php echo $textLink['url'] ?>" target="<?php echo $textLink['target'] ?>">
                        <?php echo $textLink['title'] ?>
                    </a>
                <?php endif; ?>
            </p>
        <?php endif; ?>
    </div>
</div>