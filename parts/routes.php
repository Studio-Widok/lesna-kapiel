<?php
  $routes = get_field('routes');
  if (empty($routes) || empty($routes['maps'])) {
    return;
  }
?>

<div id="routes-wrap" class="content">
  <div class="r"></div>
  <div class="flex flex-align-center column-outer-growing">
    <div class="col5-3 rel">
      <div class="route-slider">
        <?php foreach ($routes['maps'] as $link) {?>
        <div class="slide">
          <div class="route-map"
            style="background-image:url(<?=$link['map_image']['sizes']['medium']?>);">
          </div>
        </div>
        <?php }?>
      </div>
      <?php get_component('slider-arrows');?>
    </div>
    <div class="col5-2 column-inner-growing">
      <div class="handwrite routes-handwrite"><?=$routes['title']?></div>
      <div class="r"></div>
      <?=$routes['intro']?>
      <div class="r"></div>

      <div class="routes-list">
        <?php foreach ($routes['maps'] as $link) {?>
        <div
          class="route-link uppercase flex flex-justify-space-between flex-align-center">
          <div class="route-link-title"><?=$link['title']?></div>
          <?php if (!empty($link['map_link'])) {?>
          <a class="route-link-out" href="<?=$link['map_link']?>"
            target="_blank" rel="noopener noreferrer">
            <img
              src="<?=get_template_directory_uri()?>/media/icons/icon-pin-white.png"
              alt="">
            <span><?=pll__('map')?></span>
          </a>
          <?php }?>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
  <div class="rsep"></div>
</div>
