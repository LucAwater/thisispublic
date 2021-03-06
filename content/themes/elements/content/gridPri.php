<?php
// Options (variables)
$o_menu = get_sub_field( 'gridPri_o_menu' );

$o_h_pos = get_sub_field( 'gridPri_o_h_pos' );
$o_h_align = get_sub_field( 'gridPri_o_h_align' );
$o_b_layout = get_sub_field( 'gridPri_o_b_layout' );

// Content (variables)
$h_title = get_sub_field( 'gridPri_h_title' );
$h_text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_h_align . '">', get_sub_field( 'gridPri_h_text' ) );
$b_images = get_sub_field( 'gridPri_b_images' );

// Output
echo '<section class="grid grid-pri' . (( $o_menu == true ) ? ' has-anchor" id="anchor-' . $i_anchor : "") . '">';

  // Grid header
  if( $h_title || $h_text ):
    echo
    '<div class="section-header row is-pos-' . $o_h_pos . '">
      <h2 class="is-aligned-' . $o_h_align . '">' . $h_title . '</h2>
      ' . $h_text . '
    </div>';
  endif;

  // Grid content
  if( $b_images ):
    echo '<div class="section-body">';

    if( $o_b_layout == 'masonry' ){
      echo '<ul class="s-grid-2 l-grid-4 xl-grid-6 row isotope isotope-masonry">';
    } else {
      echo '<ul class="s-grid-2 l-grid-4 xl-grid-6 row">';
    }
        foreach( $b_images as $image ):
          echo '<li><img src="' . $image['sizes']['large'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '"></li>';
        endforeach;

      echo '</ul>';
    echo '</div>';
  endif;

echo '</section>';
?>
