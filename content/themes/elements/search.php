<?php get_header(); ?>

<div class="filter is-fullwidth">
  <?php $shop_link = get_permalink( woocommerce_get_page_id('shop') ); ?>
  <div class="back">
    <a class="link-arrow link-arrow-left" href="<?php echo $shop_link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.svg">All products</a>
  </div>

  <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <input type="search" class="search" value="" name="s" title="" />
    <button type="submit">search</button>
    <p class="search-trigger">search</p>
  </form>
</div>

<h1 class="search-result is-aligned-center margin-t50 margin-b80" data-searched="<?php echo get_search_query(); ?>">Search results for: <?php the_search_query(); ?></h1>

<?php
// The query
$result = get_search_query();
$query = array(
  'post_type' => 'product',
  'sort' => 'ASC',
  'sortby' => 'title',
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

get_footer(); ?>