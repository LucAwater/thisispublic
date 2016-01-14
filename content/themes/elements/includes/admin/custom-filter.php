<?php
/*
 * Add a brand column to the product listing
 */
function mbe_change_table_column_titles($columns){
  $columns['product_brand'] = 'Brand';
  return $columns;
}
add_filter('manage_product_posts_columns', 'mbe_change_table_column_titles');

function mbe_change_column_rows($column_name, $post_id){
  if($column_name == 'product_brand'){
    echo get_the_term_list($post_id, 'product_brand').PHP_EOL;
  }
}
add_action('manage_product_posts_custom_column', 'mbe_change_column_rows', 10, 2);

function mbe_change_sortable_columns($columns){
  $columns['product_brand'] = 'product_brand';
  return $columns;
}
add_filter('manage_edit-product_sortable_columns', 'mbe_change_sortable_columns');

/*
 * Add custom sorting filter for brands
 */
function restrict_books_by_genre() {
  global $typenow;
  $post_type = 'product'; // change HERE
  $taxonomy = 'product_brand'; // change HERE

  if ($typenow == $post_type) {
    $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
    $info_taxonomy = get_taxonomy($taxonomy);

    wp_dropdown_categories(array(
      'show_option_all' => __("Show All {$info_taxonomy->label}"),
      'taxonomy' => $taxonomy,
      'name' => $taxonomy,
      'orderby' => 'name',
      'selected' => $selected,
      'show_count' => true,
      'hide_empty' => true,
    ));
  };
}

add_action('restrict_manage_posts', 'restrict_books_by_genre');

function convert_id_to_term_in_query($query) {
  global $pagenow;
  $post_type = 'product'; // change HERE
  $taxonomy = 'product_brand'; // change HERE
  $q_vars = &$query->query_vars;

  if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
    $q_vars[$taxonomy] = $term->slug;
  }
}

add_filter('parse_query', 'convert_id_to_term_in_query');
?>