<?php
get_header();

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
          <h3>' . get_the_title() . '</h3>
          <a class="button button-sec" href="' . get_permalink() . '">More</a>
        </div>
      </li>';

    endwhile;
  echo '</ul>';
endif;

wp_reset_postdata();

get_footer();
?>
