<?php
  $slides    = $slides ?? [];
  $title     = $title ?? '';
  $pic_right = $pic_right ?? false;
?>

<?php if (!empty($slides)) {?>
<div class="slider-with-bullets fade" id="slider-with-bullets-<?=$__index?>">
  <div class="content">
    <div class="slider-bullets column-768 <?=$pic_right ? 'pic-right' : ''?>">
      <div class="small-title"><?=$title?></div>
      <div class="rmin"></div>
      <div class="bullets-container flex">
        <?php for ($i = 0; $i < count($slides); $i++) {?>
        <div class="bullet col2">
          <div class="flex flex-align-center">
            <img src="<?=$slides[$i]['icon']['sizes']['medium']?>"
              class="slide-icon">
            <div class="bullet-title"><?=$slides[$i]['title']?></div>
          </div>
        </div>
        <?php }?>
      </div>
      <div class="r less-768"></div>
    </div>
    <div class="slider">
      <?php for ($i = 0; $i < count($slides); $i++) {?>
      <div class="single-slide">
        <div
          class="flex flex-wrap flex-768 flex-align-end <?=$pic_right ? 'pic-right flex-justify-end' : ''?>">
          <div class="col2 column">
            <div class="cake cake-3-4"
              style="background-image: url('<?=$slides[$i]['image']['sizes']['medium']?>');">
              <?php get_component('cake-frame');?>
            </div>
          </div>
          <div class="col2 column single-slide-desc">
            <div class="r less-1050"></div>
            <div class="flex flex-align-center">
              <img src="<?=$slides[$i]['icon']['sizes']['medium']?>"
                class="slide-icon">
              <div class="slide-title"><?=$slides[$i]['title']?></div>
            </div>
            <div class="rmik"></div>
            <div class="slide-text"><?=$slides[$i]['text']?></div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
  <?php get_component('slider-arrows');?>
</div>

<?php }?>
