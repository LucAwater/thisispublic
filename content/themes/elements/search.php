<?php get_header(); ?>

  <h1 class="is-aligned-center margin-b30">Search results for: <?php the_search_query(); ?></h1>

    <?php
    if( have_posts() ):

      echo '<ul class="margin-t90 products s-grid-1 m-grid-2 l-grid-3 isotope isotope-masonry">';

      while( have_posts() ): the_post();

        include('woocommerce/content-product.php');

      endwhile;

      echo '</ul>';

    else:
      echo '<p class="is-aligned-center">no products found</p>';
    endif;
    ?>

<?php get_footer(); ?>