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
      echo '<div class="filter is-fullwidth">';
        echo
        '<div class="back">
          <a class="link-arrow link-arrow-left" href="' . home_url() . '/brands"><img src="' . get_template_directory_uri() . '/img/arrow.svg">back to all brands</a>
        </div>';

        // Current brand and gender
        $brand_terms = get_the_terms($post->id, 'product_brand');

        if( is_shop() ){
          echo '<a class="filter-current" title="brand-current" data-current="all" data-target="brand">brand: <span>All</span></a>';
          echo '<a class="filter-current" title="gender-current" data-current="all" data-target="gender">gender: <span>All</span></a>';
          echo '<a class="filter-current" title="tag-current" data-current="all" data-target="tag">category: <span>All</span></a>';
        } else {
          echo '<a class="filter-current" title="brand-current" data-current="' . $brand_terms[0]->slug . '" data-target="brand">brand: <span>' . $brand_terms[0]->name . '</span></a>';
          echo '<a class="filter-current" title="gender-current" data-current="all" data-target="gender">gender: <span>All</span></a>';
          echo '<a class="filter-current" title="tag-current" data-current="all" data-target="tag">category: <span>All</span></a>';
        }

        // List of brands
        echo do_shortcode('[product_brand_list]');

        // Gender filter
        $genders = get_terms( 'gender', 'orderby=count&hide_empty=0' );

        echo '<ul id="select-gender" class="filter-options">';
          echo '<li class="current"><a class="tax-filter" title="all" data-parent="gender">All</a></li>';
          foreach ( $genders as $gender ) {
            echo '<li><a class="tax-filter" title="' . $gender->slug . '" data-parent="gender">' . $gender->name . '</a></li>';
          }
        echo '</ul>';

        // Tag filter
        $tags = get_field('tags_selected', 'option');

        echo '<ul id="select-tag" class="filter-options">';
          echo '<li class="current"><a class="tax-filter" title="all" data-parent="tag">All</a></li>';
          if( $tags ){
            foreach ( $tags as $tag ) {
              echo '<li><a class="tax-filter" title="' . $tag->slug . '" data-parent="tag">' . $tag->name . '</a></li>';
            }
          }
        echo '</ul>';

        // Search
        echo
        '<form id="search-form" role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">
          <input id="search-field" type="search" class="search" value="" name="s" title="" />
          <button id="search-button" type="submit">search</button>
          <p class="search-trigger">search</p>
        </form>';

      echo '</div>';

      // Post query
      if( is_shop() ){
        $query = array(
            'post_type' => 'product',
            'posts_per_page' => 9
        );
      } else {
        $query = array(
            'post_type' => 'product',
            'posts_per_page' => 9,
            'product_brand' => $brand_terms[0]->slug
        );
      }

      $wp_query = new WP_Query($query);

      if( $wp_query->have_posts() ):
        woocommerce_product_loop_start();
          while( $wp_query->have_posts() ) : $wp_query->the_post();
            global $current_user;
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

      <a id="more-products" class="button">Load more<span class="loader"></span></a>
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
