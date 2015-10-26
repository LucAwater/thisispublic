  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
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

      <p class="is-grey">&copy; 2015 site by Monomark</p>
    </div>
  </footer>

  <!-- Scripts -->
  <?php wp_footer(); ?>
</body>
</html>