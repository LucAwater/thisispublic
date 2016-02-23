<div class="filter is-fullwidth">
  <ul>
    <li><?php filter_options_brand(); ?></li>
    <li><?php filter_options_category(); ?></li>
    <li><?php filter_options_season(); ?></li>
    <li><?php filter_options_tag(); ?></li>
    <li><?php filter_options_gender(); ?></li>
  </ul>

  <form id="search-form" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <input id="search-field" type="search" class="search" value="" name="s" title="" />
    <button id="search-button" type="submit">search</button>
    <p class="search-trigger">search</p>
  </form>
</div>