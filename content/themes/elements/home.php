<?php
get_header();

// The Query
$query = array(
  'order'           => 'DESC',
  'orderby'         => 'date',
  'posts_per_page'  => 15
);
$wp_query = new WP_Query($query);

// Posts
echo '<ul class="posts s-grid-1 l-grid-2 xl-grid-3 isotope isotope-masonry">';
  // The Loop
  if( $wp_query->have_posts() ):
    while( $wp_query->have_posts() ) : $wp_query->the_post();
      wc_get_template_part( 'content', 'post' );
    endwhile;
  endif;
  wp_reset_postdata();
echo '</ul>';

get_footer();
?>
