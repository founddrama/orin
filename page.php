<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

get_header(); ?>

<section id="orin-container">
	<section id="orin-chronology">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<header>
				<?php if ( is_front_page() ) { ?>
					<h2><?php the_title(); ?></h2>
				<?php } else { ?>	
					<h1><?php the_title(); ?></h1>
				<?php } ?>
			</header>				

				<?php the_content(); ?>
						
				<?php wp_link_pages( array( 'before' => '<nav>' . __( 'Pages:', 'starkers' ), 'after' => '</nav>' ) ); ?>
						
			<footer>
				<?php orin_edit_post_link(); ?>
			</footer>

				<?php comments_template( '', true ); ?>
				
		</article>

<?php endwhile; ?>

	</section><?php /* / #orin-container */ ?>
	<?php get_sidebar(); ?>
</section> <?php /* / #orin-chronology */ ?>

<?php get_footer(); ?>