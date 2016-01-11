<?php
// Current brand and gender
$brand_terms = get_the_terms($post->id, 'product_brand');
?>

<div class="filter is-fullwidth">
  <?php if( is_shop() ): ?>
    <a class="filter-current" title="brand-current" data-current="all" data-target="brand">brand: <span>All</span></a>
    <a class="filter-current" title="category-current" data-current="all" data-target="category">product category: <span>All</span></a>
    <a class="filter-current" title="season-current" data-current="all" data-target="season">season: <span>All</span></a>
    <a class="filter-current" title="tag-current" data-current="all" data-target="tag">theme: <span>All</span></a>
    <a class="filter-current" title="gender-current" data-current="all" data-target="gender">gender: <span>All</span></a>
  <?php else: ?>
    <a class="filter-current" title="brand-current" data-current="<?php echo $brand_terms[0]->slug; ?>" data-target="brand">brand: <span><?php echo $brand_terms[0]->name; ?></span></a>
    <a class="filter-current" title="category-current" data-current="all" data-target="category">product category: <span>All</span></a>
    <a class="filter-current" title="season-current" data-current="all" data-target="season">season: <span>All</span></a>
    <a class="filter-current" title="tag-current" data-current="all" data-target="tag">theme: <span>All</span></a>
    <a class="filter-current" title="gender-current" data-current="all" data-target="gender">gender: <span>All</span></a>
  <?php endif; ?>

  <!-- Brand filter -->
  <?php echo do_shortcode( '[product_brand_list]' ); ?>

  <!-- Product category filter -->
  <ul id="select-category" class="filter-options">
    <li class="current"><a class="tax-filter" title="all" data-parent="category">All</a></li>

    <?php
    $args = array(
      'taxonomy' => 'product_cat'
    );
    $categories = get_categories( $args );

    foreach( $categories as $cat ):
    ?>
      <li><a class="tax-filter" title="<?php echo $cat->slug; ?>" data-parent="category"><?php echo $cat->name; ?></a></li>
    <?php endforeach; ?>
  </ul>

  <!-- Season filter -->
  <ul id="select-season" class="filter-options">
    <li class="current"><a class="tax-filter" title="all" data-parent="season">All</a></li>

    <?php
    $seasons = get_terms( 'season' );

    foreach( $seasons as $season ):
    ?>
      <li><a class="tax-filter" title="<?php echo $season->slug; ?>" data-parent="season"><?php echo $season->name; ?></a></li>
    <?php endforeach; ?>
  </ul>

  <!-- Tag filter -->
  <ul id="select-tag" class="filter-options">
    <li class="current"><a class="tax-filter" title="all" data-parent="tag">All</a></li>

    <?php
    $tags = get_field( 'tags_selected', 'option' );

    if( $tags ):
      foreach( $tags as $tag ):
        ?>
        <li><a class="tax-filter" title="<?php echo $tag->slug; ?>" data-parent="tag"><?php echo $tag->name; ?></a></li>
        <?php
      endforeach;
    endif; ?>
    ?>
  </ul>

  <!-- Gender filter -->
  <ul id="select-gender" class="filter-options">
    <li class="current"><a class="tax-filter" title="all" data-parent="gender">All</a></li>

    <?php
    $genders = get_terms( 'gender', 'orderby=count&hide_empty=0' );

    foreach( $genders as $gender ):
      ?>
      <li><a class="tax-filter" title="<?php echo $gender->slug; ?>" data-parent="gender"><?php echo $gender->name; ?></a></li>
      <?php
    endforeach;
    ?>
  </ul>

  <!-- Search form -->
  <form id="search-form" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <input id="search-field" type="search" class="search" value="" name="s" title="" />
    <button id="search-button" type="submit">search</button>
    <p class="search-trigger">search</p>
  </form>
</div>