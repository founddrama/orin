<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

get_header(); ?>

<?php
  if ( have_posts() )
    the_post();
?>

        <h2><?php printf( __( 'Author Archives: %s', 'starkers' ), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h2>

<?php
// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : ?>
        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'starkers_author_bio_avatar_size', 60 ) ); ?>
        <h3><?php printf( __( 'About %s', 'starkers' ), get_the_author() ); ?></h3>
        <?php the_author_meta( 'description' ); ?>
<?php endif; ?>

<?php
  rewind_posts();

  get_template_part( 'loop', 'author' );
?>

<?php get_footer(); ?>
