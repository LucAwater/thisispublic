<?php
/**
 * @package WordPress
 */
?>

<!DOCTYPE html>
<!--[if IE 9]>    <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <title>YOUR SITE</title>

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

  <!-- Fonts from MyFonts (30 day trial) -->
  <script type="text/javascript">
    (function() {
        var path = '//easy.myfonts.net/v2/js?sid=210860(font-family=Avenir+Next+Pro+Bold)&sid=217165(font-family=Avenir+Next+Pro)&sid=217166(font-family=Avenir+Next+Pro+Medium)&sid=217815(font-family=Avenir+Next+Pro+UltraLight)&key=IBeNvfaI2F',
            protocol = ('https:' == document.location.protocol ? 'https:' : 'http:'),
            trial = document.createElement('script');
        trial.type = 'text/javascript';
        trial.async = true;
        trial.src = protocol + path;
        var head = document.getElementsByTagName("head")[0];
        head.appendChild(trial);
    })();
  </script>

  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css">

  <!-- WP_HEAD() -->
  <?php wp_head(); ?>
</head>

<body class="is-loading">
  <!--[if lt IE 10]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <!-- Header -->
  <header>
    <a class="link-logo" href="<?php echo home_url(); ?>">
      <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/logo.svg">
    </a>

    <?php include( 'includes/nav.php' ); ?>

    <!-- <a class="trigger trigger-menu"><i></i></a> -->
  </header>

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
