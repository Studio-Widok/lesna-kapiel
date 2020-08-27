<?php
  $gallery = $gallery ?? [];
  $text    = $text ?? '';
  $title   = $title ?? '';
?>

<div id="lb-container" class="lb-container hidden">
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
      <div class="gallery-item column">
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

<div class="slider-gallery content column">
  <div class="flex column-outer">
    <?php for ($i = 0; $i < count($gallery); $i++) {?>
    <div class="col5-2 column-inner single-slide element-lb"
      data-full-image="<?=$gallery[$i]['sizes']['large']?>"
      data-width="<?=$gallery[$i]['width']?>"
      data-height="<?=$gallery[$i]['height']?>">
      <div class="cake cake-10-16"
        style="background-image: url('<?=$gallery[$i]['sizes']['medium']?>');">
      </div>
    </div>
    <?php }?>
  </div>
  <?php get_component('slider-arrows')?>
  <div class="flex column-outer">
    <div class="col5-2 column-inner single-slide element-lb"
      data-full-image="<?=$gallery[0]['sizes']['large']?>"
      data-width="<?=$gallery[0]['width']?>"
      data-height="<?=$gallery[0]['height']?>">
      <div class="cake cake-10-16"
        style="background-image: url('<?=$gallery[0]['sizes']['medium']?>');">
      </div>
    </div>
    <div class="col5-3">
      <div class='flex column-outer-right'>
        <div class=" col5-2 column-inner ingle-slide element-lb"
          data-full-image="<?=$gallery[1]['sizes']['large']?>"
          data-width="<?=$gallery[1]['width']?>"
          data-height="<?=$gallery[1]['height']?>">
          <div class="cake cake-10-16"
            style="background-image: url('<?=$gallery[1]['sizes']['medium']?>');">
          </div>
        </div>
        <div class="col5-3 column-inner single-slide element-lb"
          data-full-image="<?=$gallery[2]['sizes']['large']?>"
          data-width="<?=$gallery[2]['width']?>"
          data-height="<?=$gallery[2]['height']?>">
          <div class=" cake"
            style="background-image: url('<?=$gallery[2]['sizes']['medium']?>');">
          </div>
        </div>
      </div>
      <div class="column flex flex-align-center flex-justify-end">
        <div class="masonry-icon">masonry</div>
      </div>
      <div class="column">
        <div class="uppercase"><?=$title?></div>
        <div><?=$text?></div>
      </div>
    </div>
  </div>
</div>
