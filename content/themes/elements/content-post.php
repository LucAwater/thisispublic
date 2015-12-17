<?php
$category = get_the_category();
echo
'<li>
  <a href="' . get_permalink() . '">' . get_the_post_thumbnail( $post_ID, 'medium' ) . '</a>
  <div>
    <p class="is-grey">' . $category[0]->cat_name . ' | ' . get_the_date() . '</p>
    <h3>' . get_the_title() . '</h3>
    <a class="button button-sec" href="' . get_permalink() . '">More</a>
  </div>
</li>';
?>