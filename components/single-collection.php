<?php
  if (!isset($collection)) {
    return;
  }

  $img = get_field('image', $collection);
?>

<div class="flex flex-align-end single-collection">
  <div class="col2 column collection-image-column">
    <div class="cake cake-3-4"
      style="background-image: url('<?=$img['sizes']['large']?>');">
      <?php get_component('cake-frame');?>
    </div>
  </div>
  <div class="col2 column collection-description-column">
    <div class="collection-number">kolekcja #<?=($__index + 1)?></div>
    <div class="r"></div>
    <div class="collection-title handwrite"><?=$collection->name?>
    </div>
    <div class="r"></div>
    <div class="collection-description">
      <?=$collection->description?></div>
    <div class="r"></div>
    <a href="<?=get_tag_link($collection)?>">
      <button>zobacz więcej</button>
    </a>
  </div>
</div>
