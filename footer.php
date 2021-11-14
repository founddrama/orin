<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */
?>
      </section><?php /* / .orin-chronology */ ?>
      <?php 
        if ( ! is_404() ) {
          get_sidebar();
        }
      ?>
    </section><?php /* / .orin-container */ ?>
  </div><?php /* / .orin-ct-wrap */ ?>

  <footer class="orin-footer">
  
    <section>
      <?php get_sidebar( 'footer' ); ?>
    </section>

    <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
      <?php bloginfo( 'name' ); ?>
    </a>

    <?php do_action( 'starkers_credits' ); ?>
    
    <a href="<?php echo esc_url( __('http://wordpress.org/', 'starkers') ); ?>" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'starkers'); ?>" rel="generator"> 
      <?php printf( __('Proudly powered by %s.', 'starkers'), 'WordPress' ); ?>
    </a>

  </footer>

<?php
  // get your js includes ABOVE anything that might get added dynamically from wp_footer: 
  include (TEMPLATEPATH . '/js-includes.php');
  /**
   * Always have wp_footer() just before the closing </body>
   * tag of your theme, or you will break many plugins, which
   * generally use this hook to reference JavaScript files.
   */
  wp_footer();
?>
</body>
</html>
