<?php
/**
 * The Footer for our theme.
 *
 *
 * @package MRJ
 * @since   MRJ 1.0
 */
?>

  <footer>
    <p><a href="http://mrj.mhdaljuboori.me">MRJ</a> <?php printf ( __('empowered by', 'mrj') ); ?> <a href="http://wordpress.org">WordPress</a>
    </p>
  </footer>

  <?php wp_footer(); ?>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php printf ( get_template_directory_uri() ); ?>/js/jquery-1.10.2.min.js"></script>
  <script src="<?php printf ( get_template_directory_uri() ); ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php printf ( get_template_directory_uri() ); ?>/js/index.js"></script>
</body>

</html>