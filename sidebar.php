<?php
/**
 * The Sidebar for our theme.
 *
 * Displays all of the sidebar contnent
 *
 * @package MRJ
 * @since   MRJ 1.0
 */
?>
          <?php if (function_exists('dynamic_sidebar')) : ?>
            <div class="sidebar-content" id="widgetized-area">
              <?php if ( is_single() ) : ?>
                <?php dynamic_sidebar('article-widget'); ?>
              <?php else : ?>
                <?php if ( is_page() ) : ?>
                  <?php dynamic_sidebar('page-widget'); ?>
                <?php else : ?>
                  <?php dynamic_sidebar('home-widget'); ?>
                <?php endif; ?>
              <?php endif; ?>
            <?php else : ?>
              <div class="pre-widget">
                <p><strong>Widgetized Area</strong></p>
                <p>This panel is active and ready for you to add some widgets via the WP Admin</p>
              </div>
            </div>
          <?php endif; ?>