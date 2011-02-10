<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */
?>

	<aside>
		<ul>

<?php
	/**
	 * Special single-post-only widgets (e.g., "Related Posts")
	 */
	if ( is_single() && is_active_sidebar( 'single-post-widgets' ) ) :
			
			dynamic_sidebar( 'single-post-widgets' );
			
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	elseif ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li>
				<?php get_search_form(); ?>
			</li>

			<li>
				<h3><?php _e( 'Archives', 'starkers' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li>
				<h3><?php _e( 'Meta', 'starkers' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
		</ul>

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

			<ul>
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>

<?php endif; ?>
	
	</aside>