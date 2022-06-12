<?php
  if (!isset($attraction)) {
    return;
  }

?>

<div class="additional-links">

  <?php if (!empty($attraction['distance'])) {?>
  <div class="text-link">
    <img src="<?=get_template_directory_uri()?>/media/icons/icon-distance.png"
      alt="" class="additional-link-icon">
    <span><?=pll__('dystans')?> <?=$attraction['distance']?></span>
  </div>
  <?php }?>

  <?php if (!empty($attraction['map_link'])) {?>
  <a class="text-link" href="<?=$attraction['map_link']?>" target="_blank"
    rel="noopener noreferrer">
    <img src="<?=get_template_directory_uri()?>/media/icons/icon-pin.png" alt=""
      class="additional-link-icon">
    <span><?=pll__('znajdź na mapie')?></span>
  </a>
  <?php }?>

  <?php if (!empty($attraction['bike_popup']) && isset($_GET['t'])) {?>
  <div class="text-link bike-popup-open">
    <img src="<?=get_template_directory_uri()?>/media/icons/icon-bike.png"
      alt="" class="additional-link-icon">
    <span><?=pll__('dystans idealny na rower, wypożycz u nas')?></span>
  </div>
  <?php }?>

</div>
