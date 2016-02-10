<?php
// Creates ACF options pages
if( function_exists('acf_add_options_page') ){

  acf_add_options_page( array(
    'page_title'  => 'Company Info',
    'menu_title'  => 'Company Info',
    'menu_slug'   => 'company',
    'redirect'    => false
  ));

  acf_add_options_page( array(
    'page_title'  => 'Theme Selectors',
    'menu_title'  => 'Theme Selectors',
    'menu_slug'   => 'tag-filter',
    'redirect'    => false
  ));
}
?>