<?php
add_action( 'wp_ajax_nopriv_ajax_more_posts', 'ajax_more_posts' );
add_action( 'wp_ajax_ajax_more_posts', 'ajax_more_posts' );

function ajax_more_posts(){
  $query_data = $_POST;
  $offset = $query_data['offset'];

  // The Query
  $query = array(
    'order'           => 'DESC',
    'orderby'         => 'date',
    'posts_per_page'  => 15,
    'offset'          => $offset
  );
  $wp_query = new WP_Query($query);

  // The Loop
  if( $wp_query->have_posts() ):
    while( $wp_query->have_posts() ) : $wp_query->the_post();
      wc_get_template_part( 'content', 'post' );
    endwhile;
  else:
    ?>
    <script type="text/javascript">
    var button = document.getElementById("more-posts");
    $(button).disabled = true;
    $(button).addClass('is-disabled');
    </script>
    <?php
  endif;
  wp_reset_postdata();

  die();
}
?>