<?php
function direct_free_downloads_button($button) {
  global $product;

  if( $product->is_downloadable() AND $product->get_price() == 0 ) {
    $files = $product->get_files();
    $files = array_keys($files);

    if($files):
      $download_url = home_url('?download_file='.$product->id.'&key='.$files[0].'&free=1' );

      $button = sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a>',
        esc_url( $download_url  ),
        esc_attr( $product->id ),
        esc_attr( $product->get_sku() ),
        esc_attr( isset( $quantity ) ? $quantity : 1 ),
        $product->is_purchasable() && $product->is_in_stock() ? '' : '',
        esc_attr( $product->product_type ),
        esc_html( 'Download' )
      );
    endif;
  }

  return $button;
}

add_filter('woocommerce_loop_add_to_cart_link', 'direct_free_downloads_button', 100);

/**
 * Handles downloading of free Downloadable products
 * @return [type] [description]
 */
function download_free_product_file() {
  $product_id    = absint( $_GET['download_file'] );
  $_product      = wc_get_product( $product_id );

  if( $_product->get_price() == 0 ) {
      WC_Download_Handler::download( $_product->get_file_download_path( filter_var($_GET['key'], FILTER_SANITIZE_STRING)  ), $product_id );
  }
}

if ( isset( $_GET['download_file'] ) && isset( $_GET['key'] ) && $_GET['free'] ) {
  add_action( 'init', 'download_free_product_file' );
}
?>