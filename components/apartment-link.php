<?php

  if (!isset($apartment) || empty($apartment)) {
    return;
  }

  $slider    = get_field('slider', $apartment->ID);
  $img       = $slider['gallery'][0];
  $price     = get_field('price', $apartment->ID);
  $occupancy = get_field('occupancy', $apartment->ID);
?>

<div class="col3 column-inner vertical-image-text">
  <div class="image-wrapper-full-width">
    <div class="cake cake-3-4"
      style="background-image: url(<?=$img['sizes']['medium']?>)">
    </div>
  </div>
  <div class="rmin"></div>
  <div class="text-center">
    <div class="small-title"><?=get_the_title($apartment)?></div>
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
    cena: <?=$price?>
    <?php }?>
  </div>
  <div class="rmin"></div>
  <div class="text text--small">
    <?=$slider['text']?>
  </div>
  <div class="r less-768"></div>
</div>
