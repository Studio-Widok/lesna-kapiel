<?php
  $gallery = $gallery ?? [];
  $text    = $text ?? '';
  $title   = $title ?? '';
  $nav_img = get_field('nav_image', 2);
?>

<div id="lb-container-image" class="lb-container hidden"
  style="background-image: url('<?=$nav_img['sizes']['large']?>');">
  <div class='close-lb'>
    <div></div>
    <div></div>
    <div></div>
  </div>
  <div class=" lb">
    <div class="image-container"></div>
  </div>
  <?php get_component('slider-arrows')?>
</div>

<div id="lb-container-masonry" class="lb-container hidden"
  style="background-image: url('<?=$nav_img['sizes']['large']?>');">
  <div class="lb">
    <div class="rsep"></div>
    <div class="masonry">
      <div class="gallery-sizer"></div>
      <?php for ($i = 0; $i < count($gallery); $i++) {?>
      <div class="gallery-item column">
        <div class="gallery-item-in" data-iterator="<?=$i?>">
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
  <div class="slider-gallery fade">
    <?php for ($i = 0; $i < count($gallery); $i++) {?>
    <div class="single-slide"
      data-full-image="<?=$gallery[$i]['sizes']['large']?>"
      data-width="<?=$gallery[$i]['width']?>"
      data-height="<?=$gallery[$i]['height']?>">
      <div class="cake"
        style="background-image: url('<?=$gallery[$i]['sizes']['large']?>');">
      </div>
    </div>
    <?php }?>
  </div>
</div>
<div class="r less-768"></div>
<div
  class="content column flex flex-align-center flex-justify-end slider-arrows-container fade">
  <?php get_component('slider-arrows')?>
  <div class="masonry-icon more-768">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0 0 44 44">
      <rect x="2" y="2" width="10" height="10" />
      <rect x="17" y="2" width="10" height="10" />
      <rect x="32" y="2" width="10" height="10" />
      <rect x="2" y="17" width="10" height="10" />
      <rect x="17" y="17" width="10" height="10" />
      <rect x="32" y="17" width="10" height="10" />
      <rect x="2" y="32" width="10" height="10" />
      <rect x="17" y="32" width="10" height="10" />
      <rect x="32" y="32" width="10" height="10" />
    </svg>
  </div>
</div>
<div class="slider-content-wrap content column flex flex-justify-end fade">
  <div class="slider-content">
    <div class="uppercase"><?=$title?></div>
    <div><?=$text?></div>
  </div>
</div>
