<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

get_header(); ?>

<section id="orin-container">
	<section id="orin-chronology">

				<h1><?php
					printf( __( 'Category Archives: %s', 'starkers' ), '' . single_cat_title( '', false ) . '' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				get_template_part( 'loop', 'category' );
				?>

	</section> <?php /* / #orin-chronology */ ?>
	<?php get_sidebar(); ?>
</section> <?php /* / #orin-container */ ?>

<?php get_footer(); ?>