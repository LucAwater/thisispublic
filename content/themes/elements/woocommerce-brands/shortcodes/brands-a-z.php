<?php
/**
 * Brand A-Z listing
 *
 * @usedby [product_brand_list]
 */
if( is_tax('product_brand') || is_shop() || is_search() ){
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
          echo '<li class="current"><a class="tax-filter" title="' . $brand->slug . '">' . $brand->name . '</a></li>';
        } else {
          echo '<li><a class="tax-filter" title="' . $brand->slug . '" data-parent="brand">' . $brand->name . '</a></li>';
        }
      }
    endif;
  echo '</ul>';
} else {
  echo '<div class="filter is-fullwidth">';
    echo '<p>Public_ Imagebank</p>';

    // Search
    echo
    '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">
      <input type="search" class="search" value="" name="s" title="" />
      <button type="submit">search</button>
      <p class="search-trigger">search</p>
    </form>';
  echo '</div>';

  echo '<ul class="brands s-grid-1 l-grid-2 xl-grid-3 isotope isotope-masonry">';
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
          <div>
            <a href="' . get_term_link( $brand->slug, 'product_brand' ) . '" data-hover="view this brand">
              <div class="thumb-content">
                <h3>' . $brand->name . '</h3>
                <p>' . $brand->description . '</p>
              </div>
              <img src="' . get_brand_thumbnail_url( $brand->term_id ) . '">
              <div class="overlay-thumb"><p>view brand</p></div>
            </a>
          </div>
        </li>';
      }
    endif;
  echo '</ul>';
}
?>