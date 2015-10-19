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

global $product;
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

  <div class="summary entry-summary">
    <?php
    $shop_link = get_permalink( woocommerce_get_page_id( 'shop' ) );

    echo
    '<div class="product-back">
      <a class="link-arrow link-arrow-left" href="' . $shop_link . '"><img src="' . get_template_directory_uri() . '/img/arrow.svg">go back</a>
    </div>';

    $attachment_ids = $product->get_gallery_attachment_ids();

    echo '<ul class="product-images">';

      foreach( $attachment_ids as $attachment_id ) {
        echo '<li><img src="' . wp_get_attachment_url( $attachment_id ) . '"></li>';
      }

    echo '</ul>';

    echo '<div class="product-info">';
      $title = get_the_title();
      $description = get_field('description');
      $brand = get_the_terms( get_the_ID(), 'product_brand' );

      echo '<p>' . $brand[0]->name . '</p>';
      echo '<h1>' . $title . '</h1>';
      echo $description;

      // Download button
      do_action( 'woocommerce_single_product_summary' );

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

<?php do_action( 'woocommerce_after_single_product' ); ?>
