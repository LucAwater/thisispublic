<?php
// Options (variables)
$o_b_textColor = get_sub_field( 'hero_o_b_textColor' );

// Content (variables)
$banner = get_sub_field( 'hero_banner' );

$b_image = get_sub_field( 'hero_b_image' );
$b_title = get_sub_field( 'hero_b_title' );
$b_text = preg_replace( '/<p>/', '<p class="is-' . $o_b_textColor . '">', get_sub_field( 'hero_b_text' ) );

// Output
echo '<section class="hero has-no-pad">';

  // Hero background image
  if( $banner ):
    echo
    '<div class="hero-banner">
      <div style="background-image:url(' . $banner['sizes']['large'] . ');"></div>
    </div>';
  endif;

  // Hero content container
  if( $b_image || $b_title || $b_text ):
    echo '<div class="section-body">';

      // Logo
      if( $b_image ):
        echo '<img src="' . $b_image['sizes']['medium'] . '" width="' . $b_image['width'] . '" height="' .   $b_image['height'] . '">';
      endif;

      // Title
      if( $b_title ):
        echo '<h2 class="is-bold is-' . $o_b_textColor . '">' . $b_title . '</h2>';
      endif;

      // Text
      if( $b_text ):
        echo $b_text;
      endif;

    echo '</div>';
  endif;

echo '</section>';

// echo '<a class="arrow arrow-scroll"><img src="' . bloginfo( 'template_directory' ) . '/img/arrow.svg"></a>';
?>
