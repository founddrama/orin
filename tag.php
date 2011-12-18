<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

get_header(); ?>

		<h1><?php
			printf( __( 'Tag Archives: %s', 'starkers' ), '' . single_tag_title( '', false ) . '' );
		?></h1>
<?php
	get_template_part( 'loop', 'tag' );
	get_footer(); ?>
