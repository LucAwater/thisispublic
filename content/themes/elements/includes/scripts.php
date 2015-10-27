<?php
function enqueue_theme_scripts() {
  // Unregister standard jQuery and reregister as google code.
  wp_deregister_script('jquery');
  wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', true, true );
	wp_enqueue_script( 'jquery' );

	if( WP_DEBUG ):
		// Plugins
		// For example:
    wp_enqueue_script( 'pace', get_template_directory_uri() . '/js/vendor/pace.js', 'jquery', false, true );
    wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/vendor/scroll.js', 'jquery', false, true );
    wp_enqueue_script( 'imagesLoaded', get_template_directory_uri() . '/js/vendor/imagesLoaded.js', 'jquery', false, true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/vendor/isotope.js', 'jquery', false, true );
    wp_enqueue_script( 'jqueryMobile', get_template_directory_uri() . '/js/vendor/jquery.mobile.custom.min.js', 'jquery', false, true );
    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/vendor/jquery.waypoints.min.js', 'jquery', false, true );
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/vendor/sticky.min.js', 'jquery', false, true );
    wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/js/vendor/skrollr.js', 'jquery', false, true );
    wp_enqueue_script( 'slider', get_template_directory_uri() . '/js/vendor/slider.js', 'jquery', false, true );
    wp_enqueue_script( 'pageload', get_template_directory_uri() . '/js/pageload.js', 'jquery', false, true );
    wp_enqueue_script( 'resize', get_template_directory_uri() . '/js/resize.js', 'jquery', false, true );
    wp_enqueue_script( 'product-filter', get_template_directory_uri() . '/js/product-filter.js', 'jquery', false, true );
    wp_enqueue_script( 'hero', get_template_directory_uri() . '/js/hero.js', 'jquery', false, true );
    wp_enqueue_script( 'link-heading', get_template_directory_uri() . '/js/link-heading.js', 'jquery', false, true );
    wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/menu.js', 'jquery', false, true );
    wp_enqueue_script( 'download-button', get_template_directory_uri() . '/js/download-button.js', 'jquery', false, true );
    wp_enqueue_script( 'video', get_template_directory_uri() . '/js/video.js', 'jquery', false, true );
    wp_enqueue_script( 'init-isotope', get_template_directory_uri() . '/js/init-isotope.js', 'jquery', false, true );
    wp_enqueue_script( 'init-skrollr', get_template_directory_uri() . '/js/init-skrollr.js', 'jquery', false, true );
    wp_enqueue_script( 'init-waypoints', get_template_directory_uri() . '/js/init-waypoints.js', 'jquery', false, true );
    wp_enqueue_script( 'init-slider', get_template_directory_uri() . '/js/init-slider.js', 'jquery', false, true );
 	else:
		// All concatenated and compressed JS in one file:
		wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', 'jquery', false, true );
 	endif;
}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');
?>