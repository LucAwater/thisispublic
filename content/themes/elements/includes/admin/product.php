<?php
/*
 * Adding custom fields to the product backend
 */

// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields() {

	global $woocommerce, $post;

	echo '<div class="options_group">';

		// Text Field: essential description
		woocommerce_wp_text_input(
			array(
				'id'          => 'essential_description',
				'label'       => __( 'Essential description', 'woocommerce' ),
				'desc_tip'    => 'true',
				'description' => __( 'If necessary, put down the contents of the product in a few words. For example: complete 3-piece set, set of 2, etc', 'woocommerce' )
			)
		);

		// Textarea: technical description
		woocommerce_wp_textarea_input(
			array(
				'id'          => 'technical_description',
				'label'       => __( 'Technical description', 'woocommerce' ),
				'desc_tip'    => 'true',
				'description' => __( 'Include materials and sizes here if necessary', 'woocommerce' )
			)
		);

	echo '</div>';
	echo '<div class="options_group">';

		// Text Field: upsell notice
		woocommerce_wp_text_input(
			array(
				'id'          => 'upsell_notice',
				'label'       => __( 'Upsell notice', 'woocommerce' ),
				'desc_tip'    => 'true',
				'description' => __( 'Fill out a custom upsell notice, for example: "Use your Muhle shaving set with:"', 'woocommerce' )
			)
		);

  	echo '</div>';
	echo '<div class="options_group">';

		// Text Field: production method
		woocommerce_wp_text_input(
			array(
				'id'          => 'production_method',
				'label'       => __( 'Production method', 'woocommerce' ),
				'desc_tip'    => 'true',
				'description' => __( 'For example: "Hand made" or "Made"', 'woocommerce' )
			)
		);

		// Text Field: country
		woocommerce_wp_text_input(
			array(
				'id'          => 'country',
				'label'       => __( 'Country', 'woocommerce' ),
				'desc_tip'    => 'true'
			)
		);

  	echo '</div>';
    echo '<div class="options_group">';

		// Radio Field: shipping time
    woocommerce_wp_select(
      array(
        'id'          => 'shipping_time',
        'label'       => __( 'Shipping Time', 'woocommerce' ),
        'options'     => array(
          '24hours'         => __( '48 Hours', 'woocommerce' ),
          'build_to_order'  => __( 'Build to order', 'woocommerce' )
        )
      )
    );

  	echo '</div>';
}

function woo_add_custom_general_fields_save( $post_id ){
	// Text Field: essential description
	$woocommerce_text_field = $_POST['essential_description'];
	if( !empty( $woocommerce_text_field ) )
    	update_post_meta( $post_id, 'essential_description', esc_attr( $woocommerce_text_field ) );
}
?>
