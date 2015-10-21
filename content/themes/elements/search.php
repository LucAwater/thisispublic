<?php get_header();

  echo '<div class="filter is-fullwidth">';

    $shop_link = get_permalink( woocommerce_get_page_id('shop') );
    echo
    '<div class="back">
      <a class="link-arrow link-arrow-left" href="' . $shop_link . '"><img src="' . get_template_directory_uri() . '/img/arrow.svg">back to all products</a>
    </div>';

    // Current brand and gender
    $brand_terms = get_the_terms($post->id, 'product_brand');

    echo '<a class="filter-current" title="brand-current" data-current="all" data-target="brand">brand: <span>All</span></a>';
    echo '<a class="filter-current" title="gender-current" data-current="all" data-target="gender">gender: <span>All</span></a>';

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

    // Search
    echo
    '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">
      <input type="search" class="search" value="" name="s" title="" />
      <button type="submit">search</button>
    </form>';

  echo '</div>';
  ?>

  <h1 class="is-aligned-center margin-t50 margin-b80">Search results for: <?php the_search_query(); ?></h1>

    <?php
    if( have_posts() ):

      echo '<ul class="products s-grid-1 m-grid-2 l-grid-3 isotope isotope-masonry">';

      while( have_posts() ): the_post();

        include('woocommerce/content-product.php');

      endwhile;

      echo '</ul>';

    else:
      echo '<p class="is-aligned-center">no products found</p>';
    endif;
    ?>

<?php get_footer(); ?>