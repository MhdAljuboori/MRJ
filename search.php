<?php
/**
 * @package MRJ
 * @since   MRJ 1.0
 */
?>

<? get_header(); ?>

    <div class="main-content">
      <div class="website-content">
        <h1><?php printf( __( 'Search Result For: %s', 'mrj' ), '<span>"' . get_search_query() . '"</span>' ); ?></h1>
        <div class="search-result">
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
          <?php else: ?>
          <h2>
            <?php printf( __( 'No Results Found :(', 'mrj' ) ) ?>
          </h2>
          <?php endif; ?>
        </div>
        <div class="article-separator"></div>
        <br>

        <div class="tagcloud-block">
          <h3><? printf( __( 'Tag Cloud:', 'mrj' ) ) ?></h3>
          <?php wp_tag_cloud(); ?>
        </div>
        <br>

        <h3><? printf( __( 'Recent Posts:', 'mrj' ) ) ?></h3>
        <ul>
          <?php
          	$recent_posts = wp_get_recent_posts();
          	foreach( $recent_posts as $recent ){
          		printf ( '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ' );
          	}
          ?>
        </ul>
        <br>

        <h3><? printf( __( 'Categories:', 'mrj' ) ) ?></h3>
        <ul>
          <?php wp_list_categories('title_li=0'); ?>
        </ul>
        <br>
      </div>

    </div>

  </section>

  <? get_footer(); ?>