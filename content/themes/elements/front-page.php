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
get_template_part('home');

get_footer();
?>
