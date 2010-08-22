<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

	  get_header(); ?>
<?php get_template_part( 'loop', 'index' ); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>