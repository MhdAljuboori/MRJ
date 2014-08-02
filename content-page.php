<?php
/**
 * @package MRJ
 * @since   MRJ 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <h1><?php the_title(); ?></h1>
  <div class="article-footer">
    <?php edit_post_link( __( 'Edit', 'mrj' )); ?>
    <a href="#comments"><?php printf ( __( 'Comment', 'mrj' ) ); ?></a>
  </div>
  <p>
    <?php the_content(); ?>
  </p>
  <div class="article-separator"></div>

  <?php comments_template(); ?>

  <?php
    ob_start();
    comment_form( mrj_comment_form_args() );
    $form = ob_get_clean();
    echo str_replace('id="submit"', 'class="btn btn-success"', $form);
  ?>
</article>