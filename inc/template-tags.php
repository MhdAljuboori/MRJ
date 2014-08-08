<?php
  function mrj_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar img-circle ", $class);
    return $class;
  }

  function mrj_auther_card_in_single_page() {
    global $wp_query;
    $post_author_id = $wp_query->post->post_author;
    add_filter('get_avatar','mrj_add_gravatar_class');
    ?>

    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) ); ?>">
      <?php echo get_avatar( get_the_author_meta( 'ID', $post_author_id ), 200 ); ?>
    </a>

    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) ); ?>">
      <h1 class="website-name">
        <?php echo get_the_author_meta( 'display_name', $post_author_id ); ?>
      </h1>
    </a>

    <p class="website-description">
      <?php echo get_the_author_meta( 'description', $post_author_id ); ?>
    </p>

    <ul class="list-unstyled pages-list">
      <li>
        <a href="<?php printf ( get_option('home') ); ?>">
          <?php printf ( __( 'Home', 'mrj') ); ?>
        </a>
      </li>
    </ul>

    <?php
  }

  function mrj_main_header() {
    if ( get_header_image() ) : ?>
      <a href="<?php printf ( get_option('home') ); ?>">
        <img class="img-circle website-cover" src="<?php printf ( esc_url( get_header_image() ) ); ?>" alt="<?php printf ( esc_attr( get_bloginfo( 'name', 'display' ) ) ); ?>" width="200">
      </a>
      <a href="<?php printf ( get_option('home') ); ?>">
        <h1 class="website-name">
          <?php printf ( get_bloginfo( 'name', 'display' ) ); ?>
        </h1>
      </a>
      <p class="website-description">
        <?php printf ( esc_attr( get_bloginfo( 'description', 'display' ) ) ); ?>
      </p>
      <ul class="list-unstyled pages-list">
        <?php wp_list_pages('title_li='); ?>
      </ul>
    <?php endif; ?>
    <?php
  }
?>