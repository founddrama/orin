<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage Orin
 * @since 0.1a
 */
?>

<?php
  /* The footer widget area is triggered if any of the areas
   * have widgets. So let's check that first.
   *
   * If none of the sidebars have widgets, then let's bail early.
   */
  if (   ! is_active_sidebar( 'first-footer-widget-area'  )
    && ! is_active_sidebar( 'second-footer-widget-area' )
    && ! is_active_sidebar( 'third-footer-widget-area'  )
    && ! is_active_sidebar( 'fourth-footer-widget-area' )
  )
    return;
  // If we get this far, we have widgets. Let do this.
?>

<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
    <ul>
      <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
    </ul>
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
    <ul>
      <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
    </ul>
<?php endif; ?>

<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
    <ul>
      <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
    </ul>
<?php endif; ?>

<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
    <ul>
      <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
    </ul>
<?php endif; ?>
