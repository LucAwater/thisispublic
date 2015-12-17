<?php
//create a function that will attach our new 'member' taxonomy to the 'post' post type
function add_userlevel_taxonomy_to_product(){

   //set the name of the taxonomy
   $taxonomy = 'userlevel';
   //set the post types for the taxonomy
   $object_type = 'product';

   //populate our array of names for our taxonomy
   $labels = array(
       'name'               => 'User Level',
       'singular_name'      => 'User Level',
       'search_items'       => 'Search User Levels',
       'all_items'          => 'All User Levels',
       'parent_item'        => 'Parent User Level',
       'parent_item_colon'  => 'Parent User Level:',
       'update_item'        => 'Update User Level',
       'edit_item'          => 'Edit User Level',
       'add_new_item'       => 'Add New User Level',
       'new_item_name'      => 'New User Level Name',
       'menu_name'          => 'User Level'
   );

   //define arguments to be used
   $args = array(
       'labels'            => $labels,
       'hierarchical'      => true,
       'show_ui'           => true,
       'how_in_nav_menus'  => true,
       'public'            => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array('slug' => 'userlevel')
   );

   //call the register_taxonomy function
   register_taxonomy($taxonomy, $object_type, $args);
}
add_action('init','add_userlevel_taxonomy_to_product');
?>