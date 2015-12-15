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

        // Build thumb
        ?>
        <li class="brand">
          <div>
            <div class="thumb-content">
              <a href="<?php echo get_term_link( $brand->slug, 'product_brand' ); ?>"><h3><?php echo $brand->name; ?></h3></a>
            </div>

            <a href="<?php echo get_term_link( $brand->slug, 'product_brand' ); ?>">
              <img src="<?php echo get_brand_thumbnail_url( $brand->term_id ); ?>">
            </a>

            <div class="thumb-content">
              <p><?php echo $brand->description; ?></p>
              <?php
              // Brand files
              $brand_files = get_field( 'brand_files', $brand );
              foreach( $brand_files as $file ){
                $url = $file['brand_files_file']['url'];
                $title = $file['brand_files_title'];

                if(! empty($url) ){
                  echo '<a class="link-arrow link-arrow-right" href="' . $url . '" download><img src="' . get_template_directory_uri() . '/img/arrow.svg">' . $title . '</a>';
                }
              }
              ?>
            </div>
          </div>
        </li>
        <?php
      }
    endif;
  echo '</ul>';
}
?>