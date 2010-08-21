<?php
/**
 * Template Name: One column, no sidebar
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<header>
				<h1><?php the_title(); ?></h1>
			</header>
					
				<?php the_content(); ?>
						
				<?php wp_link_pages( array( 'before' => '<nav>' . __( 'Pages:', 'starkers' ), 'after' => '</nav>' ) ); ?>
						
			<footer>
				<?php edit_post_link( __( 'Edit', 'starkers' ), '', '' ); ?>
			</footer>

				<?php comments_template( '', true ); ?>
				
		</article>

<?php endwhile; ?>

<?php get_footer(); ?>