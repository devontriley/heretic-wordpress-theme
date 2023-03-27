<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$heretic_unique_id = wp_unique_id( 'search-form-' );
$heretic_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';

$postTypeParam = $_GET['post_type'];
?>

<form
    role="search" <?php echo $heretic_aria_label; ?>
    method="get"
    class="search-form"
    action="<?php echo esc_url( home_url( '/' ) ); ?>"
>
	<label for="<?php echo esc_attr( $heretic_unique_id ); ?>" class="form-label">
        <?php _e( 'Search', 'heretic' ); ?>
    </label>

    <div class="position-relative">
        <input
                type="search"
                id="<?php echo esc_attr( $heretic_unique_id ); ?>"
                class="search-term form-control mb-3"
                value="<?php echo get_search_query(); ?>"
                name="s"
        />

        <button
                type="submit"
                class="search-submit"
                value="<?php echo esc_attr_x( 'Search', 'submit button', 'heretic' ); ?>"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>

    <select name="post_type" class="form-select">
        <option value="post" <?php if ( $postTypeParam === 'post' ){ echo 'selected'; }?>>Posts</option>
        <option value="page" <?php if ( $postTypeParam === 'page' ){ echo 'selected'; }?>>Pages</option>
        <option value="artists" <?php if ( $postTypeParam === 'artists' ){ echo 'selected'; }?>>Artists</option>
        <option value="services" <?php if ( $postTypeParam === 'services' ){ echo 'selected'; }?>>Services</option>
        <option value="team-members" <?php if ( $postTypeParam === 'team-members' ){ echo 'selected'; }?>>Team Members</option>
        <option value="product" <?php if ( $postTypeParam === 'product' ){ echo 'selected'; }?>>Products</option>
    </select>
</form>