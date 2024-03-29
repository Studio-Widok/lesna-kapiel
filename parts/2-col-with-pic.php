<?php
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

      <div class="text">
        <p><?=$text?></p>
      </div>

      <?php
        if ($button && $button['link'] && $button['text']) {
        ?>
      <div class="r"></div>
      <div class="button-container rel">
        <a href="<?=$button['link']?>">
          <button
            <?=isset($button['isDisabled']) && $button['isDisabled'] ? 'disabled' : ''?>>
            <?=$button['text']?>
          </button>
          <?php if (isset($button['isDisabled']) && $button['isDisabled']) {?>
          <div class="tooltip"><?=pll__("maintenance_page")?></div>
          <?php }?>
        </a>
      </div>
      <?php }?>
    </div>

  </div>
</div>
