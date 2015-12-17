<?php
// Custom user roles
add_role(
  'level_one',
  'Level one',
  array(
    'read'          => true,
    'edit_posts'    => false,
    'delete_posts'  => false
  )
);

add_role(
  'level_two',
  'Level two',
  array(
    'read'          => true,
    'edit_posts'    => false,
    'delete_posts'  => false
  )
);
?>