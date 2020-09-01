<?php
  $title      = $title ?? '';
  $text       = $text ?? '';
  $image      = $image ?? false;
  $button     = $button ?? false;
  $pic_right  = $pic_right ?? false;
  $alt_layout = $alt_layout ?? false;
?>

<div class="content col-2-with-pic <?=$alt_layout ? 'alt-layout' : ''?>">
  <div class="flex <?=$pic_right ? 'pic-right' : ''?>">

    <div class="col2 column">
      <div class="image-wrapper">
        <div class="cake cake-3-4"
          style="background-image: url(<?=$image['sizes']['large']?>)">
          <?php get_component('cake-frame');?>
        </div>
      </div>
    </div>
    <div class="col2 column">
      <div class="big-title handwrite"><?=$title?></div>
      <div class="rmin"></div>
      <div class="rmin"></div>
      <div class="text">
        <p><?=$text?></p>
      </div>

      <?php
        if ($button) {
        ?>
      <div class="r"></div>
      <a href="<?=$button['link']?>">
        <button>
          <?=$button['text']?>
        </button>
      </a>
      <?php }?>
    </div>

  </div>
</div>
