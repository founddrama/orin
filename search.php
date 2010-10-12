<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

get_header(); ?>

<section id="orin-container">
	<section id="orin-chronology">

<?php if ( have_posts() ) : ?>
		<h1><?php printf( __( 'Search Results for: %s', 'starkers' ), '' . get_search_query() . '' ); ?></h1>
			<?php
				get_template_part( 'loop', 'search' );
			?>
<?php else : ?>
		<h2><?php _e( 'Nothing Found', 'starkers' ); ?></h2>
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'starkers' ); ?></p>
			<?php get_search_form(); ?>
<?php endif; ?>

	</section> <?php /* / #orin-chronology */ ?>
	<?php get_sidebar(); ?>
</section> <?php /* / #orin-container */ ?>

<?php get_footer(); ?>