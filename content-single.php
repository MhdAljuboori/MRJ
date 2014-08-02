<?php
/**
 * @package MRJ
 * @since   MRJ 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <h1><?php the_title(); ?></h1>
  <div class="article-footer">
    <?php edit_post_link( __( 'Edit' )); ?>
    <a href="#comments"><? echo __( 'Comment' ) ?> </a>
  </div>
  <?php if (has_post_thumbnail() ): ?>
    <?php
    $domsxe = simplexml_load_string(get_the_post_thumbnail());
    $thumbnailsrc = $domsxe->attributes()->src;
    ?>
    <div class="article-cover" style="background-image: url(<?php echo $thumbnailsrc ?>)"></div>
  <?php endif; ?>
  <p>
    <?php the_content(); ?>
  </p>
  <div class="article-separator"></div>

  <?php comments_template(); ?>

  <?php
    ob_start();
    comment_form( mrj_comment_form_args() );
    $form = ob_get_clean();
    echo str_replace('id="submit"','class="btn btn-success"', $form);
  ?>
</article>