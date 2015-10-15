<?php
/**
 * Brand A-Z listing
 *
 * @usedby [product_brand_list]
 */
echo '<ul class="brands">';

  if (is_tax( 'product_brand' )) {
    $terms = get_the_terms($post->id, 'product_brand');
    $current_brand = $terms[0]->slug;

    echo '<li><a href="' . get_permalink( woocommerce_get_page_id( 'shop' ) ) . '">All</a></li>';

    foreach ( $index as $i ) if ( isset( $product_brands[ $i ] ) ) :
      foreach ( $product_brands[ $i ] as $brand ) {
        if( $brand->slug === $current_brand ){
          echo '<li class="current"><a href="' . get_term_link( $brand->slug, 'product_brand' ) . '">' . $brand->name . '</a></li>';
        } else {
          echo '<li><a href="' . get_term_link( $brand->slug, 'product_brand' ) . '">' . $brand->name . '</a></li>';
        }
      }
    endif;
  } else {
    echo '<li class="current"><a href="' . get_permalink( woocommerce_get_page_id( 'shop' ) ) . '">All</a></li>';

    foreach ( $index as $i ) if ( isset( $product_brands[ $i ] ) ) :
      foreach ( $product_brands[ $i ] as $brand ) {
        echo '<li><a href="' . get_term_link( $brand->slug, 'product_brand' ) . '">' . $brand->name . '</a></li>';
      }
    endif;
  }

echo '</ul>';
?>