<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

    <?php
    // Check if user is logged in
    if( ! is_user_logged_in() ):
      echo '<p class="woocommerce-error">You must be logged in to view products. Click <a href="' . home_url() . '/account">here</a> to login or register</p>';
    // If user is logged in, continue looping products
    else:
      include_once( 'archive-filter.php' );

      // Post query
      if( is_shop() ){
        $query = array(
            'post_type' => 'product',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 15
        );
      } elseif( is_tax('product_brand') ) {
        $query = array(
            'post_type' => 'product',
            'posts_per_page' => 15,
            'orderby' => 'date',
            'order' => 'DESC',
            'product_brand' => $brand_terms[0]->slug
        );
      } else {
        $query = array(
            'post_type' => 'product',
            'posts_per_page' => 15,
            'orderby' => 'date',
            'order' => 'DESC',
            'product_tag' => $tag_terms[0]->slug
        );
      }

      $wp_query = new WP_Query($query);

      if( $wp_query->have_posts() ):
        woocommerce_product_loop_start();
          while( $wp_query->have_posts() ) : $wp_query->the_post();
            global $current_user, $product_ID;
            $current_user_role = $current_user->roles[0];
            $user_level = get_the_terms( $product_ID, 'userlevel' );

            if( $current_user_role === 'administrator' || $current_user_role === $user_level[0]->slug || $user_level[0]->slug === 'level_all' ){
              wc_get_template_part( 'content', 'product' );
            }
          endwhile;
        woocommerce_product_loop_end();
      elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :
        wc_get_template( 'loop/no-products-found.php' );
      endif;
      wp_reset_postdata();
      ?>

    <?php endif; ?><!-- end of user login check -->

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>
