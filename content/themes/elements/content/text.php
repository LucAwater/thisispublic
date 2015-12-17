<?php
// Options (variables)
$o_menu = get_sub_field( 'text_o_menu' );

$o_b_pos = get_sub_field( 'text_o_b_pos' );
$o_b_align = get_sub_field( 'text_o_b_align' );

// Content (variables)
$b_title = get_sub_field( 'text_b_title' );
$b_text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_b_align . '">', get_sub_field( 'text_b_text' ) );

//Output
echo
'<section class="text' . (( $o_menu == true ) ? ' has-anchor" id="anchor-' . $i_anchor : "") . '">
  <div class="section-body is-pos-' . $o_b_pos . '">
    <h2 class="is-aligned-' . $o_b_align . '">' . $b_title . '</h2>
    <div class="is-aligned-' . $o_b_align . '">
      ' . $b_text . '
    </div>
  </div>
</section>';
?>
