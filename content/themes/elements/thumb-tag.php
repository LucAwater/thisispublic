<!--
[term_id] => 289
[name] => alabama fire
[slug] => alabama-fire
[term_group] => 0
[term_taxonomy_id] => 289
[taxonomy] => product_tag
[description] =>
[parent] => 0
[count] => 1
[filter] => raw
-->
<?php
$name = $tag->name;
$link = get_term_link( $tag->slug, 'product_tag' );
$image = get_field('tag_thumbnail', $tag);
$description = $tag->description;
?>
<li class="brand">
  <div>
    <div class="thumb-content">
      <a href="<?php echo $link; ?>"><h3><?php echo $name; ?></h3></a>
    </div>

    <a href="<?php echo $link; ?>">
      <img src="<?php echo $image['sizes']['medium']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>">
    </a>

    <div class="thumb-content">
      <?php echo wpautop($description); ?>
      <a class="button button-sec" href="<?php echo $link; ?>">View products</a>
    </div>
  </div>
</li>