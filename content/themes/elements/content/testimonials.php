<?php
// Content (variables)
$b_items = get_sub_field( 'testimonials_b_item' );

// Output
echo '<section class="testimonials">';

  // Grid header
  echo
  '<div class="section-header row is-pos-center">
    <h2>Testimonials</h2>
  </div>';

  // Grid content
  if( have_rows('testimonials_b_item') ):
    echo '<div class="section-body">';

      echo '<ul class="s-grid-1 l-grid-3 xl-grid-3 row">';
        while( have_rows('testimonials_b_item') ): the_row();
          $text = get_sub_field('testimonials_b_item_text', false);
          $caption = get_sub_field('testimonials_b_item_caption');
          echo
          '<li>
            <p>"' . $text . '"</p>
            <p class="is-grey">' . $caption . '</p>
          </li>';
        endwhile;
      echo '</ul>';

    echo '</div>';
  endif;

echo '</section>';
?>
