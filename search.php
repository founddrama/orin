<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
    <h2><?php printf( __( 'Search Results for: %s', 'starkers' ), '' . get_search_query() . '' ); ?></h2>
      <?php
        get_template_part( 'loop', 'search' );
      ?>
<?php else : ?>
    <h2><?php _e( 'Nothing Found', 'starkers' ); ?></h2>
      <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'starkers' ); ?></p>
      <?php get_search_form(); ?>
<?php endif; ?>

<?php get_footer(); ?>
