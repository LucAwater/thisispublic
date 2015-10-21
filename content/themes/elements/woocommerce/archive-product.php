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
      echo '<p class="woocommerce-info">You must be logged in to view products.</p>';
    // If user is logged in, continue looping products
    else:
      echo '<div class="filter is-fullwidth">';
        // Current brand and gender
        if( is_shop() ){
          echo '<a class="filter-current" title="brand-current" data-current="all">brand: <span>All</span></a>';
          echo '<a class="filter-current" title="gender-current" data-current="all">gender: <span>All</span></a>';
        } else {
          echo '<a class="filter-current" title="brand-current" data-current="' . $current_brand . '">' . $brand_terms[0]->name . '</a>';
          echo '<a class="filter-current" title="gender-current" data-current="all">All</a>';
        }

        // List of brands
        echo do_shortcode('[product_brand_list]');

        // Gender filter
        $genders = get_terms( 'gender', 'orderby=count&hide_empty=0' );

        echo '<ul id="select-gender" class="filter-options">';
          echo '<li class="current"><a class="tax-filter" title="all">All</a></li>';
          foreach ( $genders as $gender ) {
            echo '<li><a class="tax-filter" title="' . $gender->slug . '">' . $gender->name . '</a></li>';
          }
        echo '</ul>';

        // Search
        echo
        '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">
          <input type="search" class="search" value="" name="s" title="" />
          <button type="submit">search</button>
        </form>';

      echo '</div>';

      // Post query
      $query = array(
          'post_type' => 'product'
      );
      $loop = new WP_Query($query);

      if( $loop->have_posts() ):
        woocommerce_product_loop_start();
          while( $loop->have_posts() ) : $loop->the_post();
            if ( is_user_logged_in() ){
              global $current_user;
              $current_user_role = $current_user->roles[0];

              // Custom user level
              $user_level = get_field( 'user_level' );

              if( $current_user_role === 'administrator' || in_array($current_user_role, $user_level) ){
                wc_get_template_part( 'content', 'product' );
              }
            }
          endwhile;
        woocommerce_product_loop_end();
      elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :
        wc_get_template( 'loop/no-products-found.php' );
      endif;
    endif; ?><!-- end of user login check -->

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
