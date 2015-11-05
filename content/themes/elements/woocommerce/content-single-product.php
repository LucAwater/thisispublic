<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

// Check if user is logged in
if( ! is_user_logged_in() ):
  echo '<p class="woocommerce-error">You must be logged in to view products. Click <a href="' . home_url() . '/account">here</a> to login or register</p>';
// If user is logged in, continue looping products
else:
  global $current_user;
  $current_user_role = $current_user->roles[0];
  $user_level = get_the_terms( $product_ID, 'userlevel' );

  if( $current_user_role === 'administrator' || $current_user_role === $user_level[0]->slug || $user_level[0]->slug === 'level_all' ):

    global $product;

    $brand = get_the_terms( get_the_ID(), 'product_brand' );
    ?>

    <?php
      /**
       * woocommerce_before_single_product hook
       *
       * @hooked wc_print_notices - 10
       */
       do_action( 'woocommerce_before_single_product' );

       if ( post_password_required() ) {
       	echo get_the_password_form();
       	return;
       }
    ?>

    <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="product-back">
        <a class="link-arrow link-arrow-left" href="<?php echo $shop_link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg">back to <?php echo $brand[0]->name; ?></a>
      </div>

      <div class="summary entry-summary">
        <?php
        $shop_link = home_url() . "/brand/" . $brand[0]->slug;

        // Product images
        echo '<div class="product-images">';
          echo '<ul>';
            $attachment_ids = $product->get_gallery_attachment_ids();

            foreach( $attachment_ids as $attachment_id ) {
              echo '<li><img src="' . wp_get_attachment_url( $attachment_id ) . '"></li>';
            }
          echo '</ul>';
        echo '</div>';

        // Product info
        echo '<div class="product-info">';
          echo '<div>';
            $title = get_the_title();
            $description = get_field('description');

            echo '<p>' . $brand[0]->name . '</p>';
            echo '<h1>' . $title . '</h1>';
            echo wpautop($description);

            // Download button
            do_action( 'woocommerce_single_product_summary' );

            echo '<p class="is-grey">download a .zip ﬁle with all high ressolution images</p>';
          echo '</div>';
        echo '</div>';
        ?>

      </div><!-- .summary -->

      <?php
        /**
         * woocommerce_after_single_product_summary hook
         *
         * @hooked woocommerce_output_product_data_tabs - 10
         * @hooked woocommerce_upsell_display - 15
         * @hooked woocommerce_output_related_products - 20
         */
        do_action( 'woocommerce_after_single_product_summary' );
      ?>

      <meta itemprop="url" content="<?php the_permalink(); ?>" />

    </div><!-- #product-<?php the_ID(); ?> -->

    <?php do_action( 'woocommerce_after_single_product' );
  else:
    echo '<p class="woocommerce-error">You do not have permission to view this product. Click <a href="' . get_permalink( woocommerce_get_page_id( 'shop' ) ) . '">here</a> to get back to all products</p>';
  endif; // User level check
endif; // User login check
?>
