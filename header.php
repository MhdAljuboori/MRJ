<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="main-content">
 *
 * @package MRJ
 * @since   MRJ 1.0
 */
?>

<!DOCTYPE html>
<html <?php mrj_html_tag_schema(); ?> <?php language_attributes(); ?> >

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    <?php
      wp_title( '|', true, 'right' );
      bloginfo( 'name' );
    ?>
  </title>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
  <link href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/css/font.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css">

  <?php wp_head(); ?>
</head>

<body>
  <section class="main-section">
    <header class="website-header">
      <?php if ( get_header_image() ) : ?>
        <a href="<?php echo get_option('home'); ?>">
          <img class="img-circle website-cover" src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="200">
        </a>
		  <?php endif; ?>


      <a href="<?php echo get_option('home'); ?>">
        <h1 class="website-name">
          <?php echo get_bloginfo( 'name', 'display' ) ?>
        </h1>
      </a>
      <p class="website-description">
        <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>
      </p>

      <ul class="list-unstyled pages-list">
        <?php wp_list_pages('title_li='); ?>
      </ul>
      <?php get_search_form(); ?>
    </header>