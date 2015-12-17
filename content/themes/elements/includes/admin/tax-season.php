<?php
//create a function that will attach our new 'member' taxonomy to the 'post' post type
function add_season_taxonomy_to_product(){

   //set the name of the taxonomy
   $taxonomy = 'season';
   //set the post types for the taxonomy
   $object_type = 'product';

   //populate our array of names for our taxonomy
   $labels = array(
       'name'               => 'Season',
       'singular_name'      => 'Season',
       'search_items'       => 'Search Seasons',
       'all_items'          => 'All Seasons',
       'parent_item'        => 'Parent Season',
       'parent_item_colon'  => 'Parent Season:',
       'update_item'        => 'Update Season',
       'edit_item'          => 'Edit Season',
       'add_new_item'       => 'Add New Season',
       'new_item_name'      => 'New Season Name',
       'menu_name'          => 'Season'
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
       'rewrite'           => array('slug' => 'season')
   );

   //call the register_taxonomy function
   register_taxonomy($taxonomy, $object_type, $args);
}
add_action('init','add_season_taxonomy_to_product');
?>