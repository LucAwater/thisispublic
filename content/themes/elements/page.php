<?php
get_header();

if ( class_exists('WooCommerce') ) {
  // Woocommere page shortcodes(see pages in backend)
  the_content();
}

// Loop into ACF groups
if( have_rows('page') ): $i_par = 0;
  while( have_rows('page') ): the_row();

    // Hero section is placed before <main>

    if( get_row_layout() == 'text' ):
      include( locate_template('content/text.php') );
    elseif( get_row_layout() == 'quote' ):
      include( locate_template('content/quote.php') );
    elseif( get_row_layout() == 'image' ):
      include( locate_template('content/image.php') );
    elseif( get_row_layout() == 'grid_primary' ):
      include( locate_template('content/gridPri.php') );
    elseif( get_row_layout() == 'grid_secondary' ):
      include( locate_template('content/gridSec.php') );
    elseif( get_row_layout() == 'testimonials' ):
      include( locate_template('content/testimonials.php') );
    elseif( get_row_layout() == 'slider' ):
      include( locate_template('content/slider.php') );
    elseif( get_row_layout() == 'parallax' ): $i_par++;
      include( locate_template('content/parallax.php') );
    elseif( get_row_layout() == 'maps' ):
      include( locate_template('content/maps.php') );
    endif;

  endwhile;
endif;

get_footer();
?>
