<?php
// Content (variables)
$b_content = get_sub_field( 'quote_b_content' );
$b_caption = get_sub_field( 'quote_b_caption' );

//Output
echo
'<section class="quote is-fullwidth">
  <div class="section-body row is-aligned-center">
    <h1>' . $b_content . '</h2>
    <p>' . $b_caption . '</p>
  </div>
</section>';
?>
