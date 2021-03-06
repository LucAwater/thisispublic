<?php
add_action( 'wp_ajax_nopriv_ajax_more_products', 'ajax_more_products' );
add_action( 'wp_ajax_ajax_more_products', 'ajax_more_products' );

function ajax_more_products(){
  $query_data = $_POST;
  $brand = $query_data['brand'];
  $category = $query_data['category'];
  $season = $query_data['season'];
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

  if ( $category == 'all') {
    $terms = get_terms( 'product_cat' );
    $term_ids = wp_list_pluck( $terms, 'term_id' );
    $tax_query[] =  array(
      'taxonomy' => 'product_cat',
      'field' => 'term_id',
      'terms' => 'xxx',
      'operator' => 'NOT IN'
    );
  } else {
    $tax_query[] =  array(
      'taxonomy' => 'product_cat',
      'field' => 'slug',
      'terms' => $category
    );
  }

  if ( $season == 'all') {
    $terms = get_terms( 'season' );
    $term_ids = wp_list_pluck( $terms, 'term_id' );
    $tax_query[] =  array(
      'taxonomy' => 'season',
      'field' => 'term_id',
      'terms' => 'xxx',
      'operator' => 'NOT IN'
    );
  } else {
    $tax_query[] =  array(
      'taxonomy' => 'season',
      'field' => 'slug',
      'terms' => $season
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
      'terms' => 'xxx',
      'operator' => 'NOT IN'
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
    'posts_per_page' => 15,
    'orderby' => 'title',
    'order' => 'ASC',
    'tax_query' => $tax_query,
    'offset' => $offset
  );
  $wp_query = new WP_Query($query);

  if( $wp_query->have_posts() ):
    while( $wp_query->have_posts() ) : $wp_query->the_post();
      global $current_user, $product_ID;
      $current_user_role = $current_user->roles[0];
      $user_level = get_the_terms( $product_ID, 'userlevel' );

      if( $current_user_role === 'administrator' || $current_user_role === $user_level[0]->slug || $user_level[0]->slug === 'level_all' ){
        wc_get_template_part( 'content', 'product' );
      }
    endwhile;
  elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :
    // no more products
  endif;
  wp_reset_postdata();

  die();
}
?>