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

          <div class="sidebar-content" id="widgetized-area">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('widgetized-area')) : else : ?>

          	<div class="pre-widget">
          		<p><strong>Widgetized Area</strong></p>
          		<p>This panel is active and ready for you to add some widgets via the WP Admin</p>
          	</div>

          	<?php endif; ?>
          </div>