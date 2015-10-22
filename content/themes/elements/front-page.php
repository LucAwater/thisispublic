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

// Post query
$query = array(
    'post_type' => 'post',
    'order'     => 'DESC',
    'orderby'   => 'date'
);
$loop = new WP_Query($query);

if( $loop->have_posts() ):

  echo '<ul class="posts s-grid-1 m-grid-2 l-grid-3 isotope isotope-masonry">';
    while( $loop->have_posts() ) : $loop->the_post();

      echo
      '<li>
        ' . get_the_post_thumbnail( $post_ID, 'medium' ) . '
        <div>
          <p class="is-grey">' . get_the_category()[0]->name . ' | ' . get_the_date() . '</p>
          <h2>' . get_the_title() . '</h2>
          <a class="button button-sec" href="' . get_permalink() . '">More</a>
        </div>
      </li>';

    endwhile;
  echo '</ul>';
endif;

wp_reset_postdata();

get_footer();
?>
