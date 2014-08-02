<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package MRJ
 * @since   MRJ 1.0
 */

get_header(); ?>

    <div class="main-content">
      <div class="website-content">
        <?php if ( have_posts() ) : ?>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php
            /* Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
            */
            get_template_part( 'content', 'page' );
          ?>
          <?php endwhile; endif; ?>
        <?php endif; ?>
      </div>

    </div>

  </section>

  <? get_footer(); ?>