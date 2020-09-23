<?php
  if (!isset($collection)) {
    return;
  }
  $is_current = $is_current ?? false;

  $img = get_field('image', $collection);
?>

<div class="flex single-collection flex-768">
  <div class="col2 column collection-image-column">
    <div class="cake cake-3-4"
      style="background-image: url('<?=$img['sizes']['large']?>');">
      <?php get_component('cake-frame');?>
    </div>
  </div>
  <div class="col2 column collection-description-column">
    <div class="collection-title handwrite less-768"><?=$collection->name?>
    </div>
    <div class="r less-768"></div>
    <div class="r less-768"></div>
    <div class="collection-number small">
      <?php
        if ($is_current) {
          pll_e('ten apartament jest z kolekcji');
        } else {
          pll_e('kolekcja #');
          echo ($__index + 1);
        }
      ?>
    </div>
    <div class="r"></div>
    <div class="collection-title handwrite more-768"><?=$collection->name?>
    </div>
    <div class="r more-768"></div>
    <div>
      <div class="collection-description">
        <?=$collection->description?></div>
      <div class="r"></div>
      <div class="button-container">
        <a href="<?=get_tag_link($collection)?>">
          <button><?php pll_e('zobacz więcej')?></button>
        </a>
      </div>
    </div>
  </div>
</div>
