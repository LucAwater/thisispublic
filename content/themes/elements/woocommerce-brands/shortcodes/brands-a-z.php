<?php
/**
 * Brand A-Z listing
 *
 * @usedby [product_brand_list]
 */
if( is_tax('product_brand') || is_shop() ){
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
        if( is_tax('product_brand') ){
          if( $brand->slug === $current_brand ){
            echo '<li class="current"><a class="tax-filter" title="' . $brand->slug . '">' . $brand->name . '</a></li>';
          } else {
            echo '<li><a class="tax-filter" title="' . $brand->slug . '" data-parent="brand">' . $brand->name . '</a></li>';
          }
        }
      }
    endif;
  echo '</ul>';
} else {
  echo '<ul class="brands s-grid-1 m-grid-2 l-grid-3 isotope isotope-masonry">';
    foreach ( $index as $i ) if ( isset( $product_brands[ $i ] ) ) :
      foreach ( $product_brands[ $i ] as $brand ) {
        // echo $brand->term_id;
        // echo $brand->name;
        // echo $brand->slug;
        // echo $brand->term_group;
        // echo $brand->term_taxonomy_id;
        // echo $brand->taxonomy;
        // echo $brand->description;
        // echo $brand->parent;
        // echo $brand->count;

        echo
        '<li class="brand">
          <a href="' . get_term_link( $brand->slug, 'product_brand' ) . '" data-hover="view this brand">
            <div>
              <h3>' . $brand->name . '</h3>
              <p>' . $brand->description . '</p>
            </div>
            <img src="' . get_brand_thumbnail_url( $brand->term_id ) . '">
          </a>
        </li>';
      }
    endif;
  echo '</ul>';
}
?>