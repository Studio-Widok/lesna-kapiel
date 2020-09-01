<?php
  $facilities = $facilities ?? [];
  $title      = $title ?? '';
  $meals      = $meals ?? [];
  $image      = $image ?? '';
  $link       = $link  ?? '';
?>

<div class="content facilities-container">
  <div class="flex">
    <div class="col2 column">
      <div class="small-title"><?=$title?></div>
      <div class="r"></div>
      <div class="facilities-icons-container">
        <?php for ($i = 0; $i < count($facilities); $i++) {?>
        <div class="flex flex-align-center facilities-icon-single">
          <img src="<?=$facilities[$i]['icon']['sizes']['medium']?>" />
          <?=$facilities[$i]['text']?>
        </div>
        <?php }?>
      </div>
      <div class="r"></div>
      <div class="r"></div>
      <?php for ($i = 0; $i < count($meals); $i++) {?>
      <div class='meals-single'>
        <span class="uppercase"><?=$meals[$i]['name']?></span>
        <?=$meals[$i]['text']?>
      </div>
      <?php }?>
    </div>
    <div class="col2 column">
      <div class="cake cake-3-4" style="background-image: url(<?=$image?>)">
      </div>
    </div>
  </div>
  <div class="rsep"></div>
  <div class="flex flex-justify-center">
    <a href="<?=get_link_url($link)?>">
      <button><?=$link['text']?></button>
    </a>
  </div>
</div>
