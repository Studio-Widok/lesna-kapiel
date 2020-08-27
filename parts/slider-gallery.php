<?php
  $gallery = $gallery ?? [];
  $text    = $text ?? '';
  $title   = $title ?? '';
?>

<div id="lb-container-image" class="lb-container hidden">
  <div class='close-lb'>
    <div></div>
    <div></div>
    <div></div>
  </div>
  <div class="lb">
    <div class="image-container"></div>
    <?php get_component('slider-arrows')?>
  </div>
</div>

<div id="lb-container-masonry" class="lb-container hidden">
  <div class="lb column">
    <div class="rsep"></div>
    <div class="masonry">
      <?php for ($i = 0; $i < count($gallery); $i++) {?>
      <div class="gallery-item column" data-iterator="<?=$i?>">
        <div class="gallery-item-in">
          <div class="cake"
            style="padding-bottom: <?=$gallery[$i]['height'] / $gallery[$i]['width'] * 100?>%; background-image: url('<?=$gallery[$i]['sizes']['medium']?>');">
          </div>
        </div>
      </div>
      <?php }?>
    </div>
    <div class='close-lb'>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
</div>

<div class="content column">
  <div class="slider-gallery">
    <?php for ($i = 0; $i < count($gallery); $i++) {?>
    <div class="single-slide"
      data-full-image="<?=$gallery[$i]['sizes']['large']?>"
      data-width="<?=$gallery[$i]['width']?>"
      data-height="<?=$gallery[$i]['height']?>">
      <div class="cake"
        style="background-image: url('<?=$gallery[$i]['sizes']['medium']?>');">
      </div>
    </div>
    <?php }?>
  </div>
</div>

<div class="slider-content content column flex flex-justify-end">
  <div class="col2">
    <div
      class="flex flex-align-center flex-justify-end slider-arrows-container">
      <?php get_component('slider-arrows')?>
      <div class="masonry-icon">masonry</div>
    </div>
    <div class="uppercase"><?=$title?></div>
    <div><?=$text?></div>
  </div>
</div>
