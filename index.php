<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

	  get_header(); ?>

<section id="orin-container">
	<section id="orin-chronology">
		<?php get_template_part( 'loop', 'index' ); ?>
	</section>
	<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>