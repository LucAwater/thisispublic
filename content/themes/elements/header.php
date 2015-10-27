<?php
/**
 * @package WordPress
 */
?>

<!DOCTYPE html>
<!--[if IE 9]>    <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <title>PUBLIC_</title>

  <link rel="canonical" href="<?php echo home_url(); ?>">

  <!-- META TAGS -->
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="description" content="">

  <meta property="og:title" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Fonts from Typography.com -->
  <link rel="stylesheet" type="text/css" href="//cloud.typography.com/680076/784108/css/fonts.css" />

  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css">

  <!-- Google Maps dependency -->
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

  <!-- WP_HEAD() -->
  <?php wp_head(); ?>
</head>

<?php
global $post;

$detect = new Mobile_Detect;
if( $detect->isMobile() || $detect->isTablet() ){
  $body_class = 'is-touch page-' . $post->post_name;
} else {
  $body_class = 'page-' . $post->post_name;
}
?>

<body <?php body_class($body_class); ?>>
  <!--[if lt IE 10]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <!-- Header -->
  <header>
    <a class="link-logo" href="<?php echo home_url(); ?>">
      <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/logo.svg">
    </a>

    <a class="menu-open"><i></i></a>
  </header>

  <!-- Menu -->
  <div class="menu">
    <div class="menu-header">
      <a class="link-logo" href="<?php echo home_url(); ?>">
        <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/logo-white.svg">
      </a>

      <a class="menu-close"><i></i></a>
    </div>

    <div class="menu-content">
      <?php
      $nav = array(
        'theme_location'  => 'menu_primary',
        'container'       => '',
        'link_before'     => '<h3>',
        'link_after'      => '</h3>',
        'items_wrap'      => '<ul class="menu-nav">%3$s</ul>'
      );

      wp_nav_menu( $nav );
      ?>

      <ul class="social">
        <?php
        if( have_rows('company_platforms', 'option') ):
          while( have_rows('company_platforms', 'option') ): the_row();
            $platform_name = get_sub_field( 'company_platform', 'option' );
            $platform_link = get_sub_field( 'company_platform_link', 'option' );

            echo '<li><a href="' . $platform_link . '" target="_blank"><img src="' . get_template_directory_uri() . '/img/social/' . $platform_name . '.svg"></a></li>';

          endwhile;
        endif;
        ?>
      </ul>

      <div class="company-contact">
        <?php
        $company_contact = get_field('company_contact', 'option');

        echo '<p>' . $company_contact . '</p>';
        ?>
      </div>
    </div>
  </div>

  <?php
  // Hero section (must be placed before main)
  if( have_posts() ):
    while( have_posts() ): the_post();

      // Loop into ACF groups
      if( have_rows('page') ):
        while( have_rows('page') ): the_row();

          if( get_row_layout() == 'hero' ):
            echo '<!-- Hero -->';
            include_once( locate_template('content/hero.php') );
          endif;

        endwhile;
      endif;

    endwhile;
  endif;
  ?>

  <!-- Main content -->
  <main role="main">
