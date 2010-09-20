<?php
/**
 * The template for displaying Author Archive pages.
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

				<h1><?php printf( __( 'Author Archives: %s', 'starkers' ), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h1>

<?php
// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : ?>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'starkers_author_bio_avatar_size', 60 ) ); ?>
				<h2><?php printf( __( 'About %s', 'starkers' ), get_the_author() ); ?></h2>
				<?php the_author_meta( 'description' ); ?>
<?php endif; ?>

<?php
	rewind_posts();

	get_template_part( 'loop', 'author' );
?>

	</section> <?php /* / #orin-chronology */ ?>
	<?php get_sidebar(); ?>
</section> <?php /* / #orin-container */ ?>
	
<?php get_footer(); ?>