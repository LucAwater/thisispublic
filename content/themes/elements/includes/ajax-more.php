<?php
// //Enqueue Ajax Scripts
// add_action( 'wp_enqueue_scripts', 'ajax_more_scripts' );
// function ajax_more_scripts() {
//   wp_enqueue_script( 'more', get_template_directory_uri() . '/js/ajax-more.js', array('jquery'), '1.0', true );
//
//   wp_localize_script( 'more', 'ajaxmore', array(
//     'ajax_url' => admin_url( 'admin-ajax.php' )
//   ));
// }

add_action( 'wp_ajax_nopriv_ajax_more', 'ajax_more' );
add_action( 'wp_ajax_ajax_more', 'ajax_more' );

function ajax_more(){
  $query_data = $_POST;
  $brand = $query_data['brand'];
  $gender = $query_data['gender'];
  $tag = $query_data['tag'];
  $offset = $query_data['offset'];

  // Build the tax query
  $tax_query = array('relation' => 'AND');

  if ( $brand == 'all') {
    $terms = get_terms( 'product_brand' );
    $term_ids = wp_list_pluck( $terms, 'term_id' );
    $tax_query[] =  array(
      'taxonomy' => 'product_brand',
      'field' => 'term_id',
      'terms' => $term_ids
    );
  } else {
    $tax_query[] =  array(
      'taxonomy' => 'product_brand',
      'field' => 'slug',
      'terms' => $brand
    );
  }

  if ( $gender == 'all') {
    $terms = get_terms( 'gender' );
    $term_ids = wp_list_pluck( $terms, 'term_id' );
    $tax_query[] =  array(
      'taxonomy' => 'gender',
      'field' => 'term_id',
      'terms' => $term_ids
    );
  } else {
    $tax_query[] =  array(
      'taxonomy' => 'gender',
      'field' => 'slug',
      'terms' => $gender
    );
  }

  if ( $tag == 'all') {
    $terms = get_terms( 'product_tag' );
    $term_ids = wp_list_pluck( $terms, 'term_id' );
    $tax_query[] =  array(
      'taxonomy' => 'product_tag',
      'field' => 'term_id',
      'terms' => $term_ids
    );
  } else {
    $tax_query[] =  array(
      'taxonomy' => 'product_tag',
      'field' => 'slug',
      'terms' => $tag
    );
  }

  // Post query
  $query = array(
    'post_type' => 'product',
    'posts_per_page' => 9,
    'tax_query' => $tax_query,
    'offset' => $offset
  );
  $wp_query = new WP_Query($query);

  if( $wp_query->have_posts() ):
    while( $wp_query->have_posts() ) : $wp_query->the_post();
      global $current_user;
      $current_user_role = $current_user->roles[0];
      $user_level = get_the_terms( $product_ID, 'userlevel' );

      if( $current_user_role === 'administrator' || $current_user_role === $user_level[0]->slug || $user_level[0]->slug === 'level_all' ){
        wc_get_template_part( 'content', 'product' );
      }
    endwhile;
  elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :
    echo '<p id="no-more-products">No more products for this selection</p>';
  endif;
  wp_reset_postdata();

  die();
}
?>