<?php
  $facilities = $facilities ?? [];
  $title      = $title ?? '';
  $meals      = $meals ?? [];
  $image      = $image ?? '';
  $link       = $link ?? '';
?>

<div class="content facilities-container fade">
  <div class="flex flex-1050">
    <div class="col2 column">
      <div class="small-title"><?=$title?></div>
      <div class="r"></div>

      <?php get_component('facilities-icons', ['facilities' => $facilities]);?>

      <div class="r"></div>
      <div class="r"></div>
      <?php for ($i = 0; $i < count($meals); $i++) {?>
      <div class='meals-single'>
        <span class="uppercase"><?=$meals[$i]['name']?></span>
        <?=$meals[$i]['text']?>
      </div>
      <?php }?>
    </div>
    <div class="col2 column more-1050">
      <div class="cake cake-3-4" style="background-image: url(<?=$image?>)">
        <?php get_component('cake-frame');?>
      </div>
    </div>
  </div>
  <?php if (!empty($link['text'])) {?>
  <div class="rsep"></div>
  <div class="text-center">
    <a href="<?=get_link_url($link)?>">
      <button><?=$link['text']?></button>
    </a>
  </div>
  <?php }?>
</div>
