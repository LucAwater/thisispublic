<?php
/**
 * Brand A-Z listing
 *
 * @usedby [product_brand_list]
 */
global $post;
$brand_terms = get_the_terms($post->id, 'product_brand');
$current_brand = $brand_terms[0]->slug;

echo '<ul id="select-brand" class="filter-options">';
  if( !is_tax('product_brand') ){
    echo '<li class="current"><a class="tax-filter" title="all" data-parent="brand">All</a></li>';
  } else {
    echo '<li><a class="tax-filter" title="all" data-parent="brand">All</a></li>';
  }

  foreach ( $index as $i ) if ( isset( $product_brands[ $i ] ) ) :
    foreach ( $product_brands[ $i ] as $brand ) {
      if( is_tax('product_brand') && $brand->slug === $current_brand ){
        echo '<li class="current"><a class="tax-filter" title="' . $brand->slug . '" data-parent="brand">' . $brand->name . '</a></li>';
      } else {
        echo '<li><a class="tax-filter" title="' . $brand->slug . '" data-parent="brand">' . $brand->name . '</a></li>';
      }
    }
  endif;
echo '</ul>';
?>