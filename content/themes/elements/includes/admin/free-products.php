<?php
// Make priceless product purchasable
function custom_woocommerce_is_purchasable( $purchasable, $product ){
   if( $product->get_price() == 0 ||  $product->get_price() == '')
       $purchasable = true;
   return $purchasable;
}
add_filter( 'woocommerce_is_purchasable', 'custom_woocommerce_is_purchasable', 10, 2 );
?>