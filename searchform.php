<?php
/**
 * The template for displaying search forms in MRJ
 *
 * @package MRJ
 * @since   MRJ 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="form-group">
		<input type="search" class="form-control search-field" placeholder="<? __( 'Search...', 'mrj' ); ?>" value="" name="s" title="<? __( 'Search for:', 'mrj' ); ?>" />
  </div>
</form>