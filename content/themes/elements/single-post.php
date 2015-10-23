<?php
get_header();

echo '<div class="single-post">';
  $title = get_the_title();
  $date = get_the_date();
  $content = get_the_content();

  echo
  '<div class="post-header">
    <h2>' . $title . '</h2>
    <p>' . $date . ' <a class="is-grey" href="' . home_url() . '/news">back to overview</a></p>
  </div>';

  // Loop into ACF groups
  if( have_rows('post') ):
    while( have_rows('post') ): the_row();

      if( get_row_layout() === 'slider' ):
        include( locate_template('content/slider.php') );
      endif;

    endwhile;
  endif;

  echo '<article>' . $content . '</article>';
echo '</div>';

get_footer();
?>
