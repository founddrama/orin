<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="post-decorator">
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<header>
				<h1><?php the_title(); ?></h1>

				<?php orin_posted_on(); ?>
				<?php orin_edit_post_link(); ?>
			</header>

				<?php the_content(); ?>
						
				<?php wp_link_pages( array( 'before' => '<nav>' . __( 'Pages:', 'starkers' ), 'after' => '</nav>' ) ); ?>
			
				<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'starkers_author_bio_avatar_size', 60 ) ); ?>
					<h2><?php printf( esc_attr__( 'About %s', 'starkers' ), get_the_author() ); ?></h2>
					<?php the_author_meta( 'description' ); ?>
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
							<?php printf( __( 'View all posts by %s &rarr;', 'starkers' ), get_the_author() ); ?>
						</a>
				<?php endif; ?>
				
				<footer>
					<?php orin_posted_in(); ?>
				</footer>

				<nav>
					<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'starkers' ) . ' %title' ); ?>
					<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'starkers' ) . '' ); ?>
				</nav>

				<?php comments_template( '', true ); ?>
				
		</article>
	</div><?php /* .post-decorator */ ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>