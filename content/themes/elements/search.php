<?php get_header();

  echo '<div class="filter is-fullwidth">';

    $shop_link = get_permalink( woocommerce_get_page_id('shop') );
    echo
    '<div class="back">
      <a class="link-arrow link-arrow-left" href="' . $shop_link . '"><img src="' . get_template_directory_uri() . '/img/arrow.svg">back to all products</a>
    </div>';

    // Search
    echo
    '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">
      <input type="search" class="search" value="" name="s" title="" />
      <button type="submit">search</button>
      <p class="search-trigger">search</p>
    </form>';

  echo '</div>';
  ?>

  <h1 class="search-result is-aligned-center margin-t50 margin-b80" data-searched="<?php echo get_search_query(); ?>">Search results for: <?php the_search_query(); ?></h1>

    <?php
    // TEMPORARILY show all tags
    function woocommerce_product_loop_tags() {
      global $post, $product;

      $tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

      echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '.</span>' );
    }

    // The query
    $result = get_search_query();
    $query = array(
      'post_type' => 'product',
      'posts_per_page' => 15,
      's' => $result
    );
    $wp_query = new WP_Query($query);

    // The loop
    if( $wp_query->have_posts() ):
      woocommerce_product_loop_start();
        while( $wp_query->have_posts() ) : $wp_query->the_post();
          wc_get_template_part( 'content', 'product' );
        endwhile;
      woocommerce_product_loop_end();
    endif;
    wp_reset_postdata();

    // Load more results
    echo '<a id="more-results" class="button">Load more<span class="loader"></span></a>';
    ?>

<?php get_footer(); ?>