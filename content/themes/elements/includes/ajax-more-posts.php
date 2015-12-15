<?php
// //Enqueue Ajax Scripts
add_action( 'wp_enqueue_scripts', 'ajax_more_posts_scripts' );
function ajax_more_posts_scripts() {
  wp_enqueue_script( 'more-posts', get_template_directory_uri() . '/js/ajax-more-posts.js', array('jquery'), '1.0', true );

  wp_localize_script( 'more-posts', 'ajaxmoreposts', array(
    'ajax_url' => admin_url( 'admin-ajax.php' )
  ));
}

add_action( 'wp_ajax_nopriv_ajax_more_posts', 'ajax_more_posts' );
add_action( 'wp_ajax_ajax_more_posts', 'ajax_more_posts' );

function ajax_more_posts(){
  $query_data = $_POST;
  $offset = $query_data['offset'];

  // The Query
  $query = array(
    'order'           => 'DESC',
    'orderby'         => 'date',
    'posts_per_page'  => 9,
    'offset'          => $offset
  );
  $wp_query = new WP_Query($query);

  // The Loop
  if( $wp_query->have_posts() ):
    while( $wp_query->have_posts() ) : $wp_query->the_post();
      wc_get_template_part( 'content', 'post' );
    endwhile;
  endif;
  wp_reset_postdata();

  die();
}
?>