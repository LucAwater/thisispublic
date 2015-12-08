<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Get brand(s) product belongs to
$brand = get_the_terms( $product_ID, 'product_brand' );

// Get gender
$gender = get_the_terms( get_the_ID(), 'gender' );

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>
<li <?php post_class( $classes ); ?> data-gender="<?php echo $gender[0]->slug; ?>" data-brand="<?php echo $brand[0]->slug; ?>">
  <div>

  	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

  	<a href="<?php the_permalink(); ?>" data-hover="view this product">

  		<?php
  			echo '<div class="thumb-content">';
          echo '<p>' . $brand[0]->name . '</p>';
    			/**
    			 * woocommerce_shop_loop_item_title hook
    			 *
    			 * @hooked woocommerce_template_loop_product_title - 10
    			 */
    			do_action( 'woocommerce_shop_loop_item_title' );

    			/**
    			 * woocommerce_after_shop_loop_item_title hook
    			 *
    			 * @hooked woocommerce_template_loop_rating - 5
    			 * @hooked woocommerce_template_loop_price - 10
    			 */
    			do_action( 'woocommerce_after_shop_loop_item_title' );

          $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
          echo '<img class="lazy" data-original="' . $thumbnail[0] . '">';


        echo '</div>';

        echo '<div class="overlay-thumb"><p>view product</p></div>';
  		?>

      <?php
      /**
       * woocommerce_after_shop_loop_item hook
       *
       * @hooked woocommerce_template_loop_add_to_cart - 10
       */
      do_action( 'woocommerce_after_shop_loop_item' );

      ?>

    </a>

  </div>
</li>
