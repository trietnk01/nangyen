
<div class="v-pagination">
	<ul class="page-numbers">
		<li><a class="page-numbers" href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
		<li><a class="prev page-numbers" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
		<li><a class="page-numbers" href="#">1</a></li>
		<li><span aria-current="page" class="page-numbers current">2</span></li>
		<li><a class="page-numbers" href="#">3</a></li>
		<li><a class="next page-numbers" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
		<li><a class="page-numbers" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
	</ul>
</div>

<?php
/**
 * Pagination - Show numbered pagination for catalog pages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>
<div class="v-pagination">
	<?php
		echo paginate_links( apply_filters( 'p_pagination_args', array(
			'base'         => esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false )  ) ),
			'format'       => '',
			'add_args'     => false,
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => '&larr;',
			'next_text'    => '&rarr;',
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3,
		) ) );
	?>
</div>


