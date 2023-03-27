<?php
/**
 * Customize API: Heretic_Customize_Notice_Control class
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/**
 * Customize Notice Control class.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @see WP_Customize_Control
 */
class Heretic_Customize_Notice_Control extends WP_Customize_Control {
	/**
	 * The control type.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @var string
	 */
	public $type = 'heretic-notice';

	/**
	 * Renders the control content.
	 *
	 * This simply prints the notice we need.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	public function render_content() {
		?>
		<div class="notice notice-warning">
			<p><?php esc_html_e( 'To access the Dark Mode settings, select a light background color.', 'heretic' ); ?></p>
			<p><a href="<?php echo esc_url( __( 'https://wordpress.org/support/article/heretic/#dark-mode-support', 'heretic' ) ); ?>">
				<?php esc_html_e( 'Learn more about Dark Mode.', 'heretic' ); ?>
			</a></p>
		</div><!-- .notice -->
		<?php
	}
}
