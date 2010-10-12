<?php
/**
 * The template for displaying Archive pages.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

get_header(); ?>

<section id="orin-container">
	<section id="orin-chronology">

<?php
	if ( have_posts() )
		the_post();
?>

			<h1>
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: %s', 'starkers' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: %s', 'starkers' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: %s', 'starkers' ), get_the_date('Y') ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'starkers' ); ?>
<?php endif; ?>
			</h1>

<?php
	rewind_posts();

	get_template_part( 'loop', 'archive' );
?>

	</section> <?php /* / #orin-chronology */ ?>
	<?php get_sidebar(); ?>
</section> <?php /* / #orin-container */ ?>

<?php get_footer(); ?>