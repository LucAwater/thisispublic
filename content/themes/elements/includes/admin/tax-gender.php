<?php
//create a function that will attach our new 'member' taxonomy to the 'post' post type
function add_gender_taxonomy_to_product(){

   //set the name of the taxonomy
   $taxonomy = 'gender';
   //set the post types for the taxonomy
   $object_type = 'product';

   //populate our array of names for our taxonomy
   $labels = array(
       'name'               => 'Gender',
       'singular_name'      => 'Gender',
       'search_items'       => 'Search Genders',
       'all_items'          => 'All Genders',
       'parent_item'        => 'Parent Gender',
       'parent_item_colon'  => 'Parent Gender:',
       'update_item'        => 'Update Gender',
       'edit_item'          => 'Edit Gender',
       'add_new_item'       => 'Add New Gender',
       'new_item_name'      => 'New Gender Name',
       'menu_name'          => 'Gender'
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
       'rewrite'           => array('slug' => 'gender')
   );

   //call the register_taxonomy function
   register_taxonomy($taxonomy, $object_type, $args);
}
add_action('init','add_gender_taxonomy_to_product');
?>