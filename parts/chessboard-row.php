<?php
  // object{'slug' => string, 'name' => string}
  $handwrite = $handwrite ?? null;

  // int | string
  $index = $index ?? 0;

  // string
  $id = $id ?? '';

  // ImageArray
  $image = $image ?? null;

  // string
  $category = $category ?? null;

  // string
  $title = $title ?? '';

  // string
  $content = $content ?? '';
?>

<div class="chessboard-row" id="<?=$id?>">
  <?php if (isset($handwrite)) {?>
  <div class="apart-tag-title handwrite">
    <?=$handwrite->name?></div>
  <?php }?>

  <div class="square-img cake-zoom-frame source-<?=$index?>"
    data-full-src="<?=$image['sizes']['large']?>">
    <div class="cake"
      style="background-image: url(<?=$image['sizes']['medium']?>)">
    </div>
  </div>
  <div class="square column">
    <?php if (isset($category)) {?>
    <div class="uppercase"><?=$category?></div>
    <div class="rmin"></div>
    <?php }?>

    <h2 class="heading uppercase text-left"><?=$title?></h2>

    <?=$content?>

  </div>
</div>
