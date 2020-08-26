<?php
  $gallery = $gallery ?? [];
  $text    = $text ?? '';
  $title   = $title ?? '';
?>

<div id="lb-container" class="lb-container hidden">
  <div class="lb">
    <div class="cake"></div>
    <?php get_component('slider-arrows')?>
    <svg class='close-lb' viewBox="0 0 100 100">
      <path d="M10 10L90 90" />
      <path d="M90 10L10 90" />
    </svg>
  </div>
</div>

<div class="slider-gallery content column">
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
        <?php get_component('slider-arrows')?>
        <div class="masonry-icon">masonry</div>
      </div>
      <div class="column">
        <div class="uppercase"><?=$title?></div>
        <div><?=$text?></div>
      </div>
    </div>
  </div>
</div>
