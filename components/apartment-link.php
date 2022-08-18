<?php

  if (!isset($apartment) || empty($apartment)) {
    return;
  }

  $classes = $classes ?? '';

  $slider = get_field('slider', $apartment->ID);
  if (empty($slider['gallery'])) {
    return;
  }

  $img       = $slider['gallery'][0];
  $price     = get_field('price', $apartment->ID);
  $occupancy = get_field('occupancy', $apartment->ID);
  $link      = 'https://panel.hotres.pl/v4_adjust?oid=2447&lang=pl&tid=' . get_field('hotres_id', $apartment) . '&template=standalone&tid_ontop=' . get_field('hotres_id', $apartment);
?>

<div class="col3 column-inner vertical-image-text <?=$classes?>">
  <div class="image-wrapper-full-width">
    <a href="<?=$link?>" target="_blank" rel="noopener noreferrer"
      class="cake-zoom-frame">
      <div class="cake cake-3-4"
        style="background-image: url(<?=$img['sizes']['medium']?>)">
      </div>
    </a>
  </div>
  <div class="rmin"></div>
  <div class="text-center">
    <div class="small-title small-title--no-underline">
      <?=get_the_title($apartment)?></div>
  </div>
  <div class="rmik"></div>
  <div class="text-center">
    <?php if (!empty($occupancy)) {?>
    <div class="icon icon--person"></div>
    <?=$occupancy?>
    <?php }
  if (!empty($occupancy) && !empty($price)) {
    echo ' | ';
  }
  if (!empty($price)) {
  ?>
    <?=pll__('cena')?>: <?=$price?> zł
    <?php }?>
  </div>
  <div class="rmin"></div>
  <div class="text text--small">
    <?=$slider['text']?>
  </div>
  <div class="rmin"></div>

  <div class="button-container text-center">
    <a href="<?=$link?>" target="_blank" rel="noopener noreferrer">
      <button><?=pll__('rezerwuj')?></button>
    </a>
  </div>
  <div class="r less-768">
  </div>
</div>
