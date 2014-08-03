<?php load_theme_textdomain( 'mrj', get_template_directory() . '/languages' ); ?>

<?php

  /**
   * Add default posts and comments RSS feed links to head
   */
  add_theme_support( 'automatic-feed-links' );

  /**
   * Enable Custom Header
   */
  $args = array(
  	'width'         => 200,
  	'height'        => 200,
  	'default-image' => get_template_directory_uri() . '/images/header.jpg',
  	'uploads'       => true,
  );
  add_theme_support( 'custom-header', $args );

  // Enable support for HTML5 markup.
  add_theme_support(
  	'html5', array(
  		'comment-list',
  		'search-form',
  		'comment-form',
  		'gallery',
  	)
  );

  /**
   * Enable Post Thumbnails
   */
  add_theme_support( 'post-thumbnails' );

  /**
   * Returns the proper schema type
   */
  function mrj_html_tag_schema() {
  	$schema = 'http://schema.org/';

  	// Is single post
  	if ( is_single() ) {
  		$type = "Article";
  	} // Contact form page ID
  	else {
  		if ( is_page( 1 ) ) {
  			$type = 'ContactPage';
  		} // Is author page
  		elseif ( is_author() ) {
  			$type = 'ProfilePage';
  		} // Is search results page
  		elseif ( is_search() ) {
  			$type = 'SearchResultsPage';
  		} // Is of movie post type
  		elseif ( is_singular( 'movies' ) ) {
  			$type = 'Movie';
  		} // Is of book post type
  		elseif ( is_singular( 'books' ) ) {
  			$type = 'Book';
  		} else {
  			$type = 'WebPage';
  		}
  	}

  	printf ( 'itemscope="itemscope" itemtype="' . $schema . $type . '"' );
  }


  /**
	 * Arguments for comment_form()
	 *
	 * @return array
	 */
  function mrj_comment_form_args() {

    $user      = wp_get_current_user();
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? " aria-required='true'" : '' );

		$args = array(
      'id_form'           => 'commentform',
      'id_submit'         => 'submit',
      'title_reply'       => '',
      'title_reply'       => __( 'Leave a Comment', 'mrj' ),
      'title_reply_to'    => __( 'Leave a Reply to %s', 'mrj' ),
      'cancel_reply_link' => __( 'Cancel Reply', 'mrj' ),
      'label_submit'      => __( 'Post Comment', 'mrj' ),

      'comment_field' =>  '<div class="form-group"><label for="comment" class="control-label">' . __( 'Comment', 'mrj' ) .
        '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control">' .
        '</textarea></div>',

      'must_log_in' => '<p class="must-log-in">' .
        sprintf(
          __( 'You must be <a href="%s">logged in</a> to post a comment.', 'mrj' ),
          wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
        ) . '</p>',

      'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
        __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'mrj' ),
          admin_url( 'profile.php' ),
          $user->display_name,
          wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
        ) . '</p>',

      'comment_notes_before' => '',

      'comment_notes_after' => '',

      'fields' => apply_filters( 'comment_form_default_fields', array(

        'author' =>
          '<div class="form-group">' .
          '<label class="control-label" for="author">' . __( 'Name', 'mrj' ) . '</label> ' .
          ( $req ? '<span class="required">*</span>' : '' ) .
          '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
          '" class="form-control"' . $aria_req . ' placeholder="' . __('Your Name', 'mrj')  . '" /></div>',

        'email' =>
          '<div class="form-group"><label class="control-label" for="email">' . __( 'Email', 'mrj' ) . '</label> ' .
          ( $req ? '<span class="required">*</span>' : '' ) .
          '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
          '" class="form-control"' . $aria_req . ' placeholder="' . __('Your Email', 'mrj')  . '" /></div>',

        'url' =>
          '<div class="form-group"><label class="control-label" for="url">' .
          __( 'Website', 'mrj' ) . '</label>' .
          '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
          '" class="form-control" placeholder="' . __('Your Website', 'mrj')  . '" /></div>'
        )
      ),
    );

    return $args;
  }


  function mrj_comment($comment, $args, $depth) {
  	$GLOBALS['comment'] = $comment;
  	$comment_content_class = '';
    ?>
    	<li id="comment-<?php comment_ID() ?>">
  	    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

    	    <div class="comment-author vcard">
          	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
          	<?php printf( __( '<cite class="author-name">%s</cite>:', 'mrj' ), get_comment_author_link() ); ?>
          	<small class="vsmall">
          	  <a href="<?php printf ( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
          		  <?php
            			/* translators: 1: date, 2: time */
            			printf( __( '%1$s at %2$s', 'mrj' ), get_comment_date(),  get_comment_time() );
            		?>
        			</a>
        			<?php edit_comment_link( __( '(Edit)', 'mrj' ), '  ', '' );?>
          	</small>
    	    </div>
        	<?php if ( $comment->comment_approved == '0' ) : ?>
        		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'mrj' ); ?></em>
        		<br />
        	<?php endif; ?>

    	    <?php comment_text(); ?>

        	<div class="reply">
        	  <?php comment_reply_link(
              array_merge(
                $args,
                array(
                  'depth' => $depth,
                  'max_depth' => $args['max_depth'],
                  'reply_text' => __( 'Leave a Reply', 'mrj' )
                )
              ));
            ?>
        	</div>

    	</div>
    </li>
    <?php
  }

  /**
   * Register our sidebars and widgetized areas.
   *
   */
  if (function_exists('register_sidebar')) {

  	register_sidebar(array(
  		'name' => 'Widgetized Area',
  		'id'   => 'widgetized-area',
  		'description'   => 'This is a widgetized area.',
  		'before_widget' => '<div id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</div>',
  		'before_title'  => '<h3>',
  		'after_title'   => '</h3>'
  	));

  }

  function mrj_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      //wp_enqueue_script( 'comment-reply' );

      //TODO Change me
      ?>
      <script type="text/javascript" src="<?php printf ( get_template_directory_uri() ); ?>../../../../wp-includes/js/comment-reply.min.js"></script>
      <?php
    }
  }

  add_action( 'wp_enqueue_scripts', 'mrj_enqueue_comment_reply' );
?>

