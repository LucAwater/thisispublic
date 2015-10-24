<?php
get_header();

// Loop into ACF groups
if( have_rows('page') ):
  while( have_rows('page') ): the_row();

    // Hero section is placed before <main>

    if( get_row_layout() == 'quote' ):
      include( locate_template('content/quote.php') );
    endif;

  endwhile;
endif;

// The Query
$args = array(
    'order'     => 'DESC',
    'orderby'   => 'date'
);

query_posts( $args );

echo '<ul class="posts s-grid-1 m-grid-2 l-grid-3 isotope isotope-masonry">';

// The Loop
while ( have_posts() ) : the_post();
  $category = get_the_category();
  echo
  '<li>
    ' . get_the_post_thumbnail( $post_ID, 'medium' ) . '
    <div>
      <p class="is-grey">' . $category[0]->cat_name . ' | ' . get_the_date() . '</p>
      <h3>' . get_the_title() . '</h3>
      <a class="button button-sec" href="' . get_permalink() . '">More</a>
    </div>
  </li>';
endwhile;

echo '</ul>';

// Reset Query
wp_reset_query();

get_footer();
?>
