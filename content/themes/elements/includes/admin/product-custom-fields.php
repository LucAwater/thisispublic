<?php
/*
 * Custom fields
 */
// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields() {
  global $woocommerce, $post;

  echo '<div class="options_group">';

  // Text Field: package content
  woocommerce_wp_text_input(
    array(
      'id'          => 'display_price',
      'label'       => __( 'Display price', 'woocommerce' ),
      'desc_tip'    => 'true'
    )
  );

  echo '</div>';
}

// Saving the fields
function woo_add_custom_general_fields_save( $post_id ){
  // Text Field: package content
  $woocommerce_text_field = $_POST['display_price'];
  if( !empty( $woocommerce_text_field ) )
    update_post_meta( $post_id, 'display_price', esc_attr( $woocommerce_text_field ) );
  else
    update_post_meta( $post_id, 'display_price', esc_attr( $woocommerce_text_field ) );
}
?>