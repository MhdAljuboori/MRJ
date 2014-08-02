<?php
/**
 * The template for displaying search forms in MRJ
 *
 * @package MRJ
 * @since   MRJ 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php printf ( get_option('home') ); ?>">
  <div class="form-group">
    <input type="search" class="form-control search-field" placeholder="<?php printf ( __( 'Search...', 'mrj' ) ); ?>" value="" name="s" title="<?php printf ( __( 'Search for:', 'mrj' ) ); ?>" />
  </div>
</form>