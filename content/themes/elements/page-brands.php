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
			/**
			 * woocommerce_archive_description hook
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

    <?php
    // Check if user is logged in
    if( ! is_user_logged_in() ):
      echo '<p class="woocommerce-error">You must be logged in to view products. Click <a href="' . home_url() . '/account">here</a> to login or register</p>';

    // If user is logged in, continue looping products
    else:
      ?>
      <div class="filter is-fullwidth">
        <p>Public_ Imagebank</p>

        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
          <input type="search" class="search" value="" name="s" title="" />
          <button type="submit">search</button>
          <p class="search-trigger">search</p>
        </form>
      </div>

      <?php
      $brands = get_terms( 'product_brand' );

      if( $brands ):
        echo '<ul class="brands s-grid-3">';
          foreach( $brands as $brand ):
            $current_user_role = $current_user->roles[0];
            $user_level = get_field( 'brand_userLevel', $brand );

            if( $current_user_role == 'administrator' || $current_user_role == $user_level || $user_level == 'level_all' || !isset($user_level) ):
              include('thumb-brand.php');
            endif;
          endforeach;
        echo '</ul>';
      endif;
    endif;
    ?>

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
