<?php
add_action( 'wp_ajax_nopriv_ajax_more_results', 'ajax_more_results' );
add_action( 'wp_ajax_ajax_more_results', 'ajax_more_results' );

function ajax_more_results(){
  $query_data = $_POST;
  $offset = $query_data['offset'];
  $key = $query_data['key'];

  // The query
  $query = array(
    'post_type' => 'product',
    'sort' => 'ASC',
    'sortby' => 'title',
    'posts_per_page' => 15,
    's' => $key,
    'offset' => $offset
  );
  $wp_query = new WP_Query($query);

  // The loop
  if( $wp_query->have_posts() ):
    woocommerce_product_loop_start();
      while( $wp_query->have_posts() ) : $wp_query->the_post();
        wc_get_template_part( 'content', 'product' );
      endwhile;
    woocommerce_product_loop_end();
  elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :
    // no more products
  endif;
  wp_reset_postdata();

  die();
}
?>