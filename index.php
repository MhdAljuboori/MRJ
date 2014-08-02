<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MRJ
 * @since   MRJ 1.0
 */
?>

<? get_header(); ?>

    <div class="main-content">
      <div class="website-content">
        <?php if ( have_posts() ) : ?>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php
      					/* Include the Post-Format-specific template for the content.
      					 * If you want to override this in a child theme then include a file
      					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
      					 */
      					get_template_part( 'content', get_post_format() );
      					?>

          <?php endwhile; endif; ?>
        <?php endif; ?>
        <div class="posts-nav">
          <div class="pull-right">
          <?php echo get_next_posts_link(); ?>
          </div>
          <div>
          <?php echo get_previous_posts_link(); ?>
          </div>
        </div>
      </div>

      <? get_sidebar(); ?>

    </div>

  </section>

  <? get_footer(); ?>