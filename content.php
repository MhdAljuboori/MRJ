<?php
/**
 * @package MRJ
 * @since   MRJ 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <a class="article-title" href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
  <?php if (has_post_thumbnail() ): ?>
    <?php
      $domsxe = simplexml_load_string(get_the_post_thumbnail());
      $thumbnailsrc = $domsxe->attributes()->src;
    ?>
    <div class="article-cover" style="background-image: url(<?php printf ( $thumbnailsrc ) ?>)"></div>
  <?php endif; ?>
  <p>
    <?php printf ( wp_trim_words( get_the_excerpt(), 100, null ) ); ?>
    <a href="<?php the_permalink(); ?>"><?php printf ( __( 'More', 'mrj' ) ); ?></a>
  </p>
  <div class="article-footer">
    <?php edit_post_link( __( 'Edit', 'mrj' )); ?>
    <?php comments_popup_link( __( 'Comment', 'mrj' ), __( '1 Comment', 'mrj' ), __( '% Comments', 'mrj' ) ); ?>
  </div>
  <div class="article-separator"></div>
</article>