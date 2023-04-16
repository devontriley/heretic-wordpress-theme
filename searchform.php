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

$getPostType = $_GET['source'];

// Get post types used by SearchWP engine
$post_types = array();
$engine_slug = 'default';
$engine_options = get_option( 'searchwp_engines' );
if ( isset( $engine_options[ $engine_slug ] ) ) {
    $engine_settings = $engine_options[ $engine_slug ];
    if ( isset( $engine_settings['sources'] ) ) {
        $sources = $engine_settings['sources'];
        foreach ( $sources as $source => $value ) {
            $post_types[] = str_replace( 'post.', '', $source );
        }
    }
}
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

    <select name="source" class="form-select">
        <?php foreach ( $post_types as $type ) :
            $typeName = ( $type === 'tribe_events' ) ? 'Events' : $type; ?>
            <option value="<?php echo $type ?>" <?php if ( $getPostType === $type ){ echo 'selected'; }?>><?php echo ucfirst( $typeName ); ?></option>
        <?php endforeach; ?>
    </select>
</form>