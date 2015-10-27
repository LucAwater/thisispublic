<?php
$choices = get_sub_field( 'video_options' );
echo '<section class="video has-no-pad">';

    if( $choices === 'embed' ){
      // get iframe HTML
      $iframe = get_sub_field( 'video_b_embed' );

      // use preg_match to find iframe src
      preg_match('/src="(.+?)"/', $iframe, $matches);
      $src = $matches[1];

      // add extra params to iframe src
      $params = array(
          'controls'    => 0,
          'hd'        => 1,
          'autohide'    => 1
      );

      $new_src = add_query_arg($params, $src);

      $iframe = str_replace($src, $new_src, $iframe);

      // add extra attributes to iframe html
      $attributes = 'frameborder="0"';

      $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

      echo
      '<div class="section-body video-embed">
        ' . $iframe . '
      </div>';

    } else {
      $video = get_sub_field( 'video_b_file' );

      echo
      '<div class="section-body video-file">
        <div class="video-button"></div>

        <video width="640" height="360" src="' . $video['url'] . '" preload>
          <p> Try this page in a modern browser! Or you can <a href="' . $video['url'] . '">download the video</a> instead.</p>
        </video>
      </div>';
    }

echo '</section>';
?>