<?php
function filter_options_brand() {
  echo '<a class="filter-current" title="brand-current" data-current="all" data-target="brand">brand</a>';

  echo do_shortcode( '[product_brand_list]' );
}

function filter_options_category() {
  ?>
  <a class="filter-current" title="category-current" data-current="all" data-target="category">product category</a>

  <ul id="select-category" class="filter-options">
    <li class="current"><a class="tax-filter is-uppercase" title="all" data-parent="category">Show all</a></li>

    <?php
    $args = array(
        'hide_empty' => false,
        'parent'     => 0
    );

    $categories = get_terms( 'product_cat', $args );

    foreach( $categories as $cat ):
    ?>
      <li><a class="tax-filter is-uppercase" title="<?php echo $cat->slug; ?>" data-parent="category"><?php echo $cat->name; ?></a>
        <?php
        $subargs = array(
          'taxonomy'  => 'product_cat',
          'hide_empty' => false,
          'child_of'  => $cat->term_id
        );
        $subcategories = get_categories( $subargs );

        if( $subcategories ):
          ?>
          <ul class="subcategories">
            <?php foreach( $subcategories as $subcat ): ?>
              <li><a class="tax-filter" title="<?php echo $subcat->slug; ?>" data-parent="category"><?php echo $subcat->name; ?></a></li>
            <?php endforeach; ?>
          </ul>
          <?php
        endif;
      endforeach; ?>
    </li>

  </ul>
  <?php
}

function filter_options_season() {
  ?>
  <a class="filter-current" title="season-current" data-current="all" data-target="season">season</a>

  <ul id="select-season" class="filter-options">
    <li class="current"><a class="tax-filter is-uppercase" title="all" data-parent="season">Show all</a></li>

    <?php
    $seasons = get_terms( 'season' );

    foreach( $seasons as $season ):
    ?>
      <li><a class="tax-filter" title="<?php echo $season->slug; ?>" data-parent="season"><?php echo $season->name; ?></a></li>
    <?php endforeach; ?>
  </ul>
  <?php
}

function filter_options_tag() {
  $tag_terms = get_the_terms($post->id, 'product_tag');
  ?>
  <a class="filter-current" title="tag-current" data-current="all" data-target="tag">theme</a>
  
  <ul id="select-tag" class="filter-options">
    <?php
    if( !is_tax('product_tag') ){
      echo '<li class="current"><a class="tax-filter is-uppercase" title="all" data-parent="tag">Show all</a></li>';
    } else {
      echo '<li><a class="tax-filter is-uppercase" title="all" data-parent="tag">Show all</a></li>';
    }
    ?>

    <?php
    $tags = get_field( 'tags_selected', 'option' );
    $current_tag = $tag_terms[0]->slug;

    if( $tags ):
      foreach( $tags as $tag ):

        if( is_tax('product_tag') && $tag->slug === $current_tag ){
          echo '<li class="current"><a class="tax-filter" title="' . $tag->slug . '" data-parent="tag">' . $tag->name . '</a></li>';
        } else {
          echo '<li><a class="tax-filter" title="' . $tag->slug . '" data-parent="tag">' . $tag->name . '</a></li>';
        }

      endforeach;
    endif;
    ?>
  </ul>
  <?php
}

function filter_options_gender() {
  ?>
  <a class="filter-current" title="gender-current" data-current="all" data-target="gender">gender</a>

  <ul id="select-gender" class="filter-options">
    <li class="current"><a class="tax-filter is-uppercase" title="all" data-parent="gender">Show all</a></li>

    <?php
    $genders = get_terms( 'gender', 'orderby=count&hide_empty=0' );

    foreach( $genders as $gender ):
      ?>
      <li><a class="tax-filter" title="<?php echo $gender->slug; ?>" data-parent="gender"><?php echo $gender->name; ?></a></li>
      <?php
    endforeach;
    ?>
  </ul>
  <?php
}
?>