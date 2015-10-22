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

  echo '<ul class="posts">';
    while( $loop->have_posts() ) : $loop->the_post();

      echo
      '<li>
        <a href="' . get_permalink() . '"></a>
        <p>' . get_the_date() . '</p>
        <h2>' . get_the_title() . '</h2>
      </li>';

    endwhile;
  echo '</ul>';
endif;

wp_reset_postdata();

get_footer();
?>
