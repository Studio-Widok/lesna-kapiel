<?php
  $facilities    = $facilities ?? [];
  $title         = $title ?? '';
  $text          = $text ?? '';
  $image         = $image ?? false;
  $button        = $button ?? false;
  $pic_right     = $pic_right ?? false;
  $alt_layout    = $alt_layout ?? false;
  $isTextOverlap = $isTextOverlap ?? false;
  $maskColor     = $maskColor ?? '1e352a';
?>

<div class="content col-2-with-pic fade <?=$alt_layout ? 'alt-layout' : ''?>">
  <div
    class="flex flex-768 <?=$pic_right ? 'pic-right flex-column-reverse-768' : ''?>">

    <div class="col2 column">
      <div class="image-wrapper">
        <div class="cake cake-3-4"
          style="background-image: url(<?=$image['sizes']['large']?>)">
          <?php get_component('cake-frame', ['maskColor' => $maskColor]);?>
        </div>
      </div>
    </div>

    <div class="col2 column
      <?php if ($isTextOverlap) {echo 'column-overlap';}?>">
      <?php if ($title): ?>
      <div class="big-title handwrite"><?=$title?></div>
      <?php endif;?>

      <div class="rmin more-768"></div>
      <div class="rmin"></div>
      <?php get_component('facilities-icons', ['facilities' => $facilities]);?>

      <div class="text">
        <p><?=$text?></p>
      </div>

      <?php
        if ($button && $button['link'] && $button['text']) {
        ?>
      <div class="r"></div>
      <div class="button-container">
        <a href="<?=$button['link']?>">
          <button>
            <?=$button['text']?>
          </button>
        </a>
      </div>
      <?php }?>
    </div>

  </div>
</div>
