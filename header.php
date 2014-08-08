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
  <link href="<?php printf ( get_template_directory_uri() ); ?>/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php printf ( get_template_directory_uri() ); ?>/css/font.css" rel="stylesheet" type="text/css">
  <link href="<?php printf ( get_template_directory_uri() ); ?>/style.css" rel="stylesheet" type="text/css">

  <?php wp_head(); ?>
</head>

<body>
  <section class="main-section">
    <header class="website-header">
      <?php if ( is_single() ) : ?>
        <?php mrj_auther_card_in_single_page(); ?>
      <?php else : ?>
        <?php mrj_main_header(); ?>
      <?php endif; ?>
    </header>