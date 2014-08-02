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
    <div class="article-cover" style="background-image: url(<?php echo $thumbnailsrc ?>)"></div>
  <?php endif; ?>
  <p>
    <?php echo wp_trim_words( get_the_excerpt(), 100, null ); ?>
    <a href="<?php the_permalink(); ?>"><? __( 'More' ) ?></a>
  </p>
  <div class="article-footer">
    <?php edit_post_link( __( 'Edit' )); ?>
    <?php comments_popup_link( __( 'Comment' ), __( '1 Comment' ), __( '% Comments' ) ); ?>
  </div>
  <div class="article-separator"></div>
</article>