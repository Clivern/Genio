<?php
/**
 * The template part for search form
 *
 * @package genio-wt
 */

?>
<div class="md-padder">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-group">
    			<input type="search" value="<?php if ( is_search() ) { echo esc_html( get_search_query() ); } ?>" name="s" class="form-control search-field" placeholder="<?php esc_attr_e('Type and hit enter to search', 'genio_wt_lang'); ?>">
			<span class="form-control-feedback fa fa-search"></span>
		</div>
	</form>
</div>