<?php
add_action( 'wp_ajax_nopriv_ajax_more_results', 'ajax_more_results' );
add_action( 'wp_ajax_ajax_more_results', 'ajax_more_results' );

function ajax_more_results(){
  $query_data = $_POST;
  $offset = $query_data['offset'];
  $key = $query_data['key'];

  // The query
  $result = get_search_query();
  $query = array(
    'post_type' => 'product',
    'posts_per_page' => 9,
    's' => $key,
    'offset' => $offset
  );
  $wp_query = new WP_Query($query);

  // The loop
  if( $wp_query->have_posts() ):
    while( $wp_query->have_posts() ) : $wp_query->the_post();
      wc_get_template_part( 'content', 'product' );
    endwhile;
  else:
    ?>
    <script type="text/javascript">
    var button = document.getElementById("more-results");
    $(button).disabled = true;
    $(button).addClass('is-disabled');
    </script>
    <?php
  endif;
  wp_reset_postdata();

  die();
}
?>