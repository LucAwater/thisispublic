<li class="brand">
  <div>
    <div class="thumb-content">
      <a href="<?php echo get_term_link( $brand->slug, 'product_brand' ); ?>"><h3><?php echo $brand->name; ?></h3></a>
    </div>

    <a href="<?php echo get_term_link( $brand->slug, 'product_brand' ); ?>">
      <img src="<?php echo get_brand_thumbnail_url( $brand->term_id, 'medium' ); ?>">
    </a>

    <div class="thumb-content">
      <p><?php echo $brand->description; ?></p>
      <a class="button button-sec" href="<?php echo get_term_link( $brand->slug, 'product_brand' ); ?>">View products</a>

      <?php
      // Brand files
      $brand_files = get_field( 'brand_files', $brand );
      if( $brand_files ):

        echo '<div class="brand-files">';

        foreach( $brand_files as $file ){
          $url = $file['brand_files_file']['url'];
          $title = $file['brand_files_title'];

          echo '<a class="link-arrow link-arrow-right" href="' . $url . '"><img src="' . get_template_directory_uri() . '/img/arrow.svg">' . $title . '</a>';
        }

        echo '</div>';
      endif;

      $brand_mailLinks = get_field( 'brand_mailLinks', $brand );
      if( $brand_mailLinks ):
        echo '<div class="brand-links">';

        foreach( $brand_mailLinks as $link ){
          $subject = $link['brand_mailLinks_subject'];
          $content = $link['brand_mailLinks_content'];
          $actionlink = $link['brand_mailLinks_link'];

          echo '<a class="link-arrow link-arrow-right" href="mailto:info@thisispublic.com?subject=' . $subject . '&body=' . $content . '"><img src="' . get_template_directory_uri() . '/img/arrow.svg">' . $actionlink . '</a>';
        }

        echo '</div>';
      endif;
      ?>
    </div>
  </div>
</li>