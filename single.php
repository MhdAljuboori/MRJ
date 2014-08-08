<?php
/**
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
          get_template_part( 'content-single', get_post_format() );
        ?>

        <?php endwhile; endif; ?>
      <?php endif; ?>
      </div>
      <? get_sidebar(); ?>
    </div>

  </section>


  <? get_footer(); ?>