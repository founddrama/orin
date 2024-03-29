<?php
/**
 * Template Name: One column, no sidebar
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    
      <header>
        <h2><?php the_title(); ?></h2>
      </header>
          
        <?php the_content(); ?>
            
        <?php wp_link_pages( array( 'before' => '<nav>' . __( 'Pages:', 'starkers' ), 'after' => '</nav>' ) ); ?>
            
      <footer>
        <?php orin_edit_post_link(); ?>
      </footer>

        <?php comments_template( '', true ); ?>
        
    </article>

<?php endwhile; ?>

<?php get_footer(); ?>
