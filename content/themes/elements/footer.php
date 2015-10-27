  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <p class="margin-b20">Sign up to our newsletter</p>
      <!-- Mailchimp signup form -->
      <div id="mc_embed_signup">
        <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <div id="mc_embed_signup_scroll" class="heightfix">
            <div class="mc-field-group">
              <input type="email" placeholder="email here" value="" name="EMAIL" class="required email" id="mce-EMAIL">
              <input type="submit" value="Submit" name="subscribe" id="mc-embedded-subscribe" class="button">
            </div>

            <div style="position: absolute; left: -5000px;">
              <input type="text" name="b_367cf8eb4596907fd2ae5a6f5_10a80e319d" tabindex="-1" value="">
            </div>
          </div>

          <div id="mce-responses" class="clear">
            <div class="response margin-t30" id="mce-error-response" style="display:none; font-size:13px;"></div>
            <div class="response margin-t30" id="mce-success-response" style="display:none; font-size:13px;"></div>
          </div>
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        </form>
      </div>
      <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
      <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);
      </script>
      <!--End mc_embed_signup-->

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