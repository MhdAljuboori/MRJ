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
    <a href="#respond"><?php printf ( __( 'Comment', 'mrj' ) ); ?> </a>
  </div>
  <?php if (has_post_thumbnail() ): ?>
    <?php
    $domsxe = simplexml_load_string(get_the_post_thumbnail());
    $thumbnailsrc = $domsxe->attributes()->src;
    ?>
    <div class="article-cover" style="background-image: url(<?php printf ( $thumbnailsrc ); ?>)"></div>
  <?php endif; ?>
  <p>
    <?php the_content(); ?>
  </p>

  <div class="article-separator"></div>

  <?php if (get_the_tag_list()) : ?>
    <h4><?php printf ( __( 'Tags:', 'mrj' ) ); ?></h4>
    <?php printf ( get_the_tag_list('<ul class="list-unstyled tags-list"><li>','</li><li>','</li></ul>') ); ?>
  <?php endif; ?>

  <div class="article-separator"></div>

  <?php comments_template(); ?>

  <?php
    ob_start();
    comment_form( mrj_comment_form_args() );
    $form = ob_get_clean();
    echo str_replace('id="submit"', 'class="btn btn-success"', $form);
  ?>
</article>